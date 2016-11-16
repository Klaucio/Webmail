/**
 * Created by claucio on 11/15/16.
 */
// var url = "http://localhost:8080/blog/public/productajaxCRUD";
var url = "http://localhost:8080/laravel/public/Webmail";
var url = "http://localhost:8000/laravel/Webmail";
//display modal form for product editing
$(document).on('click','.open_modal',function(){
    var product_id = $(this).val();

    $.get(url + '/' + mensagem_id, function (data) {
        //success data
        console.log(data);
        $('#mensagem_id').val(data.id);
        $('#assunto').val(data.assunto);
        $('#mensagem').val(data.mensagem);
        $('#btn-save').val("update");
        $('#myModal').modal('show');
    })
});
//display modal form for creating new product
$('#btn_add').click(function(){
    $('#btn-save').val("add");
    $('#frmProducts').trigger("reset");
    $('#myModal').modal('show');
});
//delete product and remove it from list
$(document).on('click','.delete-product',function(){
    var mensagem_id = $(this).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
    $.ajax({
        type: "DELETE",
        url: url + '/' + mensagem_id,
        success: function (data) {
            console.log(data);
            $("#Mensagens" + mensagem_id).remove();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});
//create new product / update existing product
$("#btn-save").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
    e.preventDefault();
    var formData = {
        assunto: $('#assunto').val(),
        mensagem: $('#Mensagens').val(),
    }
    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#btn-save').val();
    var type = "POST"; //for creating new resource
    var product_id = $('#product_id').val();;
    var my_url = url;
    if (state == "update"){
        type = "PUT"; //for updating existing resource
        my_url += '/' + product_id;
    }
    console.log(formData);
    $.ajax({
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            var product = '<tr id="product' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.details + '</td>';
            product += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Edit</button>';
            product += ' <button class="btn btn-danger btn-delete delete-product" value="' + data.id + '">Delete</button></td></tr>';
            if (state == "add"){ //if user added a new record
                $('#products-list').append(product);
            }else{ //if user updated an existing record
                $("#product" + product_id).replaceWith( product );
            }
            $('#frmProducts').trigger("reset");
            $('#myModal').modal('hide')
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});