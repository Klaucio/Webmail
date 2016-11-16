<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagens extends Model
{
    //
    protected $fillable= ['users_id','email','assunto','mensagem',];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
