<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table="students";
    protected $fillable=["nombres","apellidos","direccion","fech_nac","tutor","Telf_tutor","autenticacion","id_genero"];
    
    public function genero(){
        return $this->belongsTo(Genero::class);
    }
}
