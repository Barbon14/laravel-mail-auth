<?php

namespace App\Http\Controllers;

use App\Game;
use App\Mail\GameDeleteMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    public function getGames () {

        $games = Game::all();
        
        return json_encode($games);
    }

    public function deleteGame($id) {

        $game = Game::findOrFail($id);
        $game -> delete();

        $this -> sendDeleteMail($game);

        return json_encode($game);
    }
    
    public function sendDeleteMail($game) {
        
        Mail::to(Auth::user() -> email) -> send(new GameDeleteMail($game));
        Mail::to('admin@miosito.com')->send(new GameDeleteMail($game));
    }
}
