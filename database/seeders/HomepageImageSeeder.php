<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomepageImage;

class HomepageImageSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            'presidential_suite',
            'suite',
            'super_deluxe',
            'deluxe',
            'family',
            'standard',
            'twin_bed_super_deluxe',
            'twin_bed_deluxe',
            'twin_bed_standard',
            'deluxe_room',
            'visual1',
            'visual2',
            'visual3',
            'visual4',
            'visual5',
            'visual6',
            'gunja_dining_bar',
            'gunja_atomic_bar',
            'gunja_sattal',
            'garden_side_restaurant',
            'begnas_hall',
            'phoksundo_hall',
            'tilicho_hall'
        ];

        foreach ($sections as $section) {
            HomepageImage::create([
                'section' => $section
            ]);
        }
    }
}
