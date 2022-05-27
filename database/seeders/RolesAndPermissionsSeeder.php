<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        //Users
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'show users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'users status']);

        //Roles
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'show roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);

        //Categories
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'show categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'delete categories']);

        //Products
        Permission::create(['name' => 'create products']);
        Permission::create(['name' => 'show products']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'delete products']);
        Permission::create(['name' => 'Products status']);

        //Colours
        Permission::create(['name' => 'create colours']);
        Permission::create(['name' => 'show colours']);
        Permission::create(['name' => 'edit colours']);
        Permission::create(['name' => 'delete colours']);

        //Sizes
        Permission::create(['name' => 'create sizes']);
        Permission::create(['name' => 'show sizes']);
        Permission::create(['name' => 'edit sizes']);
        Permission::create(['name' => 'delete sizes']);

        //Batches
        Permission::create(['name' => 'create batches']);
        Permission::create(['name' => 'show batches']);
        Permission::create(['name' => 'edit batches']);
        Permission::create(['name' => 'delete batches']);
        Permission::create(['name' => 'view batches']);

        //Sale Centers
        Permission::create(['name' => 'create sale centers']);
        Permission::create(['name' => 'show sale centers']);
        Permission::create(['name' => 'edit sale centers']);
        Permission::create(['name' => 'delete sale centers']);

        //Riders
        Permission::create(['name' => 'create riders']);
        Permission::create(['name' => 'show riders']);
        Permission::create(['name' => 'edit riders']);
        Permission::create(['name' => 'delete riders']);

        //Suppliers
        Permission::create(['name' => 'create suppliers']);
        Permission::create(['name' => 'show suppliers']);
        Permission::create(['name' => 'edit suppliers']);
        Permission::create(['name' => 'delete suppliers']);

        //Logos
        Permission::create(['name' => 'create logos']);
        Permission::create(['name' => 'show logos']);
        Permission::create(['name' => 'edit logos']);
        Permission::create(['name' => 'delete logos']);
        Permission::create(['name' => 'logos status']);

        //APE (Address - Phone - Email)
        Permission::create(['name' => 'create ape']);
        Permission::create(['name' => 'show ape']);
        Permission::create(['name' => 'edit ape']);
        Permission::create(['name' => 'delete ape']);
        Permission::create(['name' => 'ape status']);

        //Sliders
        Permission::create(['name' => 'create sliders']);
        Permission::create(['name' => 'show sliders']);
        Permission::create(['name' => 'edit sliders']);
        Permission::create(['name' => 'delete sliders']);
        Permission::create(['name' => 'sliders status']);


        //Banners
        Permission::create(['name' => 'create banners']);
        Permission::create(['name' => 'show banners']);
        Permission::create(['name' => 'edit banners']);
        Permission::create(['name' => 'delete banners']);
        Permission::create(['name' => 'banners status']);

        //Services
        Permission::create(['name' => 'create services']);
        Permission::create(['name' => 'show services']);
        Permission::create(['name' => 'edit services']);
        Permission::create(['name' => 'delete services']);
        Permission::create(['name' => 'services status']);

        //Floors
        Permission::create(['name' => 'create floors']);
        Permission::create(['name' => 'show floors']);
        Permission::create(['name' => 'edit floors']);
        Permission::create(['name' => 'delete floors']);
        Permission::create(['name' => 'floors status']);

        //Couriers
        Permission::create(['name' => 'create couriers']);
        Permission::create(['name' => 'show couriers']);
        Permission::create(['name' => 'edit couriers']);
        Permission::create(['name' => 'delete couriers']);

        //Reviews
        Permission::create(['name' => 'review reply']);

        //orders
        Permission::create(['name' => 'show orders']);
        Permission::create(['name' => 'edit orders']);
        Permission::create(['name' => 'delete orders']);
        Permission::create(['name' => 'view orders']);

        //Deal
        Permission::create(['name' => 'create deals']);
        Permission::create(['name' => 'show deals']);
        Permission::create(['name' => 'edit deals']);
        Permission::create(['name' => 'delete deals']);
        Permission::create(['name' => 'deals status']);


        // create roles and assign created permissions

        //User Role
        $user_role = Role::create(['name' => 'customer']);

        //Admin Role
        $admin_role = Role::create(['name' => 'admin'])
            ->givePermissionTo(['show users', 'show couriers','show floors','show services','show banners']);

        //Super Admin
        $super_admin_role = Role::create(['name' => 'super-admin']);
        $super_admin_role->givePermissionTo(Permission::all());

        //Reseller Role
        Role::create(['name' => 'reseller']);

        //Salecenter Role
        Role::create(['name' => 'salecenter']);

        //Rider Role
        Role::create(['name' => 'rider']);

        //Owner Role
        $owners = Role::create(['name' => 'owner']);


        $user = User::create([
            'name'=>'user',
            'email' => 'user@zeeroown.com',
            'password' => bcrypt('12345'),
            'o_auth' => '12345',
            'image' => 'default-1.jpg',
        ]);

        $user->assignRole($user_role);

        $user = User::create([
            'name'=>'admin',
            'email' => 'admin@zeeroown.com',
            'password' => bcrypt('12345'),
            'o_auth' => '12345',
            'image' => 'default-2.jpg',
        ]);

        $user->assignRole($admin_role);

        $user = User::create([
            'name'=>'super admin',
            'email' => 'superadmin@zeeroown.com',
            'password' => bcrypt('12345'),
            'o_auth' => '12345',
            'image' => 'default-3.jpg',
        ]);

        $user->assignRole($super_admin_role);


          $user = User::create([
            'name'=>'khan',
            'email' => 'khan@zeeroown.com',
            'password' => bcrypt('12345'),
            'o_auth' => '12345',
            'image' => 'default-4.jpg',
        ]);

        $user->assignRole($owners);

    }
}
