<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('dashboard.users.index', ['users' => User::select('id', 'name', 'email', 'created_at')->paginate(10)]);
    }

    public function show(User $user)
    {
        // return view('category.index');
    }
    public function create()
    {

        return view('dashboard.users.form', ['resource' => new User()]);
    }
    public function store(Request $request)
    {
        $slug = Str::slug($request->name);
        $category = User::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
        ]);
        return response()->json(['message' => 'Category created successfully']);


        // return redirect(route('category.index'));
    }
    public function edit(User $user)
    {
        return view('dashboard.category.form', ['resource' => $user]);
    }
    public function update(Request $request, User $user)
    {

        $slug = Str::slug($request->name);
        $user->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
        ]);
        return response()->json(['message' => 'Category Updated successfully']);
    }

    public function destroy(User $user)
    {
        $user->delete();
        toast('Category deleted successfully', 'success');
        // Alert::success('Success!', 'Operation completed successfully.');

        return back();
    }
}
