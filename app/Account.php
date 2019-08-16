<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{   
    use SoftDeletes;
    public $table = 'account';
    public $fillable = [
        'username',
        'password',
        'uid'
    ];

    public $timestamps = false;
    protected $dates = ['deleted_at'];
}
