<?php
namespace Database\Seeders;
use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder {
public function run(): void {
$newsData = [
[
'uk' => ['title' => 'Приведи друга', 'content' => 'Отримай знижку -50% на абонемент!'],
'en' => ['title' => 'Bring a friend', 'content' => 'Get a 50% discount on your membership!']
],
[
'uk' => ['title' => 'Акція -30%', 'content' => 'На перші 8 персональних тренувань.'],
'en' => ['title' => '-30% Promotion', 'content' => 'On the first 8 personal training sessions.']
],
[
'uk' => ['title' => 'СПА зона', 'content' => 'Акційна пропозиція на місячний абонемент у спа-зону.'],
'en' => ['title' => 'SPA Zone', 'content' => 'Promotional offer for a monthly SPA zone membership.']
],
[
'uk' => ['title' => 'Марафон схуднення', 'content' => '30 днів дієти та щоденних групових тренувань.'],
'en' => ['title' => 'Weight Loss Marathon', 'content' => '30 days of diet and daily group workouts.']
],
[
'uk' => ['title' => 'Нові протеїнові коктейлі', 'content' => 'Завезення нових смаків протеїнових коктейлів.'],
'en' => ['title' => 'New Protein Shakes', 'content' => 'Arrival of new protein shake flavors.']
],
[
'uk' => ['title' => 'Змагання з плавання', 'content' => 'Запрошуємо на майбутні змагання по плаванню.'],
'en' => ['title' => 'Swimming Competitions', 'content' => 'We invite you to the upcoming swimming competitions.']
],
[
'uk' => ['title' => 'Нові послуги', 'content' => 'Поява пресотерапії та індивідуальних занять по стретчінгу.'],
'en' => ['title' => 'New Services', 'content' => 'Introduction of pressotherapy and personal stretching sessions.']
]
];

foreach ($newsData as $data) {
$news = News::create();
$news->translations()->createMany([
['locale' => 'uk', 'title' => $data['uk']['title'], 'content' => $data['uk']['content']],
['locale' => 'en', 'title' => $data['en']['title'], 'content' => $data['en']['content']],
]);
}
}
}
