<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\Brand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $brands = Brand::all(); // Fetch all brands
    return view('backend.pages.brand.manage', compact('brands'));
   }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.brand.create');
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
        'name.required' => 'Please insert the brand name',
        'image.*' => 'The image must be a file of type: jpeg, png, jpg, gif, and maximum size 2MB.',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $imagePath = 'Backend/img/brand/'.$imageName;
        $image->move(public_path('Backend/img/brand'), $imageName);
    } else {
        $imagePath = null; // If no image is uploaded
    }

    // Create brand instance
    $brand = new Brand();
    $brand->name = $request->name;
    $brand->slug = Str::slug($request->name);
    $brand->description = $request->description;
    $brand->is_featured = $request->is_featured;
    $brand->status = $request->status;
    $brand->image = $imagePath; 
    $brand->save();

    return redirect()->route('brand.manage')->with('success', 'Brand created successfully!');
}


public function edit($id)
{
    $brand = Brand::findOrFail($id); // Fetch the brand by its ID
    return view('backend.pages.brand.edit', compact('brand'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'is_featured' => 'required|in:0,1',
        'status' => 'required|in:0,1',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Find the brand by ID
    $brand = Brand::findOrFail($id);
    
    // Handle image upload if a new image is provided
    if ($request->hasFile('image')) {
        // Delete existing image if it exists
        if ($brand->image) {
            File::delete(public_path($brand->image));
        }
        
        // Upload new image
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'Backend/img/brand/' . $imageName;
        $image->move(public_path('Backend/img/brand'), $imageName);
        
        // Update brand image path
        $brand->image = $imagePath;
    }

    // Update other brand fields
    $brand->name = $request->name;
    $brand->slug = Str::slug($request->name);
    $brand->description = $request->description;
    $brand->is_featured = $request->is_featured;
    $brand->status = $request->status;

    // Save the changes
    $brand->save();

    return redirect()->route('brand.manage')->with('success', 'Brand updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
   
public function destroy($id)
{
    // Find the brand by ID
    $brand = Brand::findOrFail($id);

    // Delete the brand's image if it exists
    if ($brand->image) {
        File::delete(public_path($brand->image));
    }

    // Delete the brand
    $brand->delete();

    return redirect()->route('brand.manage')->with('success', 'Brand deleted successfully!');
}
}
