<?php

namespace App\Http\Controllers;

use App\Apps;
use App\Session;
use App\Account;
use App\Account\Profile;
use \Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request,$data)
    {   
        $id = $data->id; // o365 uid
        $client_id = $data->client_id;
        $account_id = null;
        $account_profile_id = null;
        $agent = $request->header('User-Agent');

        # app must be pre-registered
        $app = Apps::find($client_id);
        if(!isset($app->id)) return;


        # check account if exists
        $account = Account::select('username', 'uid', 'id')->where('uid', '=', $id)->first();

        # create new account
        if(is_null($account)) {
            $account_id = $this->create_o365_account($id, $data->mail);
        } else {
            $account_id = $account->id;
        }

        # check account existence
        if(!$account_id) exit;

        # check profile
        $profile = Profile::where('uid', '=', $account_id)->orderBy('id', 'DESC')->first();

        
        $uid = $account_id; 
        $email = $data->mail; 
        $profile_name = $data->data->displayName;
        $last_name = $data->data->surname;
        $first_name = $data->data->givenName; 
        $profile_contact = $data->data->mobilePhone; 
        $department = $data->data->department;
        $department_alias = $data->data->department;
        $position = $data->data->jobTitle;

        # create profile as necessary
        if(is_null($profile)) {
            # create
            $account_profile_id = $this->create_profile($uid, $email, $profile_name, $last_name, $first_name, $profile_contact, $department, $department_alias, $position);
        }

        # update otherwise
        if(isset($profile->id)) {
            $account_profile_id = $this->update_profile($profile->id, $uid, $email, $profile_name, $last_name, $first_name, $profile_contact, $department, $department_alias, $position);
        }
        
        # generate access token and session
        $app->body = new \StdClass;
        $app->body->agent = $agent;
        return $this->set_claim($app);

    }

    private function create_o365_account ($uid, $email) {
        $account = DB::insert('INSERT INTO account (username, uid) values(?, ?)', [$email, $uid]);
        return DB::getPdo()->lastInsertId();
    }

    private function create_profile ($uid, $email, $profile_name, $last_name, $first_name, $profile_contact, $department, $department_alias, $position) {
        DB::insert('INSERT INTO account_profile (uid, profile_email, profile_name, last_name, first_name, profile_contact_number, department, department_alias, position) values(?, ?, ?, ?, ?, ?, ?, ?, ?)', [$uid, $email, $profile_name, $last_name, $first_name, $profile_contact, $department, $department_alias, $position]);
        return DB::getPdo()->lastInsertId();
    }

    private function update_profile ($id, $uid, $email, $profile_name, $last_name, $first_name, $profile_contact, $department, $department_alias, $position) {
       return Profile::where('id', $id)->update([
            'profile_email' => $email, 
            'profile_name' => $profile_name, 
            'last_name' => $last_name, 
            'first_name' => $first_name, 
            'profile_contact_number' => $profile_contact, 
            'department' => $department, 
            'department_alias' => $department_alias, 
            'position' => $position
        ]);
    }

    private function set_claim ($app) {

        # client_secret is used for creating session token
        # which is part of JWT access token
        $access_token_id = Session::set($app->id, 'Mozilla', $app->client_secret);
        $app->body->token = $access_token_id;
        
        # JWT
        $token = array(
            "iss" => "http://example.org",
            "aud" => $app->name,
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "data" => $app->body
        );

        $jwt =  JWT::encode($token, $app->client_secret);

        #update session
        Session::tokenize($access_token_id, $jwt);

        return json_encode([
            'access_token' => $jwt,
            'token_type' => 'bearer'
        ]);

    }

    public function authService(Request $request)
    {
       $data = @json_decode($request->getContent());
       if((!isset($data->id)) || (!isset($data->mail))) return;

        echo $this->login($request, $data);
    }
}
