<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::create(['title'=>'Grand Theft Auto VI', 'genre'=>'Adventure action','gamepad'=>true]);
        Game::create(['title'=>'Cyberpunk 2077', 'genre'=>'Action RPG','gamepad'=>true]);
        Game::create(['title'=>'Minecraft', 'genre'=>'Sandbox','gamepad'=>true]);
        Game::create(['title'=>'Counter-Strike 2', 'genre'=>'Shooter','gamepad'=>false]);
        Game::create(['title'=>'Dota 2', 'genre'=>'MOBA','gamepad'=>true]);
        Game::create(['title'=>'The Sims 4', 'genre'=>'Life simulator','gamepad'=>false]);
        Game::create(['title'=>'Rust', 'genre'=>'Survival simulator','gamepad'=>true]);
        Game::create(['title'=>'Grand Theft Auto V', 'genre'=>'Adventure action','gamepad'=>true]);
        Game::create(['title'=>'Escape From Tarkov', 'genre'=>'First-person shooter','gamepad'=>false]);
    }
}
