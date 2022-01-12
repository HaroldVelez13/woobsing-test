<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Creation of roles
        $adminRol = Role::create(['name' => 'admin']);
        $invitedRol= Role::create(['name' => 'invited']);

        //Creation of Permissions
        Permission::create(['name' => 'show::role']);
        Permission::create(['name' => 'create::role']);
        Permission::create(['name' => 'edit::role']);
        Permission::create(['name' => 'delete::role']);
        Permission::create(['name' => 'show::permission']);
        Permission::create(['name' => 'show::users']);
        Permission::create(['name' => 'invited::permission']);

        //give Permission To Roles
        $adminRol->givePermissionTo(['show::role','create::role','edit::role','delete::role','show::permission','show::users']);
        $invitedRol->givePermissionTo(['show::role','show::permission','invited::permission']);

        //create user Admin
        $user = new User;
        $user->name = "Harold";
        $user->last_name = "Velez";
        $user->phone = "3156964959";
        $user->email = "haroldvelez13@hotmail.com";
        $user->email_verified_at = now();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $user->remember_token = Str::random(10);
        $user->save();
        //assign Role
        $user->assignRole($adminRol);


        //create user invited
        $user = new User;
        $user->name = "Invitado";
        $user->last_name = "Castano";
        $user->phone = "3016964959";
        $user->email = "invitado@hotmail.com";
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $user->remember_token = Str::random(10);
        $user->save();
        //assign Role
        $user->assignRole($invitedRol);

        
    }
}
