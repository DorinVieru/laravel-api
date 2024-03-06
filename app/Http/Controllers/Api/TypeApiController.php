<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Type;

class TypeApiController extends Controller
{
    public function index()
    {
        $types = Type::all();

        return response()->json([
            'success' => true,
            'results' => $types
        ]);
    }
}
