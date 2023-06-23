<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\License;
use App\Models\Report;
use App\Models\Software;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class MasterController extends Controller
{
    public function index()
    {

        $numberOfUsers = User::count();
        $role = Role::where('name', 'Student')->first();

        // Count the number of users with the "student" role
        $numberOfStudents = $role->users()->count();



        return  view('master.index', compact([
            'numberOfUsers',
            'numberOfStudents'
        ]));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
