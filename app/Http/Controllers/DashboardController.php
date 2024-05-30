<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medication;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $medications = Medication::all();
        return view('dashboard', ['medications' => $medications]);
    }
}
