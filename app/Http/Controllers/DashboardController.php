<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\faq_tables;
use App\Models\Members;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public string $Member = '';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);

        if ($user->hasRole('super_admin')) {
            return redirect()->route('filament.admin.home');
        }

        $Event = Events::where('event_status', 'active')->first();

//        if(!$Event) {
//            abort(500);
//        }


        if ($Event) {
            $Member = Members::where('user_id', Auth::user()->id)->where('events_id', $Event->id)->first();
        }


        return view('dashboard');
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
