<?php

namespace App\Http\Controllers;

use App\Mensagens;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email=User::find(Auth::user()->id)->email;
        $achados=DB::table('mensagens')->where('email','=',$email)->get();//verifica emails recebidos
        $inbox=count($achados);
        $achados=DB::table('mensagens')->where('user_id','=',Auth::user()->id)->get();//verifica emails enviados
        $outbox=count($achados);
        $mensagens = Mensagens::all();
        return view('home')->with(compact('mensagens'))->with(compact('inbox'))->with(compact('outbox'));;
    }
}
