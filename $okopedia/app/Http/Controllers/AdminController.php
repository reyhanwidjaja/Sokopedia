<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function index() {
        return view('admin.AdminHome');
    }

    public function addCategory() {
        
    }
}
