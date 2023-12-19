<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\basic_project;
class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'nullable',
            'title' => 'required',
            'subtitle' => 'required',
            'pictures' => 'nullable',
            'featured' => 'nullable',
            'slug' => 'required|unique:basic_projects,slug',
            'link' => 'nullable',
            'shortDescription' => 'required',
            'category' => 'required',
            'youtube_link' => 'nullable',
        ]);
    dd($request->all());
        // Create a new instance of BasicProject
        $basicProject = new basic_project;

        // Assign values from the request to the model attributes
        $basicProject->description = $request->input('description');
        $basicProject->title = $request->input('title');
        $basicProject->subtitle = $request->input('subtitle');
        $basicProject->pictures = $request->input('pictures');
        $basicProject->featured = $request->input('featured');
        $basicProject->slug = $request->input('slug');
        $basicProject->link = $request->input('link');
        $basicProject->shortDescription = $request->input('shortDescription');
        $basicProject->category = $request->input('category');
        $basicProject->youtube_link = $request->input('youtube_link');

        // Save the model to the database
        $basicProject->save();

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }
}
