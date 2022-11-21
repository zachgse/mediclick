<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Routing\Exceptions\InvalidSignatureException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Carbon;
class ValidateHttpsSignature
{
var $keyResolver;
 
public function __construct()
{
    $this->keyResolver = function () {
        return App::make('config')->get('app.key');
    };
}
 
/**
 * Based in/laravel/framework/src/Illuminate/Routing/Middleware/ValidateSignature.php.
 * Handle an incoming request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @return mixed
 */
public function handle($request, Closure $next)
{
    if ($this->hasValidSignature($request)) {
        return $next($request);
    }
    throw new InvalidSignatureException;
 
}
 
/**
 * Determine if the given request has a valid signature.
 * copied and modified from
 * vendor/laravel/framework/src/Illuminate/Routing/UrlGenerator.php:363
 * @param  \Illuminate\Http\Request  $request
 * @param  bool  $absolute
 * @return bool
 */
public function hasValidSignature(Request $request, $absolute = true)
{
    $app_url = App::make('config')->get('app.url');
    $url = ($absolute ? $app_url : '') . '/'.$request->path();
 
    // THE FIX:
    $url = str_replace("http://","https://", $url);
 
    $original = rtrim($url.'?'.Arr::query(
            Arr::except($request->query(), 'signature')
        ), '?');
 
    $expires = $request->query('expires');
 
    $signature = hash_hmac('sha256', $original, call_user_func($this->keyResolver));
 
    return  hash_equals($signature, (string) $request->query('signature', '')) &&
        ! ($expires && Carbon::now()->getTimestamp() > $expires);
    }
}
