@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    {{--<button id="btn_add" name="btn_add" class="btn btn-default pull-right">Compor</button>--}}
                    <a class="btn btn-small btn-success" href="{{ URL::to('mensangens@create/') }}">Compose </a>
                    <a class="btn btn-small btn-success" href="{{ URL::to('mensagens@edit/',1) }}">INBOX
                        <span class="label label-default label-pill pull-right">{{count($mensagens)}}</span> </a>
                    <a class="btn btn-small btn-success" href="{{ URL::to('mensagens@edit/',1) }}">Sent
                        <span class="label label-default label-pill pull-right">{{count($mensagens)}}</span></a>
                </div>
                <div class="panel-body">
                <table class="table">
                <thead>
                <tr>
                <th>From</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Actions</th>
                </tr>
                </thead>
                <tbody id="products-list" name="products-list">
                @foreach ($mensagens as $mensagem)
                <tr id="product{{$mensagem->email}}">
                <td>{{$mensagem->id}}</td>
                <td>{{$mensagem->name}}</td>
                <td>{{$mensagem->details}}</td>
                <td>
                <button class="btn btn-warning btn-detail open_modal" value="{{$product->id}}">Edit</button>
                <button class="btn btn-danger btn-delete delete-product" value="{{$product->id}}">Delete</button>
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