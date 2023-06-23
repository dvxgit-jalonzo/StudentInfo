<?php

namespace App\Http\Controllers;


use App\Models\Year;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $years = Year::all();
        $title = 'Delete Year!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);


        return view('master.year.index', compact('years'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.year.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required'
        ]);

        Year::create([
            'name' => $request->name
        ]);
        Alert::alert('Created', 'Created Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('master-year.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $year = Year::find($id);
        return view('master.year.edit', compact('year'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $year = Year::find($id);
        $this->validate($request, [
            'name' => 'required'
        ]);

        $year->update([
            'name' => $request->name
        ]);
        Alert::alert('Updated', 'Updated Successfully!', 'success')
            ->autoClose(3000);
        return redirect()->route('master-year.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $year = Year::find($id);

        $year->delete();

        Alert::alert('Deleted', 'Deleted Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('master-year.index');
    }
}
