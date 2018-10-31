<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;
use App\Book;
use App\Author;
use App\Country;
use App\Genre;
use App\Language;
use App\Publisher;
use App\Series;
use App\Post;
use App\Setting;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
          [
            'site_name' => 'LIB MS',
            'email'     => 'admin@admin.com'
          ]
        ]);

        User::insert([
          [
            'name'            => 'Mr. Admin',
            'email'           => 'admin@admin.com',
            'password'        => bcrypt('123456'),
            'role_id'         => 1,
            'status'          => 1,
            'remember_token'  => str_random(10),
            'created_at'      => date("Y-m-d H:i:s")
          ],
          [
            'name'            => 'Mr. Librarian',
            'email'           => 'librarian@librarian.com',
            'password'        => bcrypt('123456'),
            'role_id'         => 2,
            'status'          => 1,
            'remember_token'  => str_random(10),
            'created_at'      => date("Y-m-d H:i:s")
          ],
          [
            'name'            => 'Mr. Member',
            'email'           => 'member@member.com',
            'password'        => bcrypt('123456'),
            'role_id'         => 3,
            'status'          => 1,
            'remember_token'  => str_random(10),
            'created_at'      => date("Y-m-d H:i:s")
          ]
        ]);

        Role::insert([
            ['name' => 'Admin',     'slug' => 'admin'],
            ['name' => 'Librarian', 'slug' => 'librarian'],
            ['name' => 'Member',    'slug' => 'member']
        ]);

        Author::insert([
          [
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
          ]
        ]);

        Book::insert([
          [
            'title'           => 'Book Title 1',
            'slug'            => 'book-title-1',
            'subtitle'        => 'Book one subtitle',
            'ISBN'            => 1321423325,
            'series_id'       => 1,
            'publisher_id'    => 1,
            'author_id'       => 1,
            'edition'         => 'First',
            'published_year'  => 1920,
            'pages'           => 500,
            'binding'         => 'Hardcover',
            'quantity'        => 20,
            'price'           => 200.30,
            'language_id'     => 1,
            'description'     => 'Book descriptions goes here..',
            'image'           => 'book.jpg'
          ],
          [
            'title'           => 'Book Title 2',
            'slug'            => 'book-title-2',
            'subtitle'        => '',
            'ISBN'            => 1321423326,
            'series_id'       => 2,
            'publisher_id'    => 2,
            'author_id'       => 2,
            'edition'         => 'First',
            'published_year'  => 1930,
            'pages'           => 600,
            'binding'         => 'Hardcover',
            'quantity'        => 30,
            'price'           => 30.20,
            'language_id'     => 2,
            'description'     => 'Book descriptions goes here..',
            'image'           => 'book.jpg'
          ],
          [
            'title'           => 'Book Title 3',
            'slug'            => 'book-title-3',
            'subtitle'        => '',
            'ISBN'            => 1321423327,
            'series_id'       => 3,
            'publisher_id'    => 3,
            'author_id'       => 3,
            'edition'         => 'First',
            'published_year'  => 1940,
            'pages'           => 400,
            'binding'         => 'Hardcover',
            'quantity'        => 40,
            'price'           => 400,
            'language_id'     => 3,
            'description'     => 'Book descriptions goes here..',
            'image'           => 'book.jpg'
          ]
        ]);

        Country::insert([
          ['name' => 'Bangladesh',  'slug' => 'bangladesh'],
          ['name' => 'India',       'slug' => 'india'],
          ['name' => 'USA',         'slug' => 'usa']
        ]);

        Genre::insert([
          ['name' => 'Drama',   'slug' => 'drama'],
          ['name' => 'Romance', 'slug' => 'romance'],
          ['name' => 'Action',  'slug' => 'action']
        ]);

        Language::insert([
          ['name' => 'English', 'slug' => 'english'],
          ['name' => 'Bangla',  'slug' => 'bangla'],
          ['name' => 'Japan',   'slug' => 'japan']
        ]);

        Publisher::insert([
          ['name' => 'Alloy Entertainment', 'slug' => 'alloy-entertainment', 'address' => 'New York, USA'],
          ['name' => 'Vasha Chitro',        'slug' => 'vasha-chitro',        'address' => 'Dhaka, Bangladesh'],
          ['name' => 'Japan Publisher',     'slug' => 'japan-publisher',     'address' => 'Japan']
        ]);

        Series::insert([
          ['name' => 'Harry Porter',    'slug' => 'harry-porter'],
          ['name' => 'The God Father',  'slug' => 'the-god-father'],
          ['name' => 'Twilight',        'slug' => 'twilight']
        ]);

        DB::table('book_genre')->insert([
          ['book_id' => 1, 'genre_id' => 1],
          ['book_id' => 2, 'genre_id' => 2],
          ['book_id' => 3, 'genre_id' => 3],
          ['book_id' => 1, 'genre_id' => 1],
          ['book_id' => 1, 'genre_id' => 3],
          ['book_id' => 2, 'genre_id' => 3]
        ]);

        Post::insert([
          [
            'title'         => 'Blog Title 1',
            'slug'          => 'post-1',
            'content'       => 'Blog post content goes here..',
            'status'        => 1,
            'published_on'  => date("Y-m-d"),
            'image'         => 'post.jpg',
            'user_id'       => 1,
            'created_at'    => date("Y-m-d H:i:s")
          ],
          [
            'title'         => 'Blog Title 2',
            'slug'          => 'post-2',
            'content'       => 'Blog post content goes here..',
            'status'        => 1,
            'published_on'  => date("Y-m-d"),
            'image'         => 'post.jpg',
            'user_id'       => 1,
            'created_at'    => date("Y-m-d H:i:s")
          ],
          [
            'title'         => 'Blog Title 3',
            'slug'          => 'post-3',
            'content'       => 'Blog post content goes here..',
            'status'        => 1,
            'published_on'  => date("Y-m-d"),
            'image'         => 'post.jpg',
            'user_id'       => 1,
            'created_at'    => date("Y-m-d H:i:s")
          ]

        ]);

    }
}
