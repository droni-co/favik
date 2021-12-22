<?php

namespace Favik\Favik\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class FavikApi
{
  public function handle($request, Closure $next)
  {
    $token = $request->header()['authorization'][0];
    $token = str_replace('Bearer ', '', $token);
    $response = Http::withToken($token)
      ->accept('application/json')
      ->get(env("FAVIK_AUTH_URL").'/api/user');
    dd($response->body());
    if ($response->status() != 200) {
      return $next($request);
    }
    return false;
  }
}