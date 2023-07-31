<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::insert([
            [
                'variable' => 'megaDownload',
                'value' => 'download link',
            ],
            [
                'variable' => 'driveDownload',
                'value' => 'download link',
            ],
        ]);
    }
}
