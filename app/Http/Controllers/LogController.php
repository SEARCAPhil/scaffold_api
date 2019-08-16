<?php

namespace App\Http\Controllers;

use App\Logs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
     
    public function create ($pid, $action, $log, $type) {
        return DB::insert('INSERT INTO logs (pid, action, log, type) values(?, ?, ?, ?)', [$pid, $action, $log, $type]);
    }

    public function retrieve ($id) {
        return Logs::where('pid', $id)->paginate(100);
    }

    public function view ($id) {
        return Logs::where('id', $id)->get();
    }

    public function delete ($id) {
       return Logs::where('id', $id)->delete();
    }

    public function createService (Request $request) { 
        $inserted = self::create ($request->id, $request->action, $request->log, $request->type);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService ($id) {
        return self::delete($id);
    } 

    public function retrieveService (Request $request) {
        return self::retrieve($request->id);
    }
}
