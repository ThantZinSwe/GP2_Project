<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\Language;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
        ]);
        Role::create([
            'name' => 'user',
        ]);
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'address'  => 'Yangon',
            'phone'    => '09123456789',
            'role_id'  => 1,
            'password' => Hash::make('12345678'),
        ]);

        Language::create([
            'name' => 'Laravel',
            'slug' => Str::slug('Laravel'),
        ]);

        Language::create([
            'name' => 'PHP',
            'slug' => Str::slug('PHP'),
        ]);

        Language::create([
            'name' => 'Javascript',
            'slug' => Str::slug('Javascript'),
        ]);

        Language::create([
            'name' => 'Dart',
            'slug' => Str::slug('Dart'),
        ]);

        Language::create([
            'name' => 'Java',
            'slug' => Str::slug('Java'),
        ]);
        Coupon::create([
            'code' => '#ft000',
            'discount' => 20,
        ]);
    }
}
