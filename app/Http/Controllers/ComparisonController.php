<?php

namespace App\Http\Controllers;

use App\Models\Comparison;
use Illuminate\Http\Request;

class ComparisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comparisons = Comparison::all();
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

        // Buat instance model Comparison
        $comparison = new Comparison([
            'input1' => $request->input1,
            'input2' => $request->input2
        ]);

        $Percentage = $comparison->comparisons();

        $comparison = Comparison::create([
            'input1' => $request->input1,
            'input2' => $request->input2,
            'percentage' => $Percentage
        ]);

        return redirect()->route('dashboard')->with('success', "Matching Percentage: {$Percentage}%");
    }

    /**
     * Display the specified resource.
     */
    public function show(Comparison $comparison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comparison $comparison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comparison $comparison)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comparison = Comparison::find($id);
        $comparison->delete();
        return redirect()->route('dashboard')->with('success', 'Comparison deleted successfully');
    }
}
