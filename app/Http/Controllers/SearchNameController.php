<?php

namespace App\Http\Controllers;

use App\Models\Jemat;
use Illuminate\Http\Request;

class SearchNameController extends Controller
{
    public function index()
    {
        return view('search_username');
    }
 
    public function getSearchJson(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return response()->json([]);
        }
        
        $results = Jemat::where(function ($q) use ($query) {
                $q->where('nama_pertama', 'like', "%{$query}%")
                ->orWhere('nama_belakang', 'like', "%{$query}%")
                ->orWhere('nama_keluarga', 'like', "%{$query}%");
        })->get();
        return response()->json($results);
    }
}
