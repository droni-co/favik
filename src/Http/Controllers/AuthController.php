<?php

namespace Favik\Favik\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
  public function login() {
    return view('auth.login');
  }
  public function redirect(Request $request){
    $request->session()->put('state', $state = Str::random(40));

    $query = http_build_query([
      'client_id' => env("FAVIK_CLIENT_ID"),
      'redirect_uri' => env("FAVIK_CALLBACK_URL"),
      'response_type' => 'code',
      'scope' => '',
      'state' => $state,
    ]);
    
    return redirect(env("FAVIK_AUTH_URL").'/oauth/authorize?'.$query);
  }
  public function callback(Request $request) {
    $state = $request->session()->pull('state');

    throw_unless(
      strlen($state) > 0 && $state === $request->state,
      InvalidArgumentException::class
    );

    $response = Http::asForm()->post(env("FAVIK_AUTH_URL").'/oauth/token', [
      'grant_type' => 'authorization_code',
      'client_id' => env("FAVIK_CLIENT_ID"),
      'client_secret' => env("FAVIK_CLIENT_SECRET"),
      'redirect_uri' => env("FAVIK_CALLBACK_URL"),
      'code' => $request->code,
    ]);

    $token = $response->json();
    $favikUser = $this->getUser($token['access_token']);
    //login or create user
    $user = User::where('email', $favikUser['email'])->first();
    if(!$user) {
      $user = new User;
      $user->email = $favikUser['email'];
      $user->password = Str::random(40);
      $user->email_verified_at = $favikUser['email_verified_at'];
    }
    $user->favik_token = json_encode($token);
    $user->admin = $favikUser['admin'];
    $user->name = $favikUser['name'];
    $user->avatar = $favikUser['avatar'];

    $user->save();

    Auth::login($user, true);

    return redirect()->route('home');
  }

  private function getUser($token) {
    $response = Http::withToken($token)
      ->get(env("FAVIK_AUTH_URL").'/api/user');
    return $response->json();
  }

  public function logout() {
    $token = json_decode(Auth::user()->favik_token);
    try {
      Http::withToken($token->access_token)
        ->post(env("FAVIK_AUTH_URL").'/oauth/revoke');
    } catch (\Exception $e) {
      //
    }
    Auth::logout();
    return redirect()->route('home');
  }
}
