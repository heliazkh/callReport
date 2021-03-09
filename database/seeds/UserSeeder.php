<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
                'first_name' => 'helia',
                'last_name' => 'zolfkhani',
                'username' => 'admin',
                'email' => 'zolfkhani.h@dpi.ir',
                'mobile' => '09128130959',
                'password' => Hash::make('helia.zolfkhAni@030227'),
            ]
        );
    }
}
