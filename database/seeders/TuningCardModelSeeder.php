<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TuningCardModelSeeder extends Seeder
{
   
    public function run(): void
    {
        $tuningCards = [
            [
                'title' => 'Спортивный выхлоп',
                'image' => 'https://i.pinimg.com/originals/94/c3/aa/94c3aaa2ba0b2ac6b6f0da977253cc5f.jpg?nii=t',
                'description' => 'Высокопроизводительная выхлопная система',
                'type' => 'Выхлопная система',
                'status' => false,
                'favorite' => false,
                'amount' => 10,
                'cost' => 50000,
            ],
            [
                'title' => 'Турбонаддув',
                'image' => 'https://ir-3.ozone.ru/s3/multimedia-1-e/c1000/6957258386.jpg',
                'description' => 'Система турбонаддува для увеличения мощности',
                'type' => 'Двигатель',
                'status' => false,
                'favorite' => false,
                'amount' => 5,
                'cost' => 150000
            ],
            [
                'title' => 'Спортивная подвеска',
                'image' => 'https://a.d-cd.net/YQAAAgE5UeA-1920.jpg',
                'description' => 'Комплект спортивной подвески для улучшения управляемости',
                'type' => 'Подвеска',
                'status' => false,
                'favorite' => false,
                'amount' => 8,
                'cost' => 75000
            ],
        ];

        foreach ($tuningCards as $card) {
            DB::table('tuning_card_models')->insert($card);
        }
    }
}