<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Factor;
use App\Models\IdealProfile;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        Criteria::create([
            'factor_id' => 1,
            'name' => 'Frekuensi keramaian'
        ]);
        Criteria::create([
            'factor_id' => 1,
            'name' => 'Akses lokasi'
        ]);
        Criteria::create([
            'factor_id' => 2,
            'name' => 'Jalur lalulintas'
        ]);


        Profile::create([
            'criteria_id' => 1,
            'name' => 'Sangat ramai',
            'score' => 4
        ]);
        Profile::create([
            'criteria_id' => 1,
            'name' => 'Ramai',
            'score' => 3
        ]);
        Profile::create([
            'criteria_id' => 1,
            'name' => 'Sepi',
            'score' => 2
        ]);
        Profile::create([
            'criteria_id' => 1,
            'name' => 'Sangat sepi',
            'score' => 1
        ]);
        Profile::create([
            'criteria_id' => 2,
            'name' => 'Kendaraan roda dua',
            'score' => 2
        ]);
        Profile::create([
            'criteria_id' => 2,
            'name' => 'Kendaraan roda empat',
            'score' => 4
        ]);
        Profile::create([
            'criteria_id' => 3,
            'name' => 'dua arah',
            'score' => 4
        ]);
        Profile::create([
            'criteria_id' => 3,
            'name' => 'satu arah',
            'score' => 2
        ]);

        Factor::create([
            'name' => 'Secondary Factor'
        ]);
        Factor::create([
            'name' => 'Core Factor'
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'ekapuput44@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => 1
        ]);
        User::create([
            'name' => 'retailer',
            'email' => 'puputnovianti99@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => 0
        ]);

        IdealProfile::create([
            'criteria_id' => 1,
            'profile_id' => 1,
        ]);

        IdealProfile::create([
            'criteria_id' => 2,
            'profile_id' => 5,
        ]);

        IdealProfile::create([
            'criteria_id' => 3,
            'profile_id' => 7,
        ]);
    }
}
