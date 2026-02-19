<?php

namespace Database\Factories;

use App\Models\Gang;
use App\Models\Outlaw;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Outlaw>
 */
class OutlawFactory extends Factory
{
    protected $model = Outlaw::class;

    private static array $aliases = [
        'O Pistoleiro', 'Olho de Cobra', 'Dedo Rápido', 'Sombra', 'El Loco',
        'Mão de Ferro', 'Coyote', 'Víbora', 'Trovão', 'Fantasma',
        'Bala Perdida', 'Olho Morto', 'Cicatriz', 'Raposa', 'Escorpião',
        'Dente de Ouro', 'Chapéu Negro', 'Corvo', 'Serpente', 'Punho de Aço',
        'Relâmpago', 'Poeira', 'Garra', 'Lobo Solitário', 'Diabo Vermelho',
        'Três Dedos', 'Cara de Pau', 'Meia-Noite', 'Ventania', 'Gavião',
    ];

    private static array $crimes = [
        'Assalto a banco', 'Roubo de trem', 'Roubo de diligência', 'Roubo de gado',
        'Assalto a mão armada', 'Contrabando de armas', 'Falsificação de dinheiro',
        'Fuga da prisão', 'Destruição de propriedade', 'Tráfico de cavalos roubados',
        'Fraude no pôquer', 'Incêndio criminoso', 'Roubo de ouro', 'Emboscada na estrada',
        'Extorsão de fazendeiros',
    ];

    public function definition(): array
    {
        return [
            'gang_gng_id' => fake()->boolean(70) ? Gang::inRandomOrder()->value('gng_id') : null,
            'otl_name' => fake()->firstName() . ' ' . fake()->lastName(),
            'otl_alias' => fake()->randomElement(self::$aliases),
            'otl_bounty' => fake()->randomFloat(2, 100, 15000),
            'otl_crime' => fake()->randomElement(self::$crimes),
            'otl_status' => fake()->randomElement(['wanted', 'wanted', 'wanted', 'captured', 'escaped']),
            'otl_danger_level' => fake()->numberBetween(1, 5),
            'otl_last_seen_at' => fake()->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
