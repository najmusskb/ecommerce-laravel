<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories = Category::all(); // Fetch all categorys
       return view('backend.pages.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|max:255',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
    ], [
        'name.required' => 'Please insert the category name',
        'image.*' => 'The image must be a file of type: jpeg, png, jpg, gif, and maximum size 2MB.',
    ]);
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $imagePath = 'Backend/img/category/'.$imageName;
        $image->move(public_path('Backend/img/category'), $imageName);
    } else {
        $imagePath = null; // If no image is uploaded
    }
    // Create category instance
    $category = new Category();
    $category->name = $request->name;
    $category->slug = Str::slug($request->name);
    $category->description = $request->description;
    $category->is_parent = $request->is_parent;
    $category->status = $request->status;
    $category->image = $imagePath; 
    $category->save();

    return redirect()->route('category.manage')->with('success', 'Category created successfully!');
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $category = Category::findOrFail($id); // Fetch the category by its ID
    return view('backend.pages.category.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'is_parent' => 'required|in:0,1',
        'status' => 'required|in:0,1',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Find the category by ID
    $category = Category::findOrFail($id);
    
    // Handle image upload if a new image is provided
    if ($request->hasFile('image')) {
        // Delete existing image if it exists
        if ($category->image) {
            File::delete(public_path($category->image));
        }
        
        // Upload new image
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'Backend/img/category/' . $imageName;
        $image->move(public_path('Backend/img/category'), $imageName);
        
        // Update category image path
        $category->image = $imagePath;
    }

    // Update other category fields
    $category->name = $request->name;
    $category->slug = Str::slug($request->name);
    $category->description = $request->description;
    $category->is_parent = $request->is_parent;
    $category->status = $request->status;

    // Save the changes
    $category->save();

    return redirect()->route('category.manage')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       // Find the category by ID
    $category = Category::findOrFail($id);

    // Delete the category's image if it exists
    if ($category->image) {
        File::delete(public_path($category->image));
    }

    // Delete the category
    $category->delete();

    return redirect()->route('category.manage')->with('success', 'Category deleted successfully!');
    }
}
