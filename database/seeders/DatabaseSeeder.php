<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 * @package Database\Seeders
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Username',
            'email' => 'user@gmail.com',
            'password' => 'password'
        ]);

        $items = [
            'sport' =>
                [
                    'games',
                    'cyclic',
                    'сomplex coordination',
                    'strenuous',
                    'martial arts',
                    'technical',
                    'aviation',
                    'extreme',
                    'applied',
                    'acyclic',
                    'individual'
                ],
            'aviation' =>
                [
                    'parachute🪂',
                    'hang glider'
                ],
            'acyclic' => [
                'diving'
            ],
            'martial arts' => [
                'boxing',
                'karate 🥋',
                'judo 🥋',
                'sambo 🤼',
                'sports wrestling 🤼',
                'taekwondo 🥋',
                'hand-to-hand combat🤼‍♂️',
                'armsport 💪',
                'jujutsu',
                'kickboxing 🥊',
                'fencing 🤺',
                'thai boxing',
                'aikido',
                'sumo',
                'kudo',
                'wushu',
                'mas-wrestling',
                'kyokushin',
                'chanbara',
                'pankration'
            ],
            'games' => [
                'football ⚽️',
                'basketball 🏀',
                'cricket',
                'tennis🎾',
                'rugby🏉',
                'hockey',
                'volleyball 🏐',
                'golf⛳🏌',
                'go',
                'baseball⚾',
                'badminton',
                'checkers',
                'chess♟',
                'badminton j.',
                'billiards',
                'bowling 🎳',
                'american football🏈',
                'field hockey🏑',
                'computer sports💻',
                'paintball',
                'darts 🎯',
                'curling🥌',
                'laptops',
                'handball',
                'floorball',
                'squash',
                'snooker',
                'bochcha',
                'korfbal',
                'rocketball',
                'rugball',
                'softball',
                'ringett'
            ],
            'individual' => ['fitness',
                'yoga🧘',
                'aerobics',
                'dancing',
                'trampoline',
                'tubing'
            ],
            'strenuous' => [
                'weightlifting 🏋',
                'bodybuilding 🏋',
                'powerlifting 🏋',
                'kettlebell sport🏋'
            ],
            'complex coordination' => [
                'gymnastics 🤸',
                'acrobatics 🤸',
                'surfing🏄',
                'figure skating ⛸',
                'cheerleading',
                'roller sports',
                'sandboarding',
                'short track'
            ],
            'technical' => [
                'archery🏹',
                'yachting⛵',
                'motorsport🏎',
                'motorcycles🏍',
                'bobsled',
                'archery🏹',
                'radio sports'
            ],
            'cyclic' => [
                'athletics🏃',
                'bicycle',
                'swimming 🏊',
                'biathlon🎿',
                'triathlon',
                'rowing',
                'ВМХ🚲',
                'water polo🤽',
                'luge',
                'polyathlon',
                'skeleton',
                'aquathlon'
            ],
            'extreme' => [
                'alpine skiing ⛷',
                'snowboard 🏂',
                'skateboards',
                'equestrian sport🏇',
                'rock climbing 🧗',
                'parkour',
                'diving🤿',
                'wakeboard',
                'mountain bike',
                'rafting',
                'kitesseling',
                'ice climbing',
                'carving',
                'skibord'
            ]
        ];

        foreach ($items as $key => $item) {
            /** @var Category $category */
            $category = Category::create(['name' => $key]);

            foreach ($item as $value) {
                $category->interests()->create([
                    'user_id' => $user->id,
                    'name' => $value
                ]);
            }
        }
    }
}
