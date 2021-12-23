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
    $token = json_decode($token);
    $response = Http::withToken($token->access_token)
      ->accept('application/json')
      ->get(env("FAVIK_AUTH_URL").'/api/user');
    $request->current_user = $response->json();
    if ($request->current_user) {
      return $next($request);
    }
    return false;
  }
}