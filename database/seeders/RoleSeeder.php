<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{

        $admin = Role::create(['name'=>'admin']);
        $secretaria = Role::create(['name'=>'secretaria']);
        $doctor = Role::create(['name'=>'doctor']);
        $paciente = Role::create(['name'=>'paciente']);
        $usuario = Role::create(['name'=>'usuario']);


        Permission::create(['name'=>'admin.index']);

        //rutas para le admin
        Permission::create(['name'=>'admin.usuarios.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.usuarios.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.usuarios.store'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.usuarios.show'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.usuarios.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.usuarios.update'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.usuarios.confirmDelete'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.usuarios.destroy'])->syncRoles([$admin]);

                //rutas para le admin
                Permission::create(['name'=>'admin.configuraciones.index'])->syncRoles([$admin]);
                Permission::create(['name'=>'admin.configuraciones.create'])->syncRoles([$admin]);
                Permission::create(['name'=>'admin.configuraciones.store'])->syncRoles([$admin]);
                Permission::create(['name'=>'admin.configuraciones.show'])->syncRoles([$admin]);
                Permission::create(['name'=>'admin.configuraciones.edit'])->syncRoles([$admin]);
                Permission::create(['name'=>'admin.configuraciones.update'])->syncRoles([$admin]);
                Permission::create(['name'=>'admin.configuraciones.confirmDelete'])->syncRoles([$admin]);
                Permission::create(['name'=>'admin.configuraciones.destroy'])->syncRoles([$admin]);

        //rutas para le secre
        Permission::create(['name'=>'admin.secretarias.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.secretarias.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.secretarias.store'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.secretarias.show'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.secretarias.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.secretarias.update'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.secretarias.confirmDelete'])->syncRoles([$admin]);
        Permission::create(['name'=>'admin.secretarias.destroy'])->syncRoles([$admin]);

        //rutas para le paciente
        Permission::create(['name'=>'admin.pacientes.index'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.pacientes.create'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.pacientes.store'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.pacientes.show'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.pacientes.edit'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.pacientes.update'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.pacientes.confirmDelete'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.pacientes.destroy'])->syncRoles([$admin,$secretaria]);

        //rutas para le consultorio
        Permission::create(['name'=>'admin.consultorios.index'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.consultorios.create'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.consultorios.store'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.consultorios.show'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.consultorios.edit'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.consultorios.update'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.consultorios.confirmDelete'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.consultorios.destroy'])->syncRoles([$admin,$secretaria]);

        //rutas para le doctores
        Permission::create(['name'=>'admin.doctores.index'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.doctores.create'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.doctores.store'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.doctores.show'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.doctores.edit'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.doctores.update'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.doctores.confirmDelete'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.doctores.destroy'])->syncRoles([$admin,$secretaria]);


        //rutas para le horarios
        Permission::create(['name'=>'admin.horarios.index'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.horarios.create'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.horarios.store'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.horarios.show'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.horarios.edit'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.horarios.update'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.horarios.confirmDelete'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=>'admin.horarios.destroy'])->syncRoles([$admin,$secretaria]);

        //ajax
        Permission::create(['name'=>'admin.horarios.datosConsultorio'])->syncRoles([$admin,$secretaria]);

        Permission::create(['name'=>'datosConsultorio'])->syncRoles([$admin,$usuario]);
        Permission::create(['name'=>'cargar_reserva_doctores'])->syncRoles([$admin,$usuario]);
        Permission::create(['name'=>'verReservas'])->syncRoles([$admin,$usuario]);
        Permission::create(['name'=>'admin.eventos.create'])->syncRoles([$admin,$usuario]);
        Permission::create(['name'=>'admin.eventos.destroy'])->syncRoles([$admin,$usuario]);

    }
}
