<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);                
        $this->call(BencanaSeeder::class);             
        $this->call(PermintaanP3kSeeder::class);       
        $this->call(DataKorbanSeeder::class);          
        $this->call(KontakDaruratSeeder::class);       
        $this->call(RelawanSeeder::class);             
        $this->call(PenugasanRelawanSeeder::class); 
    }
}
