<?php

namespace App\Http\Controllers;

use App\Notifications\msjNotificaciones;
use App\prueba\Repositories\UserRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\prueba\Repositories\InboxRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    protected $inboxRepo;
    protected $userRepo;
    function __construct(InboxRepo $inboxRepo,UserRepo $userRepo)
    {
        $this->inboxRepo = $inboxRepo;
        $this->userRepo= $userRepo;
    }


    public function notifications(){
      //  dd($this->inboxRepo->MsjNoVistos(Auth::user()->id));
        return $this->inboxRepo->MsjNoVistos(Auth::user()->id);
    }
    public function envnotifications(){
        $data = (object)Input::all();
        $user = $this->userRepo->getUserbyId(Auth::user()->id);
        $userFind = $this->userRepo->getUserbyId($data->id);
        $userFind->notify(new msjNotificaciones($user));
        return $this->inboxRepo->enviar($user,2,$data->texto,Carbon::now());
    }
}
