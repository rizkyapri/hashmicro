<?php

namespace App\Http\Controllers;

use App\Models\comparison;
use Illuminate\Http\Request;

class ComparisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comparisons = comparison::all();
        return view('comparison.index', compact('comparisons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comparison.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'input1' => 'required|string',
            'input2' => 'required|string'
        ]);

        $Percentage = comparison::comparisons($request->input1, $request->input2);

        $comparison = comparison::create([
            'input1' => $request->input1,
            'input2' => $request->input2,
            'percentage' => $Percentage
        ]);

        return redirect()->route('dashboard')->with('success', "Matching Percentage: {$Percentage}%");
    }

    /**
     * Display the specified resource.
     */
    public function show(comparison $comparison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comparison $comparison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comparison $comparison)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comparison = comparison::find($id);
        $comparison->delete();
        return redirect()->route('dashboard')->with('success', 'Comparison deleted successfully');
    }
}
