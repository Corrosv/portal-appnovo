<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'logradouro' => $this->faker->name,
            'endereco' => $this->faker->adress,
            'cep' => $this->faker->numberBetween($min= 1000000000, $max = 9000000000),
            'id_cidade' => Cidade::pluck('id')->random()
        ];
    }
}
