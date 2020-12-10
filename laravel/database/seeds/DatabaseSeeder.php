<?php

use App\User;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon; //For timestamps

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class); If i want call aditional seeders

        //USER TABLE
        //DELETE ALL TABLE
        DB::table('users')->delete();
        //INSERT DEFAULT USER DATE
        DB::table('users')->insert([
            'rol' => 'admin',
            'name' => 'Antonio',
            'surname' => 'Lojo',
            'nick' => 'infolojo',
            'email' => 'ajloinformatico@gmail.com',
            'password' => Hash::make('pestillo'), //Encripta la contraseña
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Cristian',
            'surname' => 'Andrade',
            'nick' => 'sobrado',
            'email' => 'cristian@gmail.com',
            'password' => Hash::make('pestillo'), //Encripta la contraseña
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'David',
            'surname' => 'Estevez',
            'nick' => 'Huelvense',
            'email' => 'david@gmail.com',
            'password' => Hash::make('pestillo'), //Encripta la contraseña
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //IMAGES
        //TODO

    }
}
