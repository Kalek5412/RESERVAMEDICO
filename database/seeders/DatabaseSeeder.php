<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Consultorio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Secretaria;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Paciente;




class DatabaseSeeder extends Seeder
{
 
    public function run(): void {
        $this->call([RoleSeeder::class]);

      
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password'=> Hash::make('123456789')
        ])->assignRole('admin');

        User::create([
            'name' => 'Secretaria',
            'email' => 'secre@admin.com',
            'password'=>Hash::make('123456789')
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres' => 'secre',
            'apellidos' => 'prueba',
            'dni' => '74859665',
            'celular' => '968574456',
            'fecha_nacimiento' => '10/10/1995',
            'direccion' => 'chimbote',
            'user_id' => '2',           
        ]);

        User::create([
            'name' => 'Doctor1',
            'email' => 'doctor1@admin.com',
            'password'=>Hash::make('123456789')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'zu',
            'apellidos' => 'pon',
            'telefono' => '943000000',
            'licencia_medica' => 'a3',
            'especialidad' => 'FISIOTERAPIA',
            'user_id' => '3',           
        ]);


        Consultorio::create([
            'nombres' => 'FISIOTERAPIA',
            'ubicacion' => '1-1A',
            'capacidad'=>'10',
            'telefono' => '',
            'especialidad' => 'FISIOTERAPIA',
            'estado'=>'ACTIVO'
        ]);

        User::create([
            'name' => 'Paciente1',
            'email' => 'paciente1@admin.com',
            'password'=>Hash::make('123456789')
        ])->assignRole('paciente');

        User::create([
            'name' => 'Usuario1',
            'email' => 'usuario1@admin.com',
            'password'=>Hash::make('123456789')
        ])->assignRole('usuario');




        $this->call([PacienteSeeder::class]);

        Horario::create([
            'dia'=>'VIERNES',
            'hora_inicio'=>'08:00:00',
            'hora_fin'=>'14:00:00',
            'doctor_id'=>'1',
            'consultorio_id'=>'1'
        ]);
    }
}
