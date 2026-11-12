<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        $tagsData = [
            'gym'        => ['name' => 'Зал'],
            'pool'       => ['name' => 'Басейн'],
            'spa'        => ['name' => 'СПА'],
            'pt'         => ['name' => 'Персональне тренування'],
            'massage'    => ['name' => 'Масаж'],
            'supplements'=> ['name' => 'Добавки'],
        ];

        $tags = [];
        foreach ($tagsData as $key => $data) {
            $tags[$key] = Tag::firstOrCreate(['name' => $data['name']]);
        }

        $subscriptions = [
            // Звичайні абонементи
            [
                'title'       => 'Абонемент Звичайний (1 рік)',
                'price'       => 12000.00,
                'description' => 'Необмежений доступ до тренажерного залу на 12 місяців.',
                'tags'        => [$tags['gym']->id],
            ],
            [
                'title'       => 'Абонемент Звичайний (6 місяців)',
                'price'       => 7000.00,
                'description' => 'Необмежений доступ до тренажерного залу на 6 місяців.',
                'tags'        => [$tags['gym']->id],
            ],
            [
                'title'       => 'Абонемент Звичайний (1 місяць)',
                'price'       => 1500.00,
                'description' => 'Безлімітне відвідування тренажерного залу протягом місяця.',
                'tags'        => [$tags['gym']->id],
            ],

            // Преміум абонементи
            [
                'title'       => 'Абонемент Преміум (1 рік)',
                'price'       => 24000.00,
                'description' => 'Повний доступ до залу, аквазони та СПА-комплексу протягом року.',
                'tags'        => [$tags['gym']->id, $tags['pool']->id, $tags['spa']->id],
            ],
            [
                'title'       => 'Абонемент Преміум (6 місяців)',
                'price'       => 14000.00,
                'description' => 'Повний доступ до залу, басейну та СПА на пів року.',
                'tags'        => [$tags['gym']->id, $tags['pool']->id, $tags['spa']->id],
            ],
            [
                'title'       => 'Абонемент Преміум (1 місяць)',
                'price'       => 3000.00,
                'description' => 'Повний місячний безліміт на зал, басейн та СПА-зону.',
                'tags'        => [$tags['gym']->id, $tags['pool']->id, $tags['spa']->id],
            ],

            // СПА абонементи
            [
                'title'       => 'Абонемент у СПА (1 рік)',
                'price'       => 15000.00,
                'description' => 'Річний безлімітний доступ до СПА-зони, фінської сауни та хамаму.',
                'tags'        => [$tags['spa']->id],
            ],
            [
                'title'       => 'Абонемент у СПА (3 місяці)',
                'price'       => 5000.00,
                'description' => 'Доступ до СПА-релаксу та саун протягом 3 місяців.',
                'tags'        => [$tags['spa']->id],
            ],
            [
                'title'       => 'Абонемент у СПА (1 місяць)',
                'price'       => 2000.00,
                'description' => 'Місячний абонемент на відвідування СПА-комплексу.',
                'tags'        => [$tags['spa']->id],
            ],

            // Персональні тренування
            [
                'title'       => 'Абонемент на 10 персональних тренувань у басейні',
                'price'       => 4500.00,
                'description' => '10 індивідуальних занять з тренером з плавання в аквазоні.',
                'tags'        => [$tags['pool']->id, $tags['pt']->id],
            ],
            [
                'title'       => 'Абонемент на 10 персональних тренувань у залі',
                'price'       => 4000.00,
                'description' => '10 персональних занять із кваліфікованим інструктором тренажерного залу.',
                'tags'        => [$tags['gym']->id, $tags['pt']->id],
            ],

            // Масаж та фітнес-бар
            [
                'title'       => 'Абонемент на 10 масажів',
                'price'       => 6000.00,
                'description' => 'Курс із 10 сеансів відновлювального або спортивного масажу.',
                'tags'        => [$tags['massage']->id],
            ],
            [
                'title'       => 'Абонемент на 20 протеїнових коктейлів (знижка -20%)',
                'price'       => 1600.00,
                'description' => 'Пакет із 20 протеїнових коктейлів у фітнес-барі за вигідною ціною зі знижкою 20%.',
                'tags'        => [$tags['supplements']->id],
            ],
        ];

        foreach ($subscriptions as $item) {
            $subscription = Subscription::create([
                'title'       => $item['title'],
                'price'       => $item['price'],
                'description' => $item['description'],
            ]);

            $subscription->tags()->sync($item['tags']);
        }
    }
}
