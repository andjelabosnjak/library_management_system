<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Administrator
         User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456'),
            'type' => 'admin',
            'contact_number' => '063/547-574',
            'address' => '4201  Tully Street',
            'membership_type_id' => 1,
            'membership_status' => 'paid'
            ]);

            // User 1
            User::create([
                'name' => 'User 1',
                'email' => 'user1@mail.com',
                'password' => bcrypt('123456'),
                'contact_number' => '063/547-741',
                'address' => '4201  Tully Street',
                'membership_type_id' => 1,
                'membership_status' => 'paid'
            ]);

            // User 2
             User::create([
                'name' => 'User 2',
                'email' => 'user2@mail.com',
                'password' => bcrypt('123456'),
                'contact_number' => '063/321-574',
                'address' => '2 Hoover Rd, Havelock, NC, 28532',
                'membership_type_id' => 2,
                'membership_status' => 'paid'
            ]);

            // User 3
            User::create([
                'name' => 'User 3',
                'email' => 'user3@mail.com',
                'password' => bcrypt('123456'),
                'contact_number' => '063/547-874',
                'address' => 'La 1032 Hwy, Denham Springs, LA, 70726 ',
                'membership_type_id' => 1
            ]);

            // User 4 - John Doe
             User::create([
                'name' => 'John Doe',
                'email' => 'john@mail.com',
                'password' => bcrypt('123456'),
                'contact_number' => '063/741-872',
                'address' => 'East Saint Louis, IL, 62203',
                'membership_type_id' => 2
            ]);

            // User 5 - Jane Doe
            User::create([
                'name' => 'Jane Doe',
                'email' => 'jane@mail.com',
                'password' => bcrypt('123456'),
                'contact_number' => '063/547-444',
                'address' => '11 Bluebell Rd, Woodland Park, CO, 80863',
                'membership_type_id' => 2,
                'membership_status' => 'paid'
            ]); 

            // User 6 - Andjela
            User::create([
                'name' => 'Andjela',
                'email' => 'Andjela.bosnjak30@gmail.com',
                'password' => bcrypt('123456'),
                'contact_number' => '063/587-963',
                'address' => 'Bobanova Draga bb 88345, Sovići',
                'membership_type_id' => 1,
                'membership_status' => 'paid'
            ]);
            
    }
}
