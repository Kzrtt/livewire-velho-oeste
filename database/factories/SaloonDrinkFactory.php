<?php

namespace Database\Factories;

use App\Models\SaloonDrink;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaloonDrink>
 */
class SaloonDrinkFactory extends Factory
{
    protected $model = SaloonDrink::class;

    private static array $drinks = [
        ['name' => 'Whiskey Bourbon', 'type' => 'whiskey', 'price' => 3.00, 'alcoholic' => true],
        ['name' => 'Whiskey de Centeio', 'type' => 'whiskey', 'price' => 3.50, 'alcoholic' => true],
        ['name' => 'Whiskey Irlandês', 'type' => 'whiskey', 'price' => 4.00, 'alcoholic' => true],
        ['name' => 'Whiskey do Barman', 'type' => 'whiskey', 'price' => 2.50, 'alcoholic' => true],
        ['name' => 'Cerveja da Casa', 'type' => 'beer', 'price' => 1.00, 'alcoholic' => true],
        ['name' => 'Cerveja Escura', 'type' => 'beer', 'price' => 1.50, 'alcoholic' => true],
        ['name' => 'Cerveja de Raiz', 'type' => 'beer', 'price' => 0.75, 'alcoholic' => false],
        ['name' => 'Sarsaparilla', 'type' => 'other', 'price' => 0.50, 'alcoholic' => false],
        ['name' => 'Vinho Tinto', 'type' => 'wine', 'price' => 2.00, 'alcoholic' => true],
        ['name' => 'Vinho do Porto', 'type' => 'wine', 'price' => 3.00, 'alcoholic' => true],
        ['name' => 'Café Preto', 'type' => 'coffee', 'price' => 0.25, 'alcoholic' => false],
        ['name' => 'Café com Whiskey', 'type' => 'coffee', 'price' => 1.50, 'alcoholic' => true],
        ['name' => 'Rum da Jamaica', 'type' => 'other', 'price' => 2.50, 'alcoholic' => true],
        ['name' => 'Tequila', 'type' => 'other', 'price' => 2.00, 'alcoholic' => true],
        ['name' => 'Absinto', 'type' => 'other', 'price' => 5.00, 'alcoholic' => true],
        ['name' => 'Limonada', 'type' => 'other', 'price' => 0.30, 'alcoholic' => false],
        ['name' => 'Água', 'type' => 'other', 'price' => 0.10, 'alcoholic' => false],
        ['name' => 'Leite', 'type' => 'other', 'price' => 0.20, 'alcoholic' => false],
        ['name' => 'Chá Gelado', 'type' => 'other', 'price' => 0.35, 'alcoholic' => false],
        ['name' => 'Gim', 'type' => 'other', 'price' => 2.00, 'alcoholic' => true],
    ];

    private static int $index = 0;

    public function definition(): array
    {
        $drink = self::$drinks[self::$index % count(self::$drinks)];
        self::$index++;

        return [
            'sdk_name' => $drink['name'],
            'sdk_type' => $drink['type'],
            'sdk_price' => $drink['price'],
            'sdk_alcoholic' => $drink['alcoholic'],
            'sdk_available' => fake()->boolean(90),
        ];
    }
}
