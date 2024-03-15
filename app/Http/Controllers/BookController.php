<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Create a new book instance
        $book = new Book();
        $book->name = $request->name;
        $book->publisher = $request->publisher;
        // Assign other properties as needed
        $book->save();

        // Redirect to the index page with success message
        return redirect()->route('book.index')->with('success', 'Book created successfully!');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Update the book instance
        $book->name = $request->name;
        $book->publisher = $request->publisher;
        // Update other properties as needed
        $book->save();

        // Redirect back to the index page with success message
        return redirect()->route('book.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        // Delete the book record
        $book->delete();

        // Redirect back to the index page with success message
        return redirect()->route('book.index')->with('success', 'Book deleted successfully!');
    }
}
