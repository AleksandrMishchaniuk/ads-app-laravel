<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ad;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 4)->create()->each(function ($user) {
            factory(Ad::class, 12)->create(['user_id' => $user->id]);
        });
    }
}
