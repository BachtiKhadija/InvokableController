<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

use App\Models\Author;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create([
            'role'=>"user"
        ]);
        User::factory(2)->create([
            'role'=>"admin"
        ]);
         // créer 10 livres
        $books = Book::factory(10)->create();
        // créer 5 auteurs
        $authors = Author::factory(5)->create();
        // associer les auteurs aux livres
        foreach ($books as $book)
        {
        $book->authors()->attach($authors->random(2)->pluck('id'),['status' => 'writer']);
        }
    }
}
