<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        $title = 'Delete Course!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);


        return view('master.course.index', compact('courses'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Course::create([
            'name' => $request->name
        ]);
        Alert::alert('Created', 'Created Successfully!', 'success')
            ->autoClose(3000);
        return redirect()->route('master-course.index');
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
        $course = Course::find($id);
        return view('master.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::find($id);
        $this->validate($request, [
            'name' => 'required'
        ]);

        $course->update([
            'name' => $request->name
        ]);
        Alert::alert('Updated', 'Updated Successfully!', 'success')
            ->autoClose(3000);
        return redirect()->route('master-course.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);

        $course->delete();

        Alert::alert('Deleted', 'Deleted Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('master-course.index');
    }
}
