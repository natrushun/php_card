<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomD=fake()->numberBetween(0,3);
        $randomS=fake()->numberBetween(0,20-$randomD);
        $randomA=fake()->numberBetween(0,20-$randomS-$randomD);
        $randomM=fake()->numberBetween(0,20-$randomA-$randomS-$randomD);

        return [
            'name'=> fake()->name(),
            'defence'=>$randomD,
            'strength'=>$randomS,
            'accuracy'=>$randomA,
            'magic'=>$randomM,


        ];
    }
}
