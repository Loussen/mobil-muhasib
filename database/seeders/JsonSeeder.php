<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class JsonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '-1');
        /* Country */
        $countries = json_decode(File::get(database_path('seed-data/json/countries.json'), true));
        foreach ($countries as $country) {

            Country::create([
                'name'            => $country->name,
                'iso3'            => $country->iso3,
                'numeric_code'    => $country->numeric_code,
                'iso2'            => $country->iso2,
                'phone_code'      => $country->phone_code,
                'capital'         => $country->capital,
                'currency'        => $country->currency,
                'currency_name'   => $country->currency_name,
                'currency_symbol' => $country->currency_symbol,
                'tld'             => $country->tld,
                'native'          => $country->native,
                'timezones'       => json_encode($country->timezones, true),
                'translations'    => json_encode($country->translations, true),
                'latitude'        => $country->latitude,
                'longitude'       => $country->longitude,
                'emoji'           => $country->emoji,
                'emojiU'          => $country->emojiU,
            ]);
        }
        /* States */
        $states = json_decode(File::get(database_path('seed-data/json/states.json'), true));
        foreach ($states as $state) {

            $name = trim(str_replace('District', '', $state->name));
            City::create([
                'name'       => $name,
                'full_name'  => $state->country_name . " - " . $name,
                'country_id' => $state->country_id,
                'latitude'   => $state->latitude,
                'longitude'  => $state->longitude,
            ]);
        }
    }
}
