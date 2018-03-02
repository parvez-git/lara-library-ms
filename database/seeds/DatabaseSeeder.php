<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;
use App\Book;
use App\Author;

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

        Author::insert([
          [
            'name' => 'Author 1',
            'bio' => 'Author one bio',
            'country' => 'United State',
            'language' => 'English',
            'dateofbirth' => '1970-02-09',
            'image' => 'author.jpg'
          ],
          [
            'name' => 'Author 2',
            'bio' => 'Author two bio',
            'country' => 'Bangladesh',
            'language' => 'Bangla',
            'dateofbirth' => '1960-06-19',
            'image' => 'author.jpg'
          ],
          [
            'name' => 'Author 3',
            'bio' => 'Author three bio',
            'country' => 'United State',
            'language' => 'English',
            'dateofbirth' => '1980-07-27',
            'image' => 'author.jpg'
          ]
        ]);

        Book::insert([
          [
            'title'           => 'Book Title 1',
            'subtitle'        => 'Book one subtitle',
            'ISBN'            => 1321423325,
            'series'          => 'Harry porter series',
            'publisher'       => 'Publisher Name',
            'author_id'       => 1,
            'genre'           => 'Drama',
            'edition'         => 'First',
            'published_year'  => 1920,
            'pages'           => 500,
            'binding'         => 'Hardcover',
            'quantity'        => 20,
            'price'           => 200.30,
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
            'author_id'       => 2,
            'genre'           => 'Drama',
            'edition'         => 'First',
            'published_year'  => 1930,
            'pages'           => 600,
            'binding'         => 'Hardcover',
            'quantity'        => 30,
            'price'           => 30.20,
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
            'author_id'       => 3,
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
