<?php

namespace App\Http\Controllers;
use App\Models\Portfoli;

use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function portfolis($id){
        $portfolis = Portfoli::where('worker_id', $id)->get();
        return response()->json($portfolis);
    }
}
