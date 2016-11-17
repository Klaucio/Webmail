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
                <div class="panel-body">
                    {{--<img src="{{asset('img/'.$value->foto)}}" class="img-circle pull-right" style="width:50px">--}}
                    <table class="table">
                        <thead>
                        <tr>
                            <th>To</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody id="products-list" name="products-list">
                        @foreach ($mensagens as $mensagem)
                            <tr id="product">
                                <td>{{$mensagem->email}}</td>
                                <td>{{$mensagem->assunto}}</td>
                                <td>{{$mensagem->mensagem}}</td>
                                <td>
                                    {!! link_to_route('sent.show', 'Detalhes', [$mensagem->id], ['class' => 'fa fa-eye btn btn-md btn-info']) !!}
                                    {!! Form::open(['style' => 'display: inline-block;', 'method' => 'DELETE',
                                     'onsubmit' => 'return confirm(\'' . trans('quickadmin::admin.roles-index-are_you_sure') . '\');',
                                       'route' => ['inbox.destroy', $mensagem->id]]) !!}
                                    {!! Form::submit(trans('DELETE'), ['class' => 'btn btn-md btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection