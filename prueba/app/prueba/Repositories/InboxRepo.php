<?php

namespace App\prueba\Repositories;
use App\prueba\Entities\Inbox;


class InboxRepo{

    public function getInboxbyUser($id){
        return Inbox::where('id_receptor',$id)->orderBy('fecha','asc')->get();
    }

    public function enviar($userIdEmisor, $idReceptor, $pTitulo, $now){
        return Inbox::create([
            'id_receptor'     => $idReceptor,
            'id_emisor'       => $userIdEmisor,
            'tipo'            => "1",
            'titulo'          => $pTitulo,
            'fecha'           => $now,
            'user_created'    => $userIdEmisor,
            'user_updated'    => $userIdEmisor
        ]);
    }

    public function getMsjbyID($id){
        return Inbox::where('id',$id)->first();
    }
    public function MsjNoVistos($id){
        return Inbox::where('id_receptor',$id)->where('visto',false)->with('emisor')->get();
    }

}
