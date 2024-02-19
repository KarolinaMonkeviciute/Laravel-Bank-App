<?php

namespace Database\Seeders;

use App\Services\GenerateAccountNumber;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\Client;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@bank.com',
            'password' => Hash::make('123'),
        ]);

        $faker = Faker::create('lt_LT');

        foreach (range(1, 20) as $i) {

            DB::table('clients')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'code' => $faker->regexify('/[3-6][0-9]{2}[0,1][0-9][0-9]{2}[0-9]{4}/'),
            ]);
    }

    $clients = Client::pluck('id')->toArray();
    
    foreach (range(1, 100) as $i) {
        DB::table('accounts')->insert([
            'account_number' => GenerateAccountNumber::generateNumber(),
            'client_id' => $faker->randomElement($clients),
        ]);
    }
}
}
