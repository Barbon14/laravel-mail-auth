<?php

namespace App\Http\Controllers;

use App\Game;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getGames () {

        $games = Game::all();
        
        return json_encode($games);
    }
}
