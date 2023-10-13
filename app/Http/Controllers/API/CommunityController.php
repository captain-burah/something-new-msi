<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Community;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;

class CommunityController extends Controller
{
    public function index()
    {
        $resources = Community::select('id', 'title', 'address', 'slug_link', 'thumbnail')->where('status', '1')->get();
        return response()->json($resources,200);
    }





    public function show(string $id)
    {
        $resources = Community::select('id', 'title', 'address', 'slug_link', 'thumbnail')->where('status', '1')->get();
        return response()->json($resources,200);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
