<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use App\Models\Library;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        Library::factory(30)->create()->each(function (Library $library) {
            Category::factory(rand(1,50))->create([
                'library_id' => $library->id,
            ]);
        });
        Author::factory(30)->create();
        Book::factory(250)->create();

    }
}
