<?php 

namespace Favik\Favik\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Auth;

class GatewayController extends Controller
{
  public static function getUser($token) {
    $response = Http::withToken($token)->get(env("FAVIK_API_URL").'/user');
    return $response->json();
  }
  public static function get($endpoint, $params=[]) {
    $token = Auth::user()->favik_token;
    $response = Http::withToken($token)->get($endpoint, $params);
    return $response;
  }
}
?>