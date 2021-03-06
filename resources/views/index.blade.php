<html>
<head>
    <title>Webmail</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/aj..."></script>
    <script src="https://maxcdn.bootstrapcdn.co..."></script>
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">WebMail
            <button id="btn_add" name="btn_add" class="btn btn-default pull-right">Compor</button>
        </div>
        {{--<div class="panel-body">--}}
            {{--<table class="table">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>ID</th>--}}
                    {{--<th>Name</th>--}}
                    {{--<th>Details</th>--}}
                    {{--<th>Actions</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody id="products-list" name="products-list">--}}
                {{--@foreach ($products as $product)--}}
                    {{--<tr id="product{{$product->id}}">--}}
                        {{--<td>{{$product->id}}</td>--}}
                        {{--<td>{{$product->name}}</td>--}}
                        {{--<td>{{$product->details}}</td>--}}
                        {{--<td>--}}
                            {{--<button class="btn btn-warning btn-detail open_modal" value="{{$product->id}}">Edit</button>--}}
                            {{--<button class="btn btn-danger btn-delete delete-product" value="{{$product->id}}">Delete</button>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}
        {{--</div>--}}
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nova Mensagem</h4>
                </div>
                <div class="modal-body">
                    <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                        <div class="form-group error">
                            <label for="assunto" class="col-sm-3 control-label">Assunto</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="assunto" name="assunto" placeholder="Assunto" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mesagem" class="col-sm-3 control-label">Mensagem</label>
                            <div class="col-sm-9">
                                <input type="textarea" class="form-control" rows="5" id="details" name="mesagem" placeholder="Escreva a sua mensagem" value="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="add">Enviar</button>
                    <input type="hidden" id="product_id" name="product_id" value="0">
                </div>
            </div>
        </div>
    </div>
</div>
<meta name="_token" content="{!! csrf_token() !!}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/ajaxscript.js')}}"></script>
</body>
</html>