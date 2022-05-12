<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


use function Ramsey\Uuid\v1;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = Role::firstOrCreate(['name' => 'owner']);
        $manager = Role::firstOrCreate(['name' => 'manager']);
        $reception = Role::firstOrCreate(['name' => 'reception']);
        $worker = Role::firstOrCreate(['name' => 'worker']);
        $customer = Role::firstOrCreate(['name' => 'customer']);

        Permission::firstOrCreate(['name' => 'view booked rooms count'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'view incomes'])->assignRole($owner);
        Permission::firstOrCreate(['name' => 'view expenses'])->assignRole($owner);
        Permission::firstOrCreate(['name' => 'view balance'])->assignRole($owner);
        Permission::firstOrCreate(['name' => 'view any reviews count'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'view visitors count'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'view any rooms'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'create rooms'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'edit rooms'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'view rooms'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'edit status rooms'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'view status rooms'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'edit price rooms'])->assignRole($owner);
        Permission::firstOrCreate(['name' => 'view any reservations'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'create reservations'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'edit reservations'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'delete reservations'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'view any room services'])->assignRole([$owner, $manager, $reception, $worker]);
        Permission::firstOrCreate(['name' => 'create room services'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'edit room services'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'delete room services'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'view room services'])->assignRole([$owner, $manager, $reception, $worker]);
        Permission::firstOrCreate(['name' => 'view room services requests'])->assignRole([$owner, $manager, $reception, $worker]);
        Permission::firstOrCreate(['name' => 'create room services requests'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'edit room services requests'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'delete room services requests'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'view any employees'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'create employees'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'edit employees'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'delete employees'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'view employee'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'view any offers'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'create offers'])->assignRole($owner);
        Permission::firstOrCreate(['name' => 'edit offers'])->assignRole($owner);
        Permission::firstOrCreate(['name' => 'delete offers'])->assignRole($owner);
        Permission::firstOrCreate(['name' => 'view offers'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'view any messages'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'view messages'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'replay messages'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'view any transactions'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'create transactions'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'edit transactions'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'ubdate transactions'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'view any reviews'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'view  reviews'])->assignRole([$owner, $manager]);
        Permission::firstOrCreate(['name' => 'view any newsletters'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'view newsletter infos'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'create newsletters'])->assignRole([$owner, $manager, $reception]);
        Permission::firstOrCreate(['name' => 'send newsletters'])->assignRole([$owner, $manager, $reception]);

        User::firstOrCreate([
            'email' => 'admin@hotel.com',
        ], [
            'name' => 'Owner',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'country' => 'Syria',
            'national_id' => '0308004032',
            'phone_number' => '+963974527482',
            'salary' => '1000000',
            'job_title' => 'Owner',
        ])->assignRole($owner);


        User::firstOrCreate([
            'email' => 'manager@hotel.com',
        ], [
            'name' => 'Manager',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'country' => 'Syria',
            'national_id' => '0308002030',
            'phone_number' => '+96398462174',
            'salary' => '80000',
            'job_title' => 'Manager',

        ])->assignRole($manager);

        User::firstOrCreate([
            'email' => 'reception@hotel.com',
        ], [
            'name' => 'Reception',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'country' => 'Syria',
            'national_id' => '0308002044',
            'phone_number' => '+9639336548264',
            'salary' => '50000',
            'job_title' => 'Reception',

        ])->assignRole($reception);


        User::firstOrCreate([
            'email' => 'worker@hotel.com',
        ], [
            'name' => 'Worker',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'country' => 'Syria',
            'national_id' => '0307022334',
            'phone_number' => '+9639876473644',
            'salary' => '30000',
            'job_title' => 'Worker',

        ])->assignRole($worker);

        User::firstOrCreate([
            'email' => 'customer@hotel.com',
        ], [
            'name' => 'Customer',
            'phone_number'  => '+963912332145',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole($customer);
    }
}
