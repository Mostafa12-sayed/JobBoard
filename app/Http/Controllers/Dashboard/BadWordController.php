<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BadWord;
use Illuminate\Http\Request;

class BadWordController extends Controller
{

    public function index()
    {
        return view('dashboard.badWords.index', ['words' => BadWord::paginate(10)]);
    }
    public function create()
    {
        return view('dashboard.badWords.form', ['resource' => new BadWord()]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'word' => 'required|string|max:255|unique:bad_words,title',
        ]);
        flash()->success('Word created successfully');

        BadWord::create(['title' => $request->word]);
        return back();
    }
    public function show(BadWord $badWord)
    {
        // dd($badWord);
    }
    public function edit(BadWord $badWord)
    {
        return view('dashboard.badWords.form', ['resource' => $badWord]);
    }

    public function update(Request $request, BadWord $badWord)
    {
        $request->validate([
            'word' => 'required|string|max:255|unique:bad_words,title,' . $badWord->id,
        ]);
        $badWord->update(['title' => $request->word]);
        flash()->success('Word updated successfully');

        return back();
    }

    public function destroy(BadWord $badWord)
    {
        $badWord->delete();
        flash()->success('Word Deleted successfully');
        return back();
    }
}
