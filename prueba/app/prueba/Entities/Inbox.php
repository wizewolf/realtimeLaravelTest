<?php

namespace App\prueba\Entities;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model{
    protected $connection = 'mysql';
    protected $table = 'inbox';
    protected $fillable = [
        'id',
        'id_plantilla',
        'id_receptor',
        'id_emisor',
        'tipo',
        'titulo',
        'fecha',
        'visto',
        'user_created',
        'user_updated'
    ];

    public function receptor(){
        return $this->hasOne('App\prueba\Entities\User', 'id', 'id_receptor');
    }
    public function emisor(){
        return $this->hasOne('App\prueba\Entities\User', 'id', 'id_emisor');
    }
    public function userCreated(){
        return $this->hasOne('App\prueba\Entities\User', 'id', 'user_created');
    }

    public function userUpdated(){
        return $this->hasOne('App\prueba\Entities\User', 'id', 'user_updated');
    }
}