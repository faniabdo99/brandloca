<?php
namespace App\Http\Middleware;
use Closure;
class isAdmin{
    public function handle($request, Closure $next){
        if(auth()->check()){
            if(auth()->user()->role == 2){
                return $next($request);
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }
}
