<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Role::whereIn('name', ['Admin','ProductOwner','Junior Developer' , 'Senior Developer', 'DevOps', 'Tester' , 'Manager'])->exists())
        {

        }else{
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'ProductOwner']);
        Role::create(['name' => 'Junior Developer']);
        Role::create(['name' => 'Senior Developer']);
        Role::create(['name' => 'DevOps']);
        Role::create(['name' => 'Tester']);
        Role::create(['name' => 'Manager']);
        }
    }
}
