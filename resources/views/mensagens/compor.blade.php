@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    {{--<button id="btn_add" name="btn_add" class="btn btn-default pull-right">Compor</button>--}}
                    <a class="btn btn-small btn-success" href="{{ URL::to('mensagens/create') }}">Compose </a>
                    <a class="btn btn-small btn-success" href="{{ URL::to('inbox') }}">INBOX
                        <span class="label label-default label-pill pull-right">{{$inbox }}</span> </a>
                    <a class="btn btn-small btn-success" href="{{ URL::to('sent') }}">Sent
                        <span class="label label-default label-pill pull-right">{{$outbox}}</span></a>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">Compose</div>
                                <div class="panel-body">
                                    {!! Form::open(['route' => 'mensagens.store', 'class' => 'form-horizontal']) !!}

                                    <div class="form-group">
                                        {!! Form::label('email', 'Email', ['class'=>'col-sm-2 control-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::email('email',null,['class'=>'form-control', 'required' ,'placeholder'=>'email do destinatário'] ) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('assunto', 'Assunto', ['class'=>'col-sm-2 control-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text('assunto', old('assunto'), ['class'=>'form-control', 'required', 'placeholder'=> 'Indique o assunto']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('mensagem', 'Mensagem', ['class'=>'col-sm-2 control-label']) !!}
                                        <div class="col-sm-10">
                                            {!! Form::textarea('mensagem', old('mensagem'), ['class'=>'form-control', 'required','rows'=>5 , 'placeholder'=> 'Escreva a sua mensagem aqui!!!']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2">
                                            {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                                        </div>
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection