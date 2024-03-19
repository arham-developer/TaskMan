<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit as UnitModel;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['name' => 'Default', 'created_at' => now()],
            ['name' => 'Department A', 'created_at' => now()],
            ['name' => 'Department B', 'created_at' => now()],
        ];

        UnitModel::insert($units);
    }
}
