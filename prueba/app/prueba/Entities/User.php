<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05/11/15
 * Time: 18:23
 */

namespace App\prueba\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Model {
    use Notifiable;
    use SoftDeletes;
    protected $table = "users";

    protected $fillable = [
        'id',
        'email',
        'password',
        'social',
        'last_session',
        'user_type',
        'user_name'
    ];


}