<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);
        $writerRole = Role::create(['name' => 'Writer', 'display_name' => 'Escritor']);

        $viewPostsPermission = Permission::create([
            'name' => 'View posts',
            'display_name' => 'Ver Publicaciones'
        ]);
        $createPostsPermission = Permission::create([
            'name' => 'Create posts',
            'display_name' => 'Crear Publicaciones'
        ]);
        $updatePostsPermission = Permission::create([
            'name' => 'Update posts',
            'display_name' => 'Actualizar Publicaciones'
        ]);
        $deletePostsPermission = Permission::create([
            'name' => 'Delete posts',
            'display_name' => 'Borrar Publicaciones'
        ]);

        $viewUsersPermission = Permission::create([
            'name' => 'View users',
            'display_name' => 'Ver Usuarios'
        ]);
        $createUsersPermission = Permission::create([
            'name' => 'Create users',
            'display_name' => 'Crear Usuarios'
        ]);
        $updateUsersPermission = Permission::create([
            'name' => 'Update users',
            'display_name' => 'Actualizar Usuarios'
        ]);
        $deleteUsersPermission = Permission::create([
            'name' => 'Delete users',
            'display_name' => 'Eliminar Usuarios'
        ]);

        $viewRolesPermission = Permission::create([
            'name' => 'View roles',
            'display_name' => 'Ver roles'
        ]);
        $createRolesPermission = Permission::create([
            'name' => 'Create roles',
            'display_name' => 'Crear Roles'
        ]);
        $updateRolesPermission = Permission::create([
            'name' => 'Update roles',
            'display_name' => 'Actualizar Roles'
        ]);
        $deleteRolesPermission = Permission::create([
            'name' => 'Delete roles',
            'display_name' => 'Borrar Roles'
        ]);

        $admin = new User;
        $admin->name = "Daniel";
        $admin->email = "admin@email.com";
        $admin->password = '123123';
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = "Luis";
        $writer->email = "luis@email.com";
        $writer->password = '123123';
        $writer->save();

        $writer->assignRole($writerRole);
    }
}
