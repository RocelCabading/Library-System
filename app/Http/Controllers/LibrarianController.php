<?php

namespace App\Http\Controllers;

use App\Models\Librarian;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function index()
    {
        $librarians = Librarian::all();
        return view('librarians.index', compact('librarians'));
    }

    public function create()
    {
        return view('librarians.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:librarians',
            'phone' => 'nullable',
        ]);

        Librarian::create($request->all());
        return redirect()->route('librarians.index')->with('success', 'Librarian added successfully!');
    }

    public function edit(Librarian $librarian)
    {
        return view('librarians.edit', compact('librarian'));
    }

    public function update(Request $request, Librarian $librarian)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:librarians,email,' . $librarian->id,
            'phone' => 'nullable',
        ]);

        $librarian->update($request->all());
        return redirect()->route('librarians.index')->with('success', 'Librarian updated successfully!');
    }

    public function destroy(Librarian $librarian)
    {
        $librarian->delete();
        return redirect()->route('librarians.index')->with('success', 'Librarian deleted successfully!');
    }
}
