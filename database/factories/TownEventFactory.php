<?php

namespace Database\Factories;

use App\Models\Outlaw;
use App\Models\TownEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TownEvent>
 */
class TownEventFactory extends Factory
{
    protected $model = TownEvent::class;

    private static array $titlesByType = [
        'robbery' => [
            'Assalto ao Banco Central', 'Roubo na diligência do meio-dia',
            'Assalto ao trem das 15h', 'Roubo no armazém geral',
            'Assalto à carruagem do ouro', 'Roubo de cofre na joalheria',
            'Emboscada na estrada de ferro', 'Roubo de gado na fazenda',
            'Assalto ao correio', 'Roubo de dinamite na mina',
        ],
        'duel' => [
            'Duelo ao meio-dia na rua principal', 'Confronto no saloon',
            'Acerto de contas no cemitério', 'Duelo pela honra',
            'Disputa de terras termina em tiroteio', 'Desafio do forasteiro',
            'Duelo entre caçadores de recompensa', 'Embate na ponte velha',
        ],
        'arrival' => [
            'Chegada de forasteiro misterioso', 'Nova família se instala na cidade',
            'Diligência traz novos moradores', 'Caravana chega do leste',
            'Pregador itinerante na cidade', 'Circo ambulante chegou',
            'Tropeiros de passagem', 'Soldados da cavalaria acamparam',
        ],
        'party' => [
            'Festa de colheita na fazenda', 'Baile no saloon',
            'Casamento do fazendeiro', 'Aniversário da cidade',
            'Celebração da independência', 'Festa junina na praça',
            'Comemoração de captura de bandido', 'Festival de rodeio',
        ],
        'escape' => [
            'Fuga da cadeia municipal', 'Prisioneiro escapou durante transporte',
            'Bandido fugiu do cerco', 'Evasão da prisão na calada da noite',
            'Fuga a cavalo da delegacia', 'Prisioneiro serrou as grades',
            'Bandido escapou pelo telhado', 'Fuga em massa da cadeia',
        ],
    ];

    private static array $locations = [
        'Rua Principal', 'Saloon Estrela', 'Banco Central', 'Estábulo Municipal',
        'Estação de Trem', 'Armazém Geral', 'Igreja', 'Cemitério',
        'Cadeia', 'Praça Central', 'Ferreiro', 'Hotel Descanso',
        'Correio', 'Fazenda Norte', 'Fazenda Sul', 'Mina Velha',
        'Entrada da Cidade', 'Saída Oeste', 'Ponte do Rio', 'Trilha da Serra',
    ];

    public function definition(): array
    {
        $type = fake()->randomElement(['robbery', 'duel', 'arrival', 'party', 'escape']);
        $severity = match ($type) {
            'robbery' => fake()->randomElement(['high', 'critical', 'high', 'medium']),
            'duel' => fake()->randomElement(['high', 'critical', 'medium']),
            'escape' => fake()->randomElement(['critical', 'high', 'high']),
            'arrival' => fake()->randomElement(['low', 'low', 'medium']),
            'party' => fake()->randomElement(['low', 'low', 'low', 'medium']),
        };

        $hasOutlaw = in_array($type, ['robbery', 'duel', 'escape']) || fake()->boolean(15);

        return [
            'outlaw_otl_id' => $hasOutlaw ? Outlaw::inRandomOrder()->value('otl_id') : null,
            'tev_title' => fake()->randomElement(self::$titlesByType[$type]),
            'tev_description' => fake()->paragraph(3),
            'tev_type' => $type,
            'tev_location' => fake()->randomElement(self::$locations),
            'tev_severity' => $severity,
            'tev_resolved' => fake()->boolean(45),
            'tev_happened_at' => fake()->dateTimeBetween('-180 days', 'now'),
        ];
    }
}
