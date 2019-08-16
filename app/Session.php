<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Session extends Model
{   
    protected $table = 'sessions';
    protected $fillable = ['user_agent', 'access_token'];

    static public function set ($id, $user_agent, $access_token, $exp = null) {

        $query = DB::insert('INSERT INTO sessions(account_id, user_agent, access_token, validity) values (?, ?, ?, ?)', [$id, $user_agent, $access_token, $exp]);
        return DB::getPdo()->lastInsertId();
    }

    static public function tokenize ($session_id, $access_token) {
        Session::where('id', $session_id)->update([
            'access_token' => $access_token
        ]);
    }
}
