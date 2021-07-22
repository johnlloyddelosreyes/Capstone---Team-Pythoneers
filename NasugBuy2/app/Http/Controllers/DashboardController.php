<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\FileUploadService;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index');
    }
}
