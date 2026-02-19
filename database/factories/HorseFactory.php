<?php

namespace Database\Factories;

use App\Models\Horse;
use App\Models\Outlaw;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Horse>
 */
class HorseFactory extends Factory
{
    protected $model = Horse::class;

    private static array $names = [
        'Relâmpago', 'Trovão', 'Furacão', 'Ventania', 'Sombra',
        'Espírito', 'Cometa', 'Estrela', 'Noite', 'Faísca',
        'Tornado', 'Mustang', 'Apache', 'Bravo', 'Valente',
        'Bandido', 'Tempestade', 'Touro', 'Fantasma', 'Fogo',
        'Pistola', 'Raio', 'Cobre', 'Prata', 'Ouro',
        'Flecha', 'Diabo', 'Vento', 'Poeira', 'Corisco',
        'Ferradura', 'Seta', 'Gavião', 'Lobo', 'Pantera',
        'Dinamite', 'Pólvora', 'Luar', 'Sol Nascente', 'Rio Bravo',
        'Cactus', 'Deserto', 'Canyon', 'Sierra', 'Dakota',
    ];

    private static array $breeds = [
        'Mustang', 'Quarter Horse', 'Appaloosa', 'Paint Horse', 'Morgan',
        'Thoroughbred', 'Arabian', 'Tennessee Walker', 'Crioulo', 'Mangalarga',
    ];

    private static array $colors = [
        'Baio', 'Alazão', 'Preto', 'Branco', 'Pintado',
        'Palomino', 'Ruão', 'Tordilho', 'Castanho', 'Pampa',
    ];

    public function definition(): array
    {
        return [
            'outlaw_otl_id' => fake()->boolean(65) ? Outlaw::inRandomOrder()->value('otl_id') : null,
            'hrs_name' => fake()->randomElement(self::$names),
            'hrs_breed' => fake()->randomElement(self::$breeds),
            'hrs_color' => fake()->randomElement(self::$colors),
            'hrs_speed' => fake()->numberBetween(3, 10),
            'hrs_stolen' => fake()->boolean(30),
        ];
    }
}
