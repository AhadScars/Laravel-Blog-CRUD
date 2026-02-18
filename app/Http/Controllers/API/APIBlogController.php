<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\blog as Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class APIBlogController extends Controller
{
    public function getAllBlogs()
    {
        return response()->json([
            "status" => "success",
            "data" => Blog::all()
        ], 200);
    }

    
    public function createBlog(Request $request)
{
    $validator = Validator::make($request->all(), [
        "title" => "required|string",
        "description" => "required|string",
        "tags" => "required|string",
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
        "tags" => $request->tags,
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
            "data" => Blog::find($id)
        ], 200);
    }




   public function updateBlog(string $id, Request $request)
{
    // NOTE: "sometimes" allows partial updates (common for APIs).
    $request->validate([
        'title' => 'sometimes|required|string',
        'description' => 'sometimes|required|string',
        'tags' => 'sometimes|required|string',
        'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $blog = Blog::findOrFail($id);

    $this->authorize('modify-blog', $blog);

    // Fill only provided fields
    $blog->fill($request->only(['title', 'description', 'tags']));

    if ($request->hasFile('image') && $request->file('image')->isValid()) {

        if ($blog->image && file_exists(public_path('images/' . $blog->image))) {
            unlink(public_path('images/' . $blog->image));
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        $blog->image = $imageName;
    }

    $blog->save();

    return response()->json([
        "status" => true,
        "message" => "Blog updated successfully",
        "data" => $blog
    ], 200);
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
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json([
                "status" => "error",
                "message" => "Blog not found"
            ], 404);
        }

        $this->authorize('modify-blog', $blog);

        $blog->delete();

        return response()->json([
            "status" => "success",
            "message" => "Blog deleted successfully",
        ], 200);
    }
}
