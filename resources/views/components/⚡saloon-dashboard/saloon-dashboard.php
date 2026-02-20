<?php

use App\Models\SaloonDrink;
use App\Models\SaloonOrder;
use Livewire\Attributes\Computed;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

new class extends Component
{
    use Interactions;

    public int $orderCount = 0;

    // New order modal state
    public bool $newOrderModal = false;
    public ?int $selectedDrinkId = null;
    public int $orderQuantity = 1;
    public string $customerName = '';

    public function mount(): void
    {
        $this->orderCount = SaloonOrder::count();
    }

    #[Computed]
    public function drinks()
    {
        return SaloonDrink::available()->orderBy('sdk_type')->orderBy('sdk_name')->get();
    }

    public function openNewOrder(): void
    {
        $this->selectedDrinkId = null;
        $this->orderQuantity = 1;
        $this->customerName = '';
        $this->newOrderModal = true;
    }

    public function placeOrder(): void
    {
        if (!$this->selectedDrinkId) {
            $this->toast()->error('Erro', 'Selecione uma bebida!')->send();
            return;
        }

        $drink = SaloonDrink::find($this->selectedDrinkId);
        if (!$drink) return;

        SaloonOrder::create([
            'saloon_drink_sdk_id' => $drink->sdk_id,
            'sor_customer_name' => $this->customerName ?: 'Forasteiro',
            'sor_quantity' => $this->orderQuantity,
            'sor_total_price' => $drink->sdk_price * $this->orderQuantity,
            'sor_status' => 'pending',
        ]);

        $this->orderCount = SaloonOrder::count();
        $this->newOrderModal = false;

        $this->toast()->success(
            'Pedido Registrado!',
            "{$this->orderQuantity}x {$drink->sdk_name} para " . ($this->customerName ?: 'Forasteiro')
        )->send();
    }

    public function quickOrder(): void
    {
        $drink = SaloonDrink::available()->inRandomOrder()->first();
        if (!$drink) return;

        $names = ['Forasteiro', 'Cowboy Joe', 'Xerife', 'Barman', 'Viajante', 'Pistoleiro', 'Garimpeiro', 'Bandoleiro'];

        SaloonOrder::create([
            'saloon_drink_sdk_id' => $drink->sdk_id,
            'sor_customer_name' => $names[array_rand($names)],
            'sor_quantity' => rand(1, 3),
            'sor_total_price' => $drink->sdk_price * rand(1, 3),
            'sor_status' => 'pending',
        ]);

        $this->orderCount = SaloonOrder::count();
    }
};
