<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Place;
use \App\Models\Character;
use \App\Models\Contest;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $users=User::factory(rand(6,15))->create();

        $admins =User::factory(rand(1,2))->create(['admin' =>true]);

        $allusers=$users->concat($admins);
    
        $places=Place::factory(rand(6,15))->create();
        
        $enemyCharacters=Character::factory(rand(5,12))->create(['enemy' => true]);

        $heroCharacters=Character::factory(rand(10,20))->create();

        $contests=Contest::factory(rand(6,16))->create();

        
        $heroCharacters -> each(function($h) use ($allusers){
            //User 1-N Characters

            $h->user()->associate( $allusers->random() )->save();
        });

        
        //enemy character csak adminak lehet
        $enemyCharacters->each(function($e) use($admins){

            //User 1-N Characters
            $e->user()->associate($admins->random())->save();
        });

        
        $contests->each(function($c) use ($places ,$allusers, $heroCharacters, $enemyCharacters) {

            //Place 1-N Contests
            $c->place()->associate($places->random())->save();

            

            //Character N-M Contests
            $playableC =$heroCharacters->random();
            $nonPlayableC =$enemyCharacters->random();
            $heroHp=fake()->randomFloat(2,0,20);
            $enemyHp=fake()->randomFloat(2,0,20);
            if($heroHp==0){
                $c->win->false;
            }
            if($enemyHp==0){
                $c->win->true;
            }
            $c->characters()->attach($playableC,[ 'hero_hp' => $heroHp, 'enemy_hp' => $enemyHp]);
            $c->characters()->attach($nonPlayableC,[ 'hero_hp' => $heroHp, 'enemy_hp' => $enemyHp]);

            //User 1-N Contests
            $user = $playableC->user;
            $c->user()->associate($user)->save();


        });
        
            
    }
}
