<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::query()
            ->latest('id')
            ->get();

        return view('admin.positions.index', compact('positions'));
    }
}
