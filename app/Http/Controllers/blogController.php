<?php

namespace App\Http\Controllers;

use App\Models\blog;

use Illuminate\Http\Request;

class blogController extends Controller
{
    
    public function index(Request $request)
{
    $search = $request->search;

    $blogs = Blog::when($search, function ($query, $search) {
            $query->where('title', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%")
                  ->orWhere('tags', 'like', "%$search%");
        })
        ->latest()
        ->paginate(5); 

    return view('index', compact('blogs', 'search'));
}

    
    public function create()
    {
       return view('blog.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

    
        $image = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $image);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->tags = $request->tags;
        $blog->user_id = auth()->id();
        $blog->image = $image;
        
        $blog->save();

        return redirect('blog/create')->with('success','Blog created successfully');
    }

   
    public function show(string $id)
    {
        $blog = Blog::find($id);
        return view('blog.show', ['blog' => $blog]);
    }

   
    public function edit(string $id)
    {
        $blog = blog::findOrFail($id);
        return view('blog.edit', compact('blog'));
    }

  
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $blog = blog::findOrFail($id);
        $this->authorize('modify-blog', $blog);

        $blog->title = $request->title;
        $blog->tags = $request->tags;
        $blog->description = $request->description;

        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $image);
            $blog->image = $image;
        }

        $blog->save();
        return redirect('blog/edit/' . $blog->id)->with('success', 'Blog updated successfully.');
    }

    
    public function destroy(string $id)
    {
        $blog = blog::findOrFail($id);
        $this->authorize('modify-blog', $blog);
        
        $blog->delete();
        return redirect('/')->with('success', 'Blog deleted successfully.');
    }

    
}
