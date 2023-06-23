<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Year;
use Database\Seeders\CourseSeeder;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterUserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gender' => 'required',
            'address' => 'required',
            'course' => 'required',
            'year' => 'required'
        ]);


        UserDetail::create([
            'user_id' => $request->id,
            'gender' => $request->gender,
            'address' => $request->address,
            'course' => $request->course,
            'year' => $request->year,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $courses = Course::all();
        $years = Year::all();
        return view('master.user-detail.show', compact('courses', 'years', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'gender' => 'required',
            'address' => 'required',
            'course' => 'required',
            'year' => 'required',
        ]);

        $userDetail = UserDetail::where('user_id', $id);

        if ($userDetail->exists()){
            $userDetail->update([
                'gender' => $request->gender,
                'address' => $request->address,
                'course' => $request->course,
                'year' => $request->year,
            ]);

            Alert::alert('Updated', 'Updated Successfully!', 'success')
                ->autoClose(3000);

        }else{
            UserDetail::create([
                'user_id' => $id,
                'gender' => $request->gender,
                'address' => $request->address,
                'course' => $request->course,
                'year' => $request->year,
            ]);

            Alert::alert('Created', 'Created Successfully!', 'success')
                ->autoClose(3000);
        }

        return redirect()->route('master-user.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
