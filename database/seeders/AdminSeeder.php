<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Osama Roshdy',
            'email' => 'osamaaroshdy@gmail.com',
            'password' => 123456
        ]);

        $admin->assignRole('Super Admin');

    }
}
