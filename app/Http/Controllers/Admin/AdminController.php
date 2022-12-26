<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function sampleIndex()
    {
        return view('admin.sample.index');
    }
    public function sampleCreateEdit()
    {
        return view('admin.sample.create-edit');
    }
}
