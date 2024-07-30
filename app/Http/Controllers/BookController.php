<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:100',
            'isbn'        => 'required|min:10|max:17|unique:books,isbn',
            'cover'       => 'image|mimes:svg,png,jpg,jpeg|max:10240',
            'description' => 'required|string',
            'category_id' => 'required',
        ]);

        if ($request->file('cover') == '') {
            Book::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'isbn' => $request->isbn,
                'category_id' => $request->category_id,
                'description' => $request->description,
            ]);
        } else {
            $image = $request->file('cover');
            $image->storeAs('public/books', $image->hashName());

            Book::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'isbn' => $request->isbn,
                'cover' => $image->hashName(),
                'category_id' => $request->category_id,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('book.index')->with(['success' => 'Data Buku Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();

        return view('admin.book.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'       => 'required|string|max:100',
            'isbn'        => 'required|min:10|max:17|unique:books,isbn,' . $id,
            'cover'       => 'image|mimes:svg,png,jpg,jpeg|max:10240',
            'description' => 'required|string',
            'category_id' => 'required',
        ]);

        $book = Book::findOrFail($id);

        if ($request->file('cover') == '') {
            $book->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'isbn' => $request->isbn,
                'category_id' => $request->category_id,
                'description' => $request->description,
            ]);
        } else {
            Storage::disk('local')->delete('public/books/' . $book->image);

            $image = $request->file('cover');
            $image->storeAs('public/books', $image->hashName());

            $book->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'isbn' => $request->isbn,
                'cover' => $image->hashName(),
                'category_id' => $request->category_id,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('book.show', $id)->with(['success' => 'Data Buku Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        Storage::delete('public/books/' . $book->image);

        return redirect()->route('book.index')->with(['success' => 'Data Buku Berhasil Dihapus!']);
    }
}
