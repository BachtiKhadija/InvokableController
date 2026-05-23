<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class BookController extends Controller
{
    use AuthorizesRequests;
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ?Book $book = null)
    {

        /*
        ======================
        INDEX
        ======================
        */

        if(
            $request->isMethod('GET')
            &&
            $request->path() == 'books'
        )
        {
            $books = Book::with('authors')->get();

            return view('books.index', compact('books'));
        }

        /*
        ======================
        CREATE FORM
        ======================
        */

        if(
            $request->isMethod('GET')
            &&
            $request->path() == 'books/create'
        )
        {
            return view('books.form');
        }

        /*
        ======================
        STORE
        ======================
        */

        if($request->isMethod('POST'))
        {
            Book::create([

                'title' => $request->title,
                'description' => $request->description,
                'isbn' => $request->isbn,
                'published_at' => now(),
                'pages' => $request->pages

            ]);

            return redirect('/books')
                    ->with('success', 'Livre ajouté');
        }

        /*
        ======================
        EDIT FORM
        ======================
        */

        if(
            $request->isMethod('GET')
            &&
            str_contains($request->path(), 'edit')
        )
        {
            return view('books.form', compact('book'));
        }

        /*
        ======================
        UPDATE
        ======================
        */

        if($request->isMethod('PUT'))
        {
            $this->authorize('update', $book);

            $book->update([

                'title' => $request->title,
                'description' => $request->description,
                'isbn' => $request->isbn,
                'pages' => $request->pages

            ]);

            return redirect('/books')
                    ->with('success', 'Livre modifié');
        }

        /*
        ======================
        DELETE
        ======================
        */

        if($request->isMethod('DELETE'))
        {
            $this->authorize('delete', $book);

            $book->delete();

            return redirect('/books')
                    ->with('success', 'Livre supprimé');
        }
    }
}
