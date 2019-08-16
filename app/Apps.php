<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apps extends Model
{   
    use SoftDeletes;
    protected $table = 'apps';
    protected $fillable = [
        'name',
        'client_secret'
    ];
    public $timestamps = false;
    protected $dates = ['deleted_at'];
}
