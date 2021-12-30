<?php

  
namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\adminuser;
use Illuminate\Support\Facades\Hash;

   

class AdminUserSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {
        adminuser::create([

            'name' => 'Nitish singh',

            'email' => 'nitishsingh4748@gmail.com',

            'password' => Hash::make('scientist4488')

        ]);
}
}