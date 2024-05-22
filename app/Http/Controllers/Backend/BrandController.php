<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.brand.manage');
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
        ], [
            'name.required' => 'Please insert the brand name',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

        return redirect()->route('brand.manage')->with('success', 'Brand created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // code for editing
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // code for updating
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // code for deleting
    }
}
