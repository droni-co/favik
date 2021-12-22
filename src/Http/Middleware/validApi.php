<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Http;

class ValidApi
{
  public function handle($request, Closure $next)
  {
    $token = Auth::user()->favik_token;
    dd($token);
    $response = Http::withToken($token)->get(env("FAVIK_API_URL").'/user');
    if ($response->status() != 200) {
      return redirect('/auth/login/redirect');
    }
    return $next($request);
  }
}