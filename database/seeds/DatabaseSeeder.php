<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;
use App\Book;
// use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Role::insert([
          ['name' => 'Admin', 'description' => 'Administrator'],
          ['name' => 'Librarian', 'description' => 'Librarian'],
          ['name' => 'Member', 'description' => 'Member or Student']
        ]);

        User::insert([
          ['name' => 'Mr. Admin', 'email' => 'admin@admin.com', 'password' => bcrypt('123456'),'remember_token' => str_random(10)],
          ['name' => 'Mr. Librarian', 'email' => 'librarian@librarian.com', 'password' => bcrypt('123456'),'remember_token' => str_random(10)],
          ['name' => 'Mr. Member', 'email' => 'member@member.com', 'password' => bcrypt('123456'),'remember_token' => str_random(10)]
        ]);

        DB::table('role_user')->insert([
          ['role_id' => 1, 'user_id' => 1],
          ['role_id' => 2, 'user_id' => 2],
          ['role_id' => 3, 'user_id' => 3],
          ['role_id' => 1, 'user_id' => 1],
          ['role_id' => 1, 'user_id' => 3],
          ['role_id' => 2, 'user_id' => 3]
        ]);

        Book::insert([
          [
            'title'           => 'Book Title 1',
            'subtitle'        => 'Book one subtitle',
            'ISBN'            => 1321423325,
            'series'          => 'Harry porter series',
            'publisher'       => 'Publisher Name',
            'author'          => 'Jone Doe',
            'genre'           => 'Drama',
            'edition'         => 'First',
            'published_year'  => 1920,
            'pages'           => 500,
            'binding'         => 'Hardcover',
            'quantity'        => 20,
            'price'           => 200,
            'language'        => 'English',
            'description'     => 'Book descriptions goes here..',
            'image'           => 'book.jpg'
          ],
          [
            'title'           => 'Book Title 2',
            'subtitle'        => '',
            'ISBN'            => 1321423326,
            'series'          => 'Harry porter series',
            'publisher'       => 'Publisher Name',
            'author'          => 'Jone Doe',
            'genre'           => 'Drama',
            'edition'         => 'First',
            'published_year'  => 1930,
            'pages'           => 600,
            'binding'         => 'Hardcover',
            'quantity'        => 30,
            'price'           => 300,
            'language'        => 'English',
            'description'     => 'Book descriptions goes here..',
            'image'           => 'book.jpg'
          ],
          [
            'title'           => 'Book Title 3',
            'subtitle'        => '',
            'ISBN'            => 1321423327,
            'series'          => 'Harry porter series',
            'publisher'       => 'Publisher Name',
            'author'          => 'Jone Doe',
            'genre'           => 'Drama',
            'edition'         => 'First',
            'published_year'  => 1940,
            'pages'           => 400,
            'binding'         => 'Hardcover',
            'quantity'        => 40,
            'price'           => 400,
            'language'        => 'English',
            'description'     => 'Book descriptions goes here..',
            'image'           => 'book.jpg'
          ]
        ]);


    }
}
