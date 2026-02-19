<?php

namespace Database\Factories;

use App\Models\BountyHunter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BountyHunter>
 */
class BountyHunterFactory extends Factory
{
    protected $model = BountyHunter::class;

    private static array $aliases = [
        'O Rastreador', 'Olho de Águia', 'Sombra Silenciosa', 'Caçador de Almas',
        'Mão Firme', 'O Justiceiro', 'Lobo da Pradaria', 'Gavião Certeiro',
        'Bala Certa', 'O Implacável', 'Caça-Fantasmas', 'Tiro Certeiro',
        'Rastejador', 'O Paciente', 'Ferro Velho',
    ];

    public function definition(): array
    {
        return [
            'bht_name' => fake()->firstName() . ' ' . fake()->lastName(),
            'bht_alias' => fake()->randomElement(self::$aliases),
            'bht_success_rate' => fake()->randomFloat(2, 25, 98),
            'bht_captures' => fake()->numberBetween(5, 120),
            'bht_active' => fake()->boolean(80),
        ];
    }
}
