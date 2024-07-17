<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SQLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sqlFiles = [
            'airlines',
            'airports',
            'timezones',
            'currencies',
        ];

        foreach ($sqlFiles as $sqlFile) {
            try {
                $sql = File::get(database_path('seed-data/sql/' . $sqlFile . '.sql'));
                DB::unprepared($sql);
            } catch (\Exception $e) {
                // Log the error or output it for debugging
                logger()->error("Error seeding $sqlFile: " . $e->getMessage());
                // Optionally, you can stop the execution if an error occurs
                // return;
            }
        }
    }
}
