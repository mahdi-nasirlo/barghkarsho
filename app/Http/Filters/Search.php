<?Php

namespace App\Http\Filters;

use Closure;

class Search
{
    public $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function handle($request, Closure $next)
    {
        if (!$this->string or $this->string = "") {
            return $next($request);
        }

        return $next($request)->orWhere('name', 'like', '%' . $this->string . '%');
    }
}
