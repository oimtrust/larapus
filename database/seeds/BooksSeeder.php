<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Book;
use App\BorrowLog;
use App\User;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Sample penulis
        $author1 = Author::create(['name'=>'Fathur Rohim']);
        $author2 = Author::create(['name'=>'Naila Amani']);
        $author3 = Author::create(['name'=>'Maulida Haq']);

        //Sample buku
        $book1 = Book::create(['title'=>'Belajar Framework Laravel', 'amount'=>3, 'author_id'=>$author1->id]);
        $book2 = Book::create(['title'=>'Belajar PHP Native', 'amount'=>10, 'author_id'=>$author1->id]);
        $book3 = Book::create(['title'=>'Belajar Bahasa Inggris', 'amount'=>3, 'author_id'=>$author2->id]);
        $book4 = Book::create(['title'=>'Literature Of Culture', 'amount'=>3, 'author_id'=>$author3->id]);

        //Sample peminjam buku
        $member = User::where('email', 'member@gmail.com')->first();
        BorrowLog::create(['user_id' => $member->id, 'book_id' => $book1->id, 'is_returned' => 0]);
        BorrowLog::create(['user_id' => $member->id, 'book_id' => $book2->id, 'is_returned' => 0]);
        BorrowLog::create(['user_id' => $member->id, 'book_id' => $book3->id, 'is_returned' => 1]);
    }
}
