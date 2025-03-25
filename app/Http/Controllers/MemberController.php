<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Members;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
//        dd($user->hasRole('super_admin'));

        if ($user->hasRole('super_admin')) {
            return redirect()->route('filament.admin.home');
        }

        $Event = Events::where('event_status', 'active')->first();


        if ($Event) {
            $Member = Members::where('user_id', Auth::user()->id)->where('events_id', $Event->id)->first();
        }

        return view('CreateMember');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $record)
    {

//    dd($id);
        return view('EditMember', ['record' => $record]);
    }


}
