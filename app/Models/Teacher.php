<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table="teachers";
    protected $fillable=["nombres","apellidos","direccion","email","usuario","password","fech_nacimiento","telefono","id_genero"];
    
    public function genero(){
        return $this->belongsTo(Genero::class);
    }
}
