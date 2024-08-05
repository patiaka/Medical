<?php

namespace App\Http\Controllers;

use App\Models\Journal;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Journal::all();

        return view('journal', compact('rows'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $journal)
    {
        $row = Journal::findOrFail($journal);
        $row->delete();

        return response()->json([
            'success' => true,
            'message' => $row ? class_basename($row).' Deleted successfully ' : class_basename($row).' Not Fund',
        ]);
    }
}
