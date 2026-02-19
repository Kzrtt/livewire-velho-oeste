<?php

namespace Database\Factories;

use App\Models\Gang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gang>
 */
class GangFactory extends Factory
{
    protected $model = Gang::class;

    private static array $gangs = [
        ['name' => 'Serpentes do Deserto', 'territory' => 'Canyon das Sombras'],
        ['name' => 'Alcateia de Prata', 'territory' => 'Serra da Lua'],
        ['name' => 'Filhos do Trovão', 'territory' => 'Planície Vermelha'],
        ['name' => 'Cavaleiros Negros', 'territory' => 'Vale Escuro'],
        ['name' => 'Punhos de Ferro', 'territory' => 'Mina Abandonada'],
        ['name' => 'Sombras do Rio', 'territory' => 'Margem do Rio Seco'],
        ['name' => 'Corvos do Oeste', 'territory' => 'Desfiladeiro do Vento'],
        ['name' => 'Chamas da Fronteira', 'territory' => 'Fronteira Sul'],
    ];

    private static int $index = 0;

    public function definition(): array
    {
        $gang = self::$gangs[self::$index % count(self::$gangs)];
        self::$index++;

        return [
            'gng_name' => $gang['name'],
            'gng_territory' => $gang['territory'],
            'gng_reputation' => fake()->numberBetween(3, 10),
            'gng_active' => fake()->boolean(85),
        ];
    }
}
