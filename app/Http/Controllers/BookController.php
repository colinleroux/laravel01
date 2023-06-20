<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('authors')->paginate(20);

        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            $errorMessage = "Book not found";
            return view('books.show', compact('errorMessage'));
        }

        return view('books.show', compact('book'));
    }

    public function create()
    {
        $authors = Author::all();

        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'isbn_10' => 'required|unique:books,isbn_10',
            'isbn_13' => 'required|unique:books,isbn_13',
            'authors' => 'required|array',
        ]);

        $book = Book::create($request->except('authors')); // Exclude 'authors' from mass assignment
        $book->authors()->attach($request->input('authors')); // Attach selected authors to the book

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $authors = Author::all();

        if (!$book) {
            return view('books.edit')->with('message', 'Book Not Found');
        }

        return view('books.edit', compact('book', 'authors'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'isbn_10' => ['required', 'max:10', 'unique:books,isbn_10,' . $id],
            'isbn_13' => ['required', 'max:13', 'unique:books,isbn_13,' . $id],
            'authors' => 'required|array',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->except('authors')); // Exclude 'authors' from update
        $book->authors()->sync($request->input('authors')); // Sync selected authors

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->authors()->detach();
            $book->delete();

            return redirect()->back()->with('bookDeleted', true);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, 'Book not found');
        }
    }}
