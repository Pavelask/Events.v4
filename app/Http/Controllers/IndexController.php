<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public $isOpen = false;

    public function openMenu()
    {
        $this->isOpen = true;
    }

    public function closeMenu()
    {
        $this->isOpen = false;
    }

    public function index($isOpen)
    {
        return view('index', [
            'isOpen' => $this->$isOpen,
        ]);
    }

}
