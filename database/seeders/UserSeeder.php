<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'phone' => '081200000001',
            'password' => bcrypt(12345678),
            'level' => 'Public',
            'image' => asset('images/faces/1.jpg'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::create([
            'name' => 'user2',
            'username' => 'user2',
            'email' => 'user2@gmail.com',
            'phone' => '081200000002',
            'password' => bcrypt(12345678),
            'level' => 'Public',
            'image' => asset('images/faces/2.jpg'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::create([
            'name' => 'user3',
            'username' => 'user3',
            'email' => 'user3@gmail.com',
            'phone' => '081200000003',
            'password' => bcrypt(12345678),
            'level' => 'Public',
            'image' => asset('images/faces/3.jpg'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::create([
            'name' => 'user4',
            'username' => 'user4',
            'email' => 'user4@gmail.com',
            'phone' => '081200000004',
            'password' => bcrypt(12345678),
            'level' => 'Public',
            'image' => asset('images/faces/4.jpg'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::create([
            'name' => 'user5',
            'username' => 'user5',
            'email' => 'user5@gmail.com',
            'phone' => '081200000005',
            'password' => bcrypt(12345678),
            'level' => 'Public',
            'image' => asset('images/faces/5.jpg'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::create([
            'name' => 'user6',
            'username' => 'user6',
            'email' => 'user6@gmail.com',
            'phone' => '081200000006',
            'password' => bcrypt(12345678),
            'level' => 'Public',
            'image' => asset('images/faces/6.jpg'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::create([
            'name' => 'user7',
            'username' => 'user7',
            'email' => 'user7@gmail.com',
            'phone' => '081200000007',
            'password' => bcrypt(12345678),
            'level' => 'Public',
            'image' => asset('images/faces/7.jpg'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::create([
            'name' => 'user8',
            'username' => 'user8',
            'email' => 'user8@gmail.com',
            'phone' => '081200000008',
            'password' => bcrypt(12345678),
            'level' => 'Public',
            'image' => asset('images/faces/8.jpg'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::create([
            'name' => 'user9',
            'username' => 'user9',
            'email' => 'user9@gmail.com',
            'phone' => '081200000009',
            'password' => bcrypt(12345678),
            'level' => 'Public',
            'image' => asset('images/faces/1.jpg'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::create([
            'name' => 'user10',
            'username' => 'user10',
            'email' => 'user10@gmail.com',
            'phone' => '081200000010',
            'password' => bcrypt(12345678),
            'level' => 'Public',
            'image' => asset('images/faces/2.jpg'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::create([
            'name' => "Daffa Nabil H",
            'username' => "daffa",
            'image' =>  "images/user/admin.png",
            'email' => "admin@gmail.com",
            'phone' => "081200000000",
            'level' => "Admin",
            'email_verified_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'password' => bcrypt('12345678')
        ]);

    }
}
