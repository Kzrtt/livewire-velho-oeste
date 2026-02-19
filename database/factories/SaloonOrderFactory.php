<?php

namespace Database\Factories;

use App\Models\Outlaw;
use App\Models\SaloonDrink;
use App\Models\SaloonOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaloonOrder>
 */
class SaloonOrderFactory extends Factory
{
    protected $model = SaloonOrder::class;

    private static array $customerNames = [
        'Velho Tom', 'Dona Maria', 'Zé Bigode', 'João Mineiro', 'Pedro Ferreiro',
        'Ana do Rancho', 'Seu Manoel', 'Padre Miguel', 'Doutor Mendes', 'Coronel Silva',
        'Viúva Rodrigues', 'Barbeiro Antônio', 'Carteiro Paulo', 'Delegado Souza',
        'Fazendeiro Ramos', 'Professor Lima', 'Enfermeira Rosa', 'Juiz Tavares',
    ];

    public function definition(): array
    {
        $drink = SaloonDrink::inRandomOrder()->first();
        $quantity = fake()->numberBetween(1, 5);
        $hasOutlaw = fake()->boolean(40);

        return [
            'outlaw_otl_id' => $hasOutlaw ? Outlaw::inRandomOrder()->value('otl_id') : null,
            'saloon_drink_sdk_id' => $drink->sdk_id,
            'sor_customer_name' => $hasOutlaw ? null : fake()->randomElement(self::$customerNames),
            'sor_quantity' => $quantity,
            'sor_total_price' => $drink->sdk_price * $quantity,
            'sor_status' => fake()->randomElement(['pending', 'preparing', 'served', 'paid', 'paid', 'paid']),
            'sor_notes' => fake()->boolean(20) ? fake()->randomElement([
                'Sem gelo', 'Dose dupla', 'Na conta do xerife', 'Pra viagem',
                'Com limão', 'Bem gelado', 'Garrafa inteira', 'Última rodada',
            ]) : null,
        ];
    }
}
