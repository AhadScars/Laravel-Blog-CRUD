<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class APIBlogController extends Controller
{
    public function getAllBlogs()
    {
        return response()->json([
            "status" => "success",
            "data" => blog::all()
        ], 200);
    }

    
    public function createBlog(Request $request)
{
    $validator = Validator::make($request->all(), [
        "title" => "required|string",
        "description" => "required|string",
        // "tags" => "required|string",
        "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors(),
        ], 422);
    }

    
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);
    } else {
        return response()->json([
            'status' => false,
            'message' => 'Image failed to upload',
        ], 422);
    }

 
    $blog = Blog::create([
        "title" => $request->title,
        "description" => $request->description,
        // "tags" => $request->tags,
        "image" => $imageName,
        "user_id" => auth()->id(), 
    ]);

    return response()->json([
        "status" => true,
        "message" => "Blog created successfully",
        "data" => $blog
    ], 201);
}
    public function showBlogbyId(string $id)
    {
        return response()->json([
            "status" => "success",
            "data" => blog::find($id)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {  

        if (auth()->id() != blog::find($id)->user_id) {
            return response()->json([
                "status" => "error",
                "message" => "Unauthorized"
            ], 401);
        }

        if (!blog::find($id)) {
            return response()->json([
                "status" => "error",
                "message" => "Blog not found"
            ], 404);
        }
        return response()->json([
            "status" => "success",
            "message" => "Blog deleted successfully",
            "data" => blog::destroy($id)
        ], 200);
    }
}
