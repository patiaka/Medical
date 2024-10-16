<?php

namespace App\Http\Controllers;

use App\Models\Drugname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DrugnameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugname = Drugname::all();

        return view('Drugname.index', compact('drugname'));
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
            'name' => 'required',
        ]);
        if ($validatedData->fails()) {
            toastr()->error('validation error');

            return \back();
        }

        Drugname::create($validatedData->validated());
        toastr()->success('Drugname added Successfully');

        return \back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Drugname $drugname)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drugname $drugname)
    {
        return view('Drugname.edit', compact('drugname'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drugname $drugname)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validatedData->fails()) {
            toastr()->error('validation error');

            return \back();
        }
        $drugname->update($validatedData->validated());
        toastr()->success('drugname update succesfully');

        return redirect()->route('drugname.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $drugname)
    {
        $row = Drugname::findOrFail($drugname);
        $row->delete();

        return response()->json([
            'success' => true,
            'message' => $row ? class_basename($row).' Deleted successfully ' : class_basename($row).' Not Fund',
        ]);
    }
}
