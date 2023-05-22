<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Admins;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{

        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            app()[PermissionRegistrar::class]->forgetCachedPermissions();


            $miscPermission = Permission::create(['name' => 'N/A', 'guard_name' => 'admin']);

            //UserModel1
            $adminPermission1 = Permission::create(['name' => 'create:admin',  'guard_name' => 'admin']);
            $adminPermission2 = Permission::create(['name' => 'read:admin',  'guard_name' => 'admin']);
            $adminPermission3 = Permission::create(['name' => 'update:admin',  'guard_name' => 'admin']);
            $adminPermission4 = Permission::create(['name' => 'delete:admin',  'guard_name' => 'admin']);

            //RoleModel
            $rolePermission1 = Permission::create(['name' => 'create:role' ,  'guard_name' => 'admin']);
            $rolePermission2 = Permission::create(['name' => 'read:role',  'guard_name' => 'admin']);
            $rolePermission3 = Permission::create(['name' => 'update:role',  'guard_name' => 'admin']);
            $rolePermission4 = Permission::create(['name' => 'delete:role',  'guard_name' => 'admin']);
            //PermissionModel
            $Permission1 = Permission::create(['name' => 'create:permission',  'guard_name' => 'admin']);
            $Permission2 = Permission::create(['name' => 'read:permission',  'guard_name' => 'admin']);
            $Permission3 = Permission::create(['name' => 'update:permission',  'guard_name' => 'admin']);
            $Permission4 = Permission::create(['name' => 'delete:permission',  'guard_name' => 'admin']);
            //Admins
            //Create Roles
            $curyerRole = Role::create(['name' => 'curyer', 'guard_name' => 'admin', ])->syncPermissions([
                $miscPermission,
            ]);
            $superAdminRole = Role::create(['name' => 'superadmin', 'guard_name' => 'admin'])->syncPermissions([
                $adminPermission1,
                $adminPermission2,
                $adminPermission3,
                $adminPermission4,
                $rolePermission1,
                $rolePermission2,
                $rolePermission3,
                $rolePermission4,
                $Permission1,
                $Permission2,
                $Permission3,
                $Permission4,

            ]);
            $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'admin'])->syncPermissions([
                $adminPermission1,
                $adminPermission2,
                $adminPermission3,
                $adminPermission4,
                $rolePermission1,
                $rolePermission2,
                $rolePermission3,
                $rolePermission4,
                $Permission1,
                $Permission2,
                $Permission3,
                $Permission4,
            ]);
            $contentMenagerRole = Role::create(['name' => 'contentmenager','guard_name' => 'admin'])->syncPermissions([
                $adminPermission2,
                $rolePermission2,
                $Permission2,
                $adminPermission2,
            ]);
            $devoloperRole = Role::create(['name' => 'devoloper', 'guard_name' => 'admin'])->syncPermissions([
                $adminPermission1,
                $adminPermission2,
                $adminPermission3,
                $adminPermission4,
                $rolePermission1,
                $rolePermission2,
                $rolePermission3,
                $rolePermission4,
                $Permission1,
                $Permission2,
                $Permission3,
                $Permission4,
            ]);
            Admins::create([
                'name'=>'super admin',
                'is_admin'=>1,
                'email'=>"superadmin@admin.com",
                'email_verified_at'=>now(),
                'password'=>Hash::make('password'),
                'remember_token'=>Str::random(10),
            ])->assignRole($superAdminRole);
            Admins::create([
                'name'=>'admin',
                'is_admin'=>1,
                'email'=>"admin@admin.com",
                'email_verified_at'=>now(),
                'password'=>Hash::make('password'),
                'remember_token'=>Str::random(10),
            ])->assignRole($adminRole);
            Admins::create([
                'name'=>'contentMenager',
                'is_admin'=>1,
                'email'=>"moderator@admin.com",
                'email_verified_at'=>now(),
                'password'=>Hash::make('password'),
                'remember_token'=>Str::random(10),
            ])->assignRole($contentMenagerRole);
            Admins::create([
                'name'=>'devoloper',
                'is_admin'=>1,
                'email'=>"devoloper@admin.com",
                'email_verified_at'=>now(),
                'password'=>Hash::make('password'),
                'remember_token'=>Str::random(10),
            ])->assignRole($devoloperRole);
            for($i=1; $i<50; $i++)
            {
                Admins::create([
                    'name'=>'Test'.$i,
                    'is_admin'=>0,
                    'email'=>"Test".$i."@gmail.com",
                    'email_verified_at'=>now(),
                    'password'=>Hash::make('password'),
                    'remember_token'=>Str::random(10),
                ])->assignRole($curyerRole);

            }
        }
    }
