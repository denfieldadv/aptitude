<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'article_id' => 1,
                'user_id' => 1,
                'content' => 'Don\'t you find all of these to be a waste of our time Steve? We are the actors after all.',
                'created_at' => Carbon::now()->subDays(7)->subHours(2)->subMinutes(14),
                'updated_at' => Carbon::now()->subDays(7)->subHours(2)->subMinutes(14),
            ],
            [
                'article_id' => 1,
                'user_id' => 4,
                'content' => 'Why spoil the fun Tony? Avengers Assemble!',
                'created_at' => Carbon::now()->subDays(7),
                'updated_at' => Carbon::now()->subDays(7),
            ],
            [
                'article_id' => 1,
                'user_id' => 3,
                'content' => 'With all due respect, you really do need to acknowledge that the avengers don\'t exist... its fiction!',
                'created_at' => Carbon::now()->subDays(6)->subHours(6)->subMinutes(38),
                'updated_at' => Carbon::now()->subDays(6)->subHours(6)->subMinutes(38),
            ],
            [
                'article_id' => 1,
                'user_id' => 4,
                'content' => 'Then why are you using your characters name?',
                'created_at' => Carbon::now()->subDays(6)->subHours(6)->subMinutes(30),
                'updated_at' => Carbon::now()->subDays(6)->subHours(6)->subMinutes(30),
            ],
            [
                'article_id' => 1,
                'user_id' => 2,
                'content' => 'Lol.',
                'created_at' => Carbon::now()->subDays(4)->subHours(3)->subMinutes(2),
                'updated_at' => Carbon::now()->subDays(4)->subHours(3)->subMinutes(2),
            ],
            [
                'article_id' => 3,
                'user_id' => 4,
                'content' => 'Wow, no wonder our contracts haven\'t been renewed...',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
