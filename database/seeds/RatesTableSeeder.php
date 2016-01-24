<?php

use Illuminate\Database\Seeder;

class RatesTableSeeder extends Seeder
{
    /**
     * Seed the rates table with the default values from the spec
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->truncate();

        DB::table('rates')->insert([
            'from' => 'USD',
            'to' => 'ZAR',
            'rate' => 13.3054,
            'notification_list' => '',
        ]);

        DB::table('rates')->insert([
            'from' => 'USD',
            'to' => 'GBP',
            'rate' => 0.651178,
            'notification_list' => 'shaunalberts@gmail.com',
        ]);

        DB::table('rates')->insert([
            'from' => 'USD',
            'to' => 'EUR',
            'rate' => 0.884872,
            'notification_list' => '',
        ]);

        DB::table('rates')->insert([
            'from' => 'USD',
            'to' => 'KES',
            'rate' => 103.860,
            'notification_list' => '',
        ]);

    }
}
