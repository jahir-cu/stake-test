<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\PropertiesCampaign;

class PropertiesCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PropertiesCampaign::factory(5)->state(new Sequence(
        //     ['campaign_id' => 1]
        // ))->create();

        PropertiesCampaign::factory()
                ->count(5)
                ->sequence(fn ($sequence) => ['property_id' => $sequence->index+1,  'campaign_id' => 1])
                ->create();
    }
}
