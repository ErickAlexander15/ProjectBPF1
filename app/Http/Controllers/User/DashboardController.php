<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BadmintonField;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $badminton_fields = BadmintonField::where('is_available', '1')->paginate(10);
        return view('user.dashboard', compact('badminton_fields'));
    }
}
