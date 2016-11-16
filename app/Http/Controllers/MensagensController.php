<?php

namespace App\Http\Controllers;

use App\Mensagens;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MensagensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email=User::find(Auth::user()->id)->email;
        $achados=DB::table('mensagens')->where('email','=',$email)->get();//verifica emails recebidos
        $inbox=count($achados);
        $achados=DB::table('mensagens')->where('users_id','=',Auth::user()->id)->get();//verifica emails enviados
        $outbox=count($achados);
        $mensagens = Mensagens::all();
        return view('home')->with(compact('mensagens'))->with(compact('inbox'))->with(compact('outbox'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $email=User::find(Auth::user()->id)->email;
        $achados=DB::table('mensagens')->where('email','=',$email)->get();//verifica emails recebidos
        $inbox=count($achados);
        $achados=DB::table('mensagens')->where('users_id','=',Auth::user()->id)->get();//verifica emails enviados
        $outbox=count($achados);
        return view('mensagens.compor')->with(compact('inbox'))->with(compact('outbox'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $mensagem=new Mensagens();
        $mensagem->email=$request->input('email');
        $mensagem->assunto=$request->input('assunto');
        $mensagem->mensagem=$request->input('mensagem');
        $mensagem->users()->associate(User::find(Auth::user()->id));
        $mensagem->save();
        return redirect()->route('mensagens.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
