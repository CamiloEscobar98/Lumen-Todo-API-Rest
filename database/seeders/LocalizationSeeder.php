<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Extra\Localization\Country;

class LocalizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = (array) config('extra.localizations');

        foreach ($countries as $country_data) {
            $country = Country::create(['value' => $country_data['value'], 'slug' => $country_data['slug']]);
            $states = $country_data['states'];
            foreach ($states as $state_data) {
                $state = $country->states()->create(['value' => $state_data['value'], 'slug' => $state_data['slug']]);
                $cities = $state_data['cities'];
                foreach ($cities as $city_data) {
                    $state->cities()->create(['value' => $city_data['value'], 'slug' => $city_data['slug']]);
                }
            }
        }
    }
}
