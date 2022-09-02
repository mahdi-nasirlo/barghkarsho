<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use App\Models\Payment as MyPayment;
use Illuminate\Support\Facades\Auth;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Alert;
use App\Models\MyPayment as ModelsMyPayment;
use App\Models\Order;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{

    public function payment(Order $order)
    {
        $payment_id = $order->orderHasPayment() ? $order->payments[0]->verify_code : md5(uniqid());

        $invoice = new Invoice();
        $invoice->amount($order->price);

        $payment = Payment::callBackUrl(route('payment.callback', ['payment' => $payment_id]));

        // dd($payment);
        $payment->purchase($invoice, function ($driver, $transactionId) use ($order, $payment_id) {
            Log::debug("call back  ::  " . $transactionId . "    ******    " . $payment_id);
            if ($order->orderHasPayment())
                $order->payments[0]->update(['resnumber' => $transactionId]);
            else
                $order->payments()->create([
                    'resnumber' => $transactionId,
                    'verify_code' => $payment_id
                ]);
        });

        return ($payment->pay()->render());
    }

    public function callback(Request $request)
    {
        $payment  = ModelsMyPayment::where('verify_code', $request->payment)->first();


        if (is_null($payment)) {
            return view('error');
        }


        if ($payment->order->user->id !== Auth::id()) {
            return view('error');
        }


        Log::debug("call back  ::  " . $payment->resnumber . "    ******    " . $request->payment);


        // You need to verify the payment to ensure the invoice has been paid successfully.
        // We use transaction id to verify payments
        // It is a good practice to add invoice amount as well.
        try {
            $receipt = Payment::amount($payment->order->price)->transactionId($payment->resnumber)->verify();


            // You can show payment referenceId to the user.

            $payment->update([
                'status' => true
            ]);

            $payment->order->update([
                'status' => 'paid'
            ]);

            session()->flash("message", "پرداخت با موفقیت انجام شد , خرید شما حداکثر 2 تا 3 روز کاری دیگر ارسال خواهد شد .");
            return redirect(Route("profile", ['tab' => "order"]));
        } catch (InvalidPaymentException $exception) {
            /**
        when payment is not verified, it will throw an exception.
        We can catch the exception to handle invalid payments.
        getMessage method, returns a suitable message that can be used in user interface.
             **/
            // echo $exception->getMessage();

            session()->flash("error", $exception->getMessage() . " ( پرداخت ناموفق ) ");

            return redirect(route("profile", ['tab' => "order"]));
        }
    }
    public function paymentPage(Order $order)
    {
        Gate::authorize("view-payment", $order);

        return view("home.cart.payment", ['order' => $order]);
    }
}
