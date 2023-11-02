<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Http\Controllers\UsuarioController;
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
             //tabla usuarios
             'ver-usuario',
             'crear-usuario',
             'editar-usuario',
             'borrar-usuario',
         //tabla elecciones
            //'ver-eleccion',
           // 'crear-eleccion',
            //'editar-eleccion',
            //'borrar-eleccion',

        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
