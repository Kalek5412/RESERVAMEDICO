<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->string('dni',100)->unique();
            $table->string('num_seguro',100)->unique();;
            $table->string('fecha_nacimiento',100);
            $table->string('genero',100);
            $table->string('celular',100);          
            $table->string('correo',250)->unique();;
            $table->string('direccion',100);
            $table->string('grupo_sanguineo',100);          
            $table->string('alergias',250);
            $table->string('contacto_emergencia',100);          
            $table->string('observaciones',250);
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
