<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle("درخواست خدمات")
            ->addMeta("designer", env("DESIGNER"));

        return view('home.service.index');
    }

    public function sort(Request $request)
    {
        $data = $request->validate([
            "name" => ['required', 'max:255'],
            "mobile" => ['required', 'regex:/^(?:0|98|\+98|\+980|0098|098|00980)?(9\d{9})$/u'],
            "item_id" => ['required'],
            "message" => ['max:1024']
        ]);

        Service::create($data);

        Alert::success('درخواست شما با موفقیت ثبت شد', 'واحد پشتیبانی در اسرع وقت با شما تماس خواهند گرفت.');

        return back();
    }
}
