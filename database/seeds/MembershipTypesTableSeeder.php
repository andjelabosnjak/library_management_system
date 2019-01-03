<?php

use Illuminate\Database\Seeder;
use App\MembershipType;

class MembershipTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Standard Membership
         MembershipType::create([
            'type_name' => 'Standard',
            'type_details' => '20$'
          ]);

        //Premium Membership
         MembershipType::create([
            'type_name' => 'Premium',
            'type_details' => '45$ + free delivery'
          ]);
    }
}
