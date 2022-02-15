<?php

namespace App\Http\Controllers;

use App\Game;
use App\Mail\GameDeleteMail;
use Illuminate\Http\Request;
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

        Mail::to('test@test.com') -> send(new GameDeleteMail());

        return json_encode($game);
    }
}
