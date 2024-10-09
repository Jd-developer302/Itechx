<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
     // Display a listing of the categories
     public function index()
     {
         $categories = Category::all();
         return view('dashboard.categories.index', compact('categories'));
     }
 
     // Show the form for creating a new category
     public function create()
     {
         return view('dashboard.categories.create');
     }
 
     // Store a newly created category in storage
     public function store(CategoryFormRequest $request)
     {
         // Store the image
         $imagePath = $request->file('image')->store('categories', 'public');
 
         // Generate slug from name
         $slug = Str::slug($request->name); // Create a slug
 
         // Create a new category
         Category::create([
             'name' => $request->name,
             'slug' => $slug, // Use the generated slug
             'image' => $imagePath,
         ]);
 
         return redirect()->route('categories.index')->with('success', 'Category created successfully.');
     }
 
     // Display the specified category
     public function show(Category $category)
     {
         return view('categories.show', compact('category'));
     }
 
     // Show the form for editing the specified category
     public function edit(Category $category)
     {
         return view('dashboard.categories.edit', compact('category'));
     }
 
     // Update the specified category in storage
     public function update(CategoryFormRequest $request, Category $category)
     {
         // Handle image upload if a new image is provided
         if ($request->hasFile('image')) {
             // Delete the old image if it exists
             Storage::disk('public')->delete($category->image);
             $imagePath = $request->file('image')->store('categories', 'public');
             $category->image = $imagePath;
         }
 
         // Generate slug from name
         $slug = Str::slug($request->name); // Create a new slug
 
         // Update category details
         $category->update([
             'name' => $request->name,
             'slug' => $slug, // Use the generated slug
         ]);
 
         return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
     }
 
     // Remove the specified category from storage
     public function destroy(Category $category)
     {
         // Delete the image file from storage
         Storage::disk('public')->delete($category->image);
         $category->delete();
 
         return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
     }
}
