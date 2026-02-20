<?php

use App\Models\Outlaw;
use Livewire\Attributes\Computed;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

new class extends Component
{
    use Interactions;

    public string $search = '';
    public string $statusFilter = 'all';
    public int $sightingCount = 0;

    // Modal state
    public bool $editBountyModal = false;
    public ?int $editingBountyId = null;
    public string $editingBountyValue = '';
    public string $editingOutlawName = '';

    public function mount(): void
    {
        $this->sightingCount = rand(10, 50);
    }

    #[Computed]
    public function outlaws()
    {
        $query = Outlaw::with('gang');

        if ($this->search !== '') {
            $query->search($this->search);
        }

        if ($this->statusFilter !== 'all') {
            $query->where('otl_status', $this->statusFilter);
        }

        return $query->orderByDesc('otl_bounty')->limit(12)->get();
    }

    public function capture(int $outlawId): void
    {
        usleep(600000);
        Outlaw::where('otl_id', $outlawId)->update(['otl_status' => 'captured']);
        unset($this->outlaws);

        $this->toast()->success('Capturado!', 'O fora-da-lei foi preso com sucesso.')->send();
    }

    public function confirmRelease(int $outlawId): void
    {
        $this->dialog()
            ->question('Soltar Prisioneiro?', 'Tem certeza? Este fora-da-lei e perigoso!')
            ->confirm('Sim, Soltar', 'release', $outlawId)
            ->cancel('Cancelar')
            ->send();
    }

    public function release(int $outlawId): void
    {
        usleep(600000);
        Outlaw::where('otl_id', $outlawId)->update(['otl_status' => 'wanted']);
        unset($this->outlaws);

        $this->toast()->warning('Solto!', 'O fora-da-lei foi liberado. Cuidado!')->send();
    }

    public function openEditBounty(int $outlawId, string $currentBounty, string $outlawName): void
    {
        $this->editingBountyId = $outlawId;
        $this->editingBountyValue = $currentBounty;
        $this->editingOutlawName = $outlawName;
        $this->editBountyModal = true;
    }

    public function saveBounty(): void
    {
        Outlaw::where('otl_id', $this->editingBountyId)->update([
            'otl_bounty' => (float) $this->editingBountyValue,
        ]);

        $this->editBountyModal = false;
        $this->editingBountyId = null;
        unset($this->outlaws);

        $this->toast()->success('Recompensa Atualizada!', 'O novo valor foi salvo com sucesso.')->send();
    }

    public function refreshSightings(): void
    {
        $this->sightingCount += rand(1, 5);
    }
};
