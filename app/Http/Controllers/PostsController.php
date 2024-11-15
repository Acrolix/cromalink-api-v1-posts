<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $posts = Publication::with(['comments', 'resources'])->orderBy("created_at", "desc")->paginate(20);
            return response()->json($posts, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Se produjo un error en el Servidor'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(['message' => 'Store Posts'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $posts = Publication::with(['comments', 'resources'])->where(['id' => $id])->orderBy("created_at", "desc")->get();
            return response()->json($posts, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Se produjo un error en el Servidor'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->json(['message' => "Update Posts id: $id"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(['message' => "Destroy Posts id: $id"], 200);
    }
}
