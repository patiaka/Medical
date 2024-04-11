<?php

namespace App\Http\Controllers;

use App\Models\Injury;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class InjuryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $injury = Injury::all();

        return view('Injury.index', compact('injury'));
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
        //
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validatedData->fails()) {
            toastr()->error('validation error');

            return \back();
        }

        Injury::create($validatedData->validated());
        toastr()->success('Injury added Successfully');

        return \back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Injury $injury)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Injury $injury)
    {
        return view('Injury.edit', compact('injury'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Injury $injury)
    {
        //
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validatedData->fails()) {
            toastr()->error('validation error');

            return \back();
        }
        $injury->update($validatedData->validated());
        toastr()->success('Injury update succesfully');

        return redirect()->route('diagnosis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $injury)
    {
        //
        $row = Injury::findOrFail($injury);
        $row->delete();

        return response()->json([
            'success' => true,
            'message' => $row ? class_basename($row).' Deleted successfully ' : class_basename($row).' Not Fund',
        ]);
    }
}
