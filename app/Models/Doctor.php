<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

 

    protected $fillable =['nombres','apellidos','telefono','licencia_medica','especialidad','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }
    
    public function horario(){
        return $this->hasMany(Horario::class);
    }
}
