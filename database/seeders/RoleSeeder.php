<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name'=>'Admin',
            'permission' =>'yes'
        ]);

        Role::create([
            'name'=>'Editor',
            'permission' =>'no'
        ]);

        Role::create([
            'name'=>'Publisher',
            'permission' =>'no'
        ]);

    }
    
}
