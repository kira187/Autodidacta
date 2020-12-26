<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Crear cursos'
        ]);

        Permission::create([
            'name' => 'Leer cursos'
        ]);

        Permission::create([
            'name' => 'Actualizar cursos'
        ]);

        Permission::create([
            'name' => 'Eliminar cursos'
        ]);

        Permission::create([
            'name' => 'Ver dashboard'
        ]);

        Permission::create([
            'name' => 'Crear rol'
        ]);

        Permission::create([
            'name' => 'Listar rol'
        ]);

        Permission::create([
            'name' => 'Editar rol'
        ]);

        Permission::create([
            'name' => 'Eliminar rol'
        ]);

        Permission::create([
            'name' => 'Listar usuarios'
        ]);

        Permission::create([
            'name' => 'Visualizar usuarios'
        ]);

        Permission::create([
            'name' => 'Editar usuarios'
        ]);
    }
}
