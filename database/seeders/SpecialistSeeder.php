<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Specialist::insert([
            ['photo' => 'https://placehold.co/80x80/2b2b2b/4da6ff?text=S', 'name' => 'Світлана', 'specialty' => 'плавання', 'experience' => 5, 'phone' => '+380990000001', 'price' => 350],
            ['photo' => 'https://placehold.co/80x80/2b2b2b/4da6ff?text=K', 'name' => 'Каріна', 'specialty' => 'тренажерний зал, групові', 'experience' => 4, 'phone' => '+380990000002', 'price' => 350],
            ['photo' => 'https://placehold.co/80x80/2b2b2b/4da6ff?text=Kr', 'name' => 'Крістіна', 'specialty' => 'групові тренування', 'experience' => 2, 'phone' => '+380990000003', 'price' => 250],
            ['photo' => 'https://placehold.co/80x80/2b2b2b/4da6ff?text=O', 'name' => 'Олександр', 'specialty' => 'тренажерний зал', 'experience' => 9, 'phone' => '+380990000004', 'price' => 350],
            ['photo' => 'https://placehold.co/80x80/2b2b2b/4da6ff?text=E', 'name' => 'Евгеній', 'specialty' => 'масажист', 'experience' => 5, 'phone' => '+380990000005', 'price' => 450],
            ['photo' => 'https://placehold.co/80x80/2b2b2b/4da6ff?text=V', 'name' => 'Володимир', 'specialty' => 'плавання', 'experience' => 11, 'phone' => '+380990000006', 'price' => 350],
            ['photo' => 'https://placehold.co/80x80/2b2b2b/4da6ff?text=Ok', 'name' => 'Оксана', 'specialty' => 'масажист', 'experience' => 10, 'phone' => '+380990000007', 'price' => 450],
            ['photo' => 'https://placehold.co/80x80/2b2b2b/4da6ff?text=D', 'name' => 'Діана', 'specialty' => 'тренажерний зал', 'experience' => 3, 'phone' => '+380990000008', 'price' => 350],
        ]);
    }
}
