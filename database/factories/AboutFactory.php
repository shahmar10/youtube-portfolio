<?php

namespace Database\Factories;

use App\Models\About;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = About::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Elmar Aliyev',
            'birth' => '2000-12-12',
            'email' => 'elmar@gmail.com',
            'phone' => '+9945534232',
            'adress' => 'Yasamal',
            'degree' => 'Backend Developer',
            'body' => 'I am developer'
        ];
    }
}
