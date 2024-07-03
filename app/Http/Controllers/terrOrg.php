<?php

namespace App\Http\Controllers;

use App\Models\tOrg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class terrOrg extends Controller
{

    /**
     * Удалить таблицу или удалить все данные методом DROP.
     */
    public function dropData()
    {
        DB::table('t_orgs')->truncate();
    }
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
    public function show(tOrg $tOrg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tOrg $tOrg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tOrg $tOrg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tOrg $tOrg)
    {
        //
    }
}
