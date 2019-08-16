<?php

namespace App\Http\Middleware;

use Closure;
use App\Apps;
use App\Session;
use \Firebase\JWT\JWT;

class O365
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $authorizationHeader = $request->header('Authorization');
        if(is_null($authorizationHeader) || empty($authorizationHeader)) return $this->fail();

        // Procedd parsing
        $access_token_arr = explode('Bearer ', trim($authorizationHeader));
        if(!isset($access_token_arr[1])) return $this->fail();

        // access token
        $access_token = $access_token_arr[1];
        $session_details = Session::where('access_token', '=', $access_token)->first();
        if(is_null($session_details)) return $this->fail();

        # get registered app to view the encryption key used
        $app_details = Apps::find($session_details->account_id)->first();
        if(!isset($app_details->client_secret)) return $this->fail();


        # decode JWT
        $jwt =  JWT::decode($access_token, $app_details->client_secret, array('HS256'));
        if((int) $jwt->data->token === $session_details->id) return $next($request);
        return $this->fail();
    }

    private function fail () {
        return redirect('/#/');
    }
}
