<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Negocio>
 */
class NegocioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $latlong =
        $this->faker->latitude() .','.
        $this->faker->longitude();
        return [
            //
            'nome_fantasia' => $this->faker->name ,
            'descricao' => $this->faker->text($maxNbchars = 200),
            'contato' => $this->faker->phoneNumber,
            'latitude_longitude' => $this->faker-> $latlang,
            'ativo' => $this->faker->boolean,
            'id_tipo_negocio' => TipoNegocio::pluck('id')->random(),
            'id_endereco' => endereco::pluck('id')->random()

        ];
    }
}
