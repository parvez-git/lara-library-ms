<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;
use App\Book;
use App\Author;
<<<<<<< HEAD
use App\Country;
use App\Genre;
use App\Language;
use App\Publisher;
use App\Series;
use DB;
=======
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        User::insert([
          [
            'name'            => 'Mr. Admin',
            'email'           => 'admin@admin.com',
            'password'        => bcrypt('123456'),
            'role'            => 'Admin',
            'role_slug'       => 'admin',
            'remember_token'  => str_random(10)
          ],
          [
            'name'            => 'Mr. Librarian',
            'email'           => 'librarian@librarian.com',
            'password'        => bcrypt('123456'),
            'role'            => 'Librarian',
            'role_slug'       => 'librarian',
            'remember_token'  => str_random(10)
          ],
          [
            'name'            => 'Mr. Member',
            'email'           => 'member@member.com',
            'password'        => bcrypt('123456'),
            'role'            => 'Member',
            'role_slug'       => 'member',
            'remember_token'  => str_random(10)
          ]
=======
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
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
        ]);

        Author::insert([
          [
<<<<<<< HEAD
            'name'        => 'Author 1',
            'slug'        => 'author-1',
            'bio'         => 'Author one bio',
            'country_id'  => 1,
            'language_id' => 1,
            'dateofbirth' => '1970-02-09',
            'image'       => 'author.jpg'
          ],
          [
            'name'        => 'Author 2',
            'slug'        => 'author-2',
            'bio'         => 'Author two bio',
            'country_id'  => 2,
            'language_id' => 2,
            'dateofbirth' => '1960-06-19',
            'image'       => 'author.jpg'
          ],
          [
            'name'        => 'Author 3',
            'slug'        => 'author-3',
            'bio'         => 'Author three bio',
            'country_id'  => 3,
            'language_id' => 3,
            'dateofbirth' => '1980-07-27',
            'image'       => 'author.jpg'
=======
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
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
          ]
        ]);

        Book::insert([
          [
            'title'           => 'Book Title 1',
<<<<<<< HEAD
            'slug'            => 'book-title-1',
            'subtitle'        => 'Book one subtitle',
            'ISBN'            => 1321423325,
            'series_id'       => 1,
            'publisher_id'    => 1,
            'author_id'       => 1,
=======
            'subtitle'        => 'Book one subtitle',
            'ISBN'            => 1321423325,
            'series'          => 'Harry porter series',
            'publisher'       => 'Publisher Name',
            'author_id'       => 1,
            'genre'           => 'Drama',
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
            'edition'         => 'First',
            'published_year'  => 1920,
            'pages'           => 500,
            'binding'         => 'Hardcover',
            'quantity'        => 20,
            'price'           => 200.30,
<<<<<<< HEAD
            'language_id'     => 1,
=======
            'language'        => 'English',
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
            'description'     => 'Book descriptions goes here..',
            'image'           => 'book.jpg'
          ],
          [
            'title'           => 'Book Title 2',
<<<<<<< HEAD
            'slug'            => 'book-title-2',
            'subtitle'        => '',
            'ISBN'            => 1321423326,
            'series_id'       => 2,
            'publisher_id'    => 2,
            'author_id'       => 2,
=======
            'subtitle'        => '',
            'ISBN'            => 1321423326,
            'series'          => 'Harry porter series',
            'publisher'       => 'Publisher Name',
            'author_id'       => 2,
            'genre'           => 'Drama',
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
            'edition'         => 'First',
            'published_year'  => 1930,
            'pages'           => 600,
            'binding'         => 'Hardcover',
            'quantity'        => 30,
            'price'           => 30.20,
<<<<<<< HEAD
            'language_id'     => 2,
=======
            'language'        => 'English',
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
            'description'     => 'Book descriptions goes here..',
            'image'           => 'book.jpg'
          ],
          [
            'title'           => 'Book Title 3',
<<<<<<< HEAD
            'slug'            => 'book-title-3',
            'subtitle'        => '',
            'ISBN'            => 1321423327,
            'series_id'       => 3,
            'publisher_id'    => 3,
            'author_id'       => 3,
=======
            'subtitle'        => '',
            'ISBN'            => 1321423327,
            'series'          => 'Harry porter series',
            'publisher'       => 'Publisher Name',
            'author_id'       => 3,
            'genre'           => 'Drama',
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
            'edition'         => 'First',
            'published_year'  => 1940,
            'pages'           => 400,
            'binding'         => 'Hardcover',
            'quantity'        => 40,
            'price'           => 400,
<<<<<<< HEAD
            'language_id'     => 3,
=======
            'language'        => 'English',
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
            'description'     => 'Book descriptions goes here..',
            'image'           => 'book.jpg'
          ]
        ]);

<<<<<<< HEAD
        Country::insert([
          ['name' => 'Bangladesh', 'slug' => 'bangladesh'],
          ['name' => 'India', 'slug' => 'india'],
          ['name' => 'USA', 'slug' => 'usa']
        ]);

        Genre::insert([
          ['name' => 'Drama', 'slug' => 'drama'],
          ['name' => 'Romance', 'slug' => 'romance'],
          ['name' => 'Action', 'slug' => 'action']
        ]);

        Language::insert([
          ['name' => 'English', 'slug' => 'english'],
          ['name' => 'Bangla', 'slug' => 'bangla'],
          ['name' => 'Japan', 'slug' => 'japan']
        ]);

        Publisher::insert([
          ['name' => 'Alloy Entertainment', 'slug' => 'alloy-entertainment', 'address' => 'New York, USA'],
          ['name' => 'Vasha Chitro', 'slug' => 'vasha-chitro', 'address' => 'Dhaka, Bangladesh'],
          ['name' => 'Japan Publisher', 'slug' => 'japan publisher', 'address' => 'Japan']
        ]);

        Series::insert([
          ['name' => 'Harry Porter', 'slug' => 'harry-porter'],
          ['name' => 'The God Father', 'slug' => 'the-god-father'],
          ['name' => 'Twilight', 'slug' => 'twilight']
        ]);

        DB::table('book_genre')->insert([
          ['book_id' => 1, 'genre_id' => 1],
          ['book_id' => 2, 'genre_id' => 2],
          ['book_id' => 3, 'genre_id' => 3],
          ['book_id' => 1, 'genre_id' => 1],
          ['book_id' => 1, 'genre_id' => 3],
          ['book_id' => 2, 'genre_id' => 3]
        ]);
=======
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d

    }
}
