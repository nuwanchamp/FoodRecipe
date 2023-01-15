<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodRecipe>
 */
class FoodRecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $foods = json_decode(file_get_contents(storage_path()."/food.json"), true);
        $selectedFood = $this->faker->randomElement($foods);
        return [
            "name" => $selectedFood["name"],
            "short_description" => $this->faker->text(),
            "description" => $this->faker->text(maxNbChars: 400),
            "nutrition" => serialize($selectedFood["nutrition_per_100g"]),
            "ingredients" => $this->faker->text(500),
            "cuisine_id" => 1
        ];
    }
}
