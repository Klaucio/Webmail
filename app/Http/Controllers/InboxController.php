<?php

namespace App\Http\Controllers;

use App\Mensagens;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $email=User::find(Auth::user()->id)->email;
        $achados=DB::table('mensagens')->where('email','=',$email)->get();//verifica emails recebidos
        $inbox=count($achados);
        $achados=DB::table('mensagens')->where('users_id','=',Auth::user()->id)->get();//verifica emails enviados
        $outbox=count($achados);
        $mensagens = Mensagens::where('email','=',$email)->get();
        return view('mensagens.inbox')->with(compact('mensagens'))->with(compact('inbox'))->with(compact('outbox'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $mensagem = Mensagens::find($id);
        return view('mensagens.mensagens')->with('mensagem', $mensagem);
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

        Mensagens::destroy($id);
//        Session::flash('message', 'Mensagem Eliminad com sucesso!');
        return Redirect::to('inbox');
    }
}
