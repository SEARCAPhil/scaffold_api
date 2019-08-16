<?php

namespace App\Account;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    public $table = 'account_profile';
    public $fillable = [
        'uid',
        'profile_name',
        'last_name',
        'first_name',
        'profile_address',
        'profile_contact_number',
        'profile_email',
        'department',
        'department_alias',
        'position',
        'profile_iamge'
    ];

    protected $dates = ['deleted_at'];
}
