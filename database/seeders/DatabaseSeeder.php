<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Secretaria;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([RoleSeeder::class]);

        //seeder para los roles ypermisos
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
    }
}
