<?php

use App\Models\Outlaw;
use Livewire\Attributes\Computed;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

new class extends Component
{
    use Interactions;

    public array $votes = [];
    public string $highlight = '';
    public string $lastVotedAlias = '';

    public function mount(): void
    {
        $outlaws = Outlaw::orderByDesc('otl_danger_level')
            ->orderByDesc('otl_bounty')
            ->limit(4)
            ->get();

        foreach ($outlaws as $outlaw) {
            $this->votes[$outlaw->otl_id] = rand(5, 30);
        }
    }

    #[Computed]
    public function outlaws()
    {
        return Outlaw::whereIn('otl_id', array_keys($this->votes))
            ->orderByDesc('otl_danger_level')
            ->orderByDesc('otl_bounty')
            ->get();
    }

    public function vote(int $outlawId): void
    {
        if (isset($this->votes[$outlawId])) {
            $this->votes[$outlawId]++;
        }

        $outlaw = Outlaw::find($outlawId);
        $this->lastVotedAlias = $outlaw->otl_alias;

        $this->toast()->success(
            'Voto Registrado!',
            "Voce votou em \"{$outlaw->otl_alias}\""
        )->send();
    }

    public function resetVotes(): void
    {
        foreach ($this->votes as $id => $count) {
            $this->votes[$id] = 0;
        }

        $this->toast()->info('Votos Zerados', 'Todos os votos foram resetados.')->send();
    }
};
