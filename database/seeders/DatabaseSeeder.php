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
            'name' => 'Jumlah pesaing (radius 2km)'
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
            'name' => 'Lebih dari 6',
            'score' => 1
        ]);
        Profile::create([
            'criteria_id' => 1,
            'name' => '5 - 6',
            'score' => 2
        ]);
        Profile::create([
            'criteria_id' => 1,
            'name' => '3 - 4',
            'score' => 3
        ]);
        Profile::create([
            'criteria_id' => 1,
            'name' => '1 - 3',
            'score' => 4
        ]);
        Profile::create([
            'criteria_id' => 1,
            'name' => 'Tidak ada',
            'score' => 5
        ]);

        Profile::create([
            'criteria_id' => 2,
            'name' => 'Hanya dapat diakses kendaraan roda dua',
            'score' => 2
        ]);
        Profile::create([
            'criteria_id' => 2,
            'name' => 'Dapat diakses kendaraan roda empat',
            'score' => 4
        ]);
        Profile::create([
            'criteria_id' => 3,
            'name' => 'Dua arah',
            'score' => 4
        ]);
        Profile::create([
            'criteria_id' => 3,
            'name' => 'Satu arah',
            'score' => 2
        ]);

        Factor::create([
            'name' => 'Core Factor'
        ]);
        Factor::create([
            'name' => 'Secondary Factor'
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'ekapuput44@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => 1
        ]);
        User::create([
            'name' => 'Puput',
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
