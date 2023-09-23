<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class ProductsFactory extends Factory
{

    private $categoryTypes = [
        'Bag',
        'Shoes',
        'Shirt',
        'Pants',
        'Dress',
        'Appliances',
        'Tech'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $selected = fake()->randomElement($this->categoryTypes);
        return [
            'name' => fake()->firstName().' '.$selected,
            'category' => $selected,
            'description' => fake()->realText(100),
            'datetime_created' => fake()->dateTimeThisDecade()
        ];
    }
}
