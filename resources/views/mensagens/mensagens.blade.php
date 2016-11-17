@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <a class="btn btn-small btn-success" href="#">
                        {{$mensagem->email}}
                    </a>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading"><h4>Subject: {{$mensagem->assunto}}</h4></div>
                                <div class="panel-body">

                                    {{$mensagem->mensagem}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

