<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();

        return view('User.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'function' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ]);
        if ($validatedData->fails()) {
            toastr()->error('validation error');

            return \back();
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'function' => $request->function,
            'role' => $request->role,
        ]);

        toastr()->success('user added Successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'function' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
        ]);
        $user->update($data);
        toastr()->success('user update succesfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $user)
    {
        $row = User::findOrFail($user);
        $row->delete();

        return response()->json([
            'success' => true,
            'message' => $row ? class_basename($row).' deleted successfully ' : class_basename($row).' not found',
        ]);
    }
}
