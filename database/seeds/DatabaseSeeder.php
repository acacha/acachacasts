<?php

use App\Episode;
use App\Serie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serie = factory(Serie::class)->create([
            'name' => 'Test Driven Laravel',
            'description' => 'By Adam Wathan'
        ]);
        $files = File::allFiles(storage_path('app/public'));
        foreach ($files as $file)
        {
            $file = (string) $file;
            $path_parts = pathinfo($file);
//            echo $file . "\n";
//            echo basename($file) . "\n";
//            echo $path_parts['filename'] . "\n"; // filename is only since PHP 5.2.0
            $episode = factory(Episode::class)->create([
                'name' => $path_parts['filename'],
                'description' => $path_parts['filename'],
                'path' => 'storage/' . basename($file)
            ]);
            $serie->episodes()->save($episode);
        }

    }
}
