<?php

namespace Database\Seeders;

use App\Models\BountyHunter;
use App\Models\Gang;
use App\Models\Horse;
use App\Models\Outlaw;
use App\Models\SaloonDrink;
use App\Models\SaloonOrder;
use App\Models\SheriffReport;
use App\Models\TownEvent;
use Illuminate\Database\Seeder;

class WildWestSeeder extends Seeder
{
    public function run(): void
    {
        // Order matters: parent tables first, then dependents

        // 1. Gangs (8) - no dependencies
        Gang::factory(8)->create();

        // 2. Outlaws (30) - depends on gangs
        Outlaw::factory(30)->create();

        // 3. Horses (45) - depends on outlaws
        Horse::factory(45)->create();

        // 4. Bounty Hunters (15) - no dependencies
        BountyHunter::factory(15)->create();

        // 5. Saloon Drinks (20) - no dependencies
        SaloonDrink::factory(20)->create();

        // 6. Saloon Orders (500) - depends on outlaws + drinks
        SaloonOrder::factory(500)->create();

        // 7. Sheriff Reports (800) - depends on outlaws + hunters
        SheriffReport::factory(800)->create();

        // 8. Town Events (2000) - depends on outlaws
        TownEvent::factory(2000)->create();
    }
}
