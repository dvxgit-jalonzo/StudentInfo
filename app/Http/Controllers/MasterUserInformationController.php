<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Year;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class MasterUserInformationController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $courses = Course::all();
        $years = Year::all();
        return view('master.user-info.show', compact('user', 'roles', 'courses', 'years'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'username' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'course' => 'required',
            'year' => 'required',
        ]);

        $userDetail = UserDetail::where('user_id', $id);
        $user = User::find($id);

        if ($userDetail->exists()){
            $userDetail->update([
                'gender' => $request->gender,
                'address' => $request->address,
                'course' => $request->course,
                'year' => $request->year,
            ]);

        }else{
            UserDetail::create([
                'user_id' => $id,
                'gender' => $request->gender,
                'address' => $request->address,
                'course' => $request->course,
                'year' => $request->year,
            ]);


        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username
        ]);

        Alert::alert('Updated', 'Updated Successfully!', 'success')
            ->autoClose(3000);



        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
