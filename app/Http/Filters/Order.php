<?Php

namespace App\Http\Filters;

use Closure;
use Illuminate\Support\Facades\Log;

class Order
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function handle($request, Closure $next)
    {
        $orders = ['priceDEC', "priceASC", "rating", "popular", "last"];

        if (!in_array($this->order, $orders)) {
            return $next($request);
        }

        switch ($this->order) {
            case 'last':
                return $next($request)->latest();
                break;

            case 'priceASC':
                return $next($request)->orderBy('price', 'asc');
                break;

            case 'priceDEC':
                return $next($request)->orderBy('price', 'desc');
                break;

            default:
                return $next($request);
                break;
        }

        // return $next($request)->where('name', 'like', '%' . $this->string . '%');
    }
}
