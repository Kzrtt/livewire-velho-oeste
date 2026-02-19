<?php

namespace Database\Factories;

use App\Models\BountyHunter;
use App\Models\Outlaw;
use App\Models\SheriffReport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SheriffReport>
 */
class SheriffReportFactory extends Factory
{
    protected $model = SheriffReport::class;

    private static array $titles = [
        'Avistamento suspeito na estrada', 'Tiroteio próximo ao banco',
        'Roubo no armazém geral', 'Perseguição a cavalo pela pradaria',
        'Briga no saloon', 'Tentativa de fuga da cadeia',
        'Emboscada na trilha do rio', 'Incêndio no celeiro',
        'Contrabando na fronteira', 'Duelo na rua principal',
        'Roubo de cavalos no estábulo', 'Vandalismo no cemitério',
        'Invasão de propriedade', 'Falsificação de documentos',
        'Ameaça ao carteiro', 'Patrulha noturna - tudo calmo',
        'Patrulha da manhã - sem incidentes', 'Escolta de diligência',
        'Verificação de fronteira', 'Ronda no distrito comercial',
    ];

    private static array $locations = [
        'Rua Principal', 'Saloon Estrela', 'Banco Central', 'Estábulo Municipal',
        'Estação de Trem', 'Armazém Geral', 'Igreja', 'Cemitério',
        'Cadeia', 'Escritório do Xerife', 'Ferreiro', 'Hotel Descanso',
        'Correio', 'Barbeiro', 'Mina Velha', 'Trilha do Rio',
        'Fazenda Norte', 'Fazenda Sul', 'Entrada da Cidade', 'Saída Oeste',
    ];

    public function definition(): array
    {
        $type = fake()->randomElement(['sighting', 'sighting', 'capture', 'escape', 'incident', 'incident', 'patrol', 'patrol']);

        return [
            'outlaw_otl_id' => in_array($type, ['sighting', 'capture', 'escape'])
                ? Outlaw::inRandomOrder()->value('otl_id')
                : (fake()->boolean(30) ? Outlaw::inRandomOrder()->value('otl_id') : null),
            'bounty_hunter_bht_id' => in_array($type, ['capture', 'sighting'])
                ? (fake()->boolean(60) ? BountyHunter::inRandomOrder()->value('bht_id') : null)
                : null,
            'shr_title' => fake()->randomElement(self::$titles),
            'shr_description' => fake()->paragraph(2),
            'shr_type' => $type,
            'shr_location' => fake()->randomElement(self::$locations),
            'shr_resolved' => fake()->boolean(55),
            'shr_reported_at' => fake()->dateTimeBetween('-90 days', 'now'),
        ];
    }
}
