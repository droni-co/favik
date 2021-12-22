<?php 

namespace Favik\Favik\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Auth;

class GatewayController extends Controller
{
  public static function get($app, $endpoint, $params=[]) {
    $token = Auth::user()->favik_token;
    $url = $this->app($app).$endpoint;
    $response = Http::withToken($token)->get($url, $params);
    return $response;
  }
  private static function app($app) {
    $res = [
      'archimedes' => 'https://archimedes.favik.dev',
      'attribution' => 'https://attribution.favik.dev',
      'reports' => 'https://reports.favik.dev',
    ];
    return $res[$app];
  }
}
/*
use Favik\Favik\Http\Controllers\GatewayController as myHttp;

myHttp::get('archimedes', '/posts/report', []);
*/