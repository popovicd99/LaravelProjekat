<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Lending;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Book::truncate();
        Lending::truncate();
        Category::truncate();
        User::truncate();

        $cat1 = Category::factory()->create();
        $cat2 = Category::factory()->create();
        $cat3 = Category::factory()->create();

        $book = Book::factory()->create([
            'categorie_id'=>$cat1
        ]);
        $book1 = Book::factory()->create([
            'categorie_id'=>$cat2
        ]);
        
        Book::factory(3)->create([
            'categorie_id'=>$cat3
        ]);
        $user = User::factory()->create();

        Lending::factory()->create([
            'user_id'=>$user->id,
            'book_id'=>$book->id
        ]);
        Lending::factory()->create([
            'user_id'=>$user->id,
            'book_id'=>$book1->id
        ]);

    }
}
