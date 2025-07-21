<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('author', 'category')->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
            'author_id' => auth()->id(),
            'category_id' => $request->category_id,
            'status' => $request->status ?? 'draft',
            'published_at' => $request->published_at,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'excerpt' => $request->excerpt,
            'featured_image' => $request->featured_image
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {

      
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:blogs,slug,' . $blog->id,
            'category_id' => 'required|exists:categories,id',
            // 'status' => 'required|in:draft,published',
            // 'published_at' => 'nullable|date',
            // 'author_id' => 'required|exists:users,id',
            // 'meta_title' => 'nullable|string',
            // 'meta_description' => 'nullable|string',
            // 'meta_keywords' => 'nullable|string',
            // 'excerpt' => 'nullable|string',
            // 'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        $data = $request->only([
            'title', 'description', 'slug', 'category_id', 'status', 'published_at', 
            'meta_title', 'meta_description', 'meta_keywords', 'excerpt', 'author_id'
        ]);
    
        // Generate the slug
        $data['slug'] = Str::slug($request->slug);
    
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete the old image if it exists
            if ($blog->featured_image && Storage::exists('public/' . $blog->featured_image)) {
                Storage::delete('public/' . $blog->featured_image);
            }
    
            // Store the new image
            $data['featured_image'] = $request->file('featured_image')->store('featured_images', 'public');
        }
        // dd( $request->all());
        // dd( $data);
    
        $blog->update($data);
    
        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
