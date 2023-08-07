<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cahced roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view dashboard']);
        
        //create roles and assign existing permissions
        $karyawanRole = Role::create(['name' => 'karyawan']);
        $karyawanRole->givePermissionTo('view dashboard');
        
        // gets all permissions via Gate::before rule
        $superadminRole = Role::create(['name' => 'super-admin']);

        //assign first user as superadmin
        // create demo users
        $userAsSuperadmin = User::factory()->create([
            'name' => 'Development',
            'email' => 'dev@computing.id',
            'password' => bcrypt('12345678')
        ]);
        $userAsSuperadmin->assignRole($superadminRole);
        $userKaryawan = User::factory()->create([
            'name' => 'Karyawan',
            'email' => 'karyawan@computing.id',
            'password' => bcrypt('12345678')
        ]);
        $userKaryawan->assignRole($karyawanRole);
    }
}
