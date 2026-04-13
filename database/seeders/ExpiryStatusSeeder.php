<?php

namespace Database\Seeders;

use App\Models\ExpiryStatusModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ExpiryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            [
                'name' => 'Expired',
                'min_day' => -9999,
                'max_day' => 0,
                'priority' => 1,
            ],
            [
                'name' => 'Critical',
                'min_day' => 1,
                'max_day' => 5,
                'priority' => 2,
            ],
            [
                'name' => 'Warning',
                'min_day' => 6,
                'max_day' => 14, 
                'priority' => 3,
            ],
            [
                'name' => 'Good',
                'min_day' => 15,
                'max_day' => 9999,
                'priority' => 4,
            ],
        ];

        foreach ($list as $l) {
            ExpiryStatusModel::updateOrCreate(
                ['name' => $l['name']], 
                [
                    'uuid' => (string) Str::orderedUuid(),
                    'min_day' => $l['min_day'],
                    'max_day' => $l['max_day'],
                    'priority' => $l['priority'],
                ]
            );
        }
    }
}
