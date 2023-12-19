<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\basic_projects;
class BasicProjectController extends Controller
{
    public function index(){
        return view('project.createProject');
    }
    public function store(Request $request)
    {

        $basicProject = new basic_projects();

        if($request->hasFile('pictures'))
        {
            // dd('helo');

           $file = $request->file('pictures');

            $ext = $file->getClientOriginalExtension();

            $filename = time().'.'.$ext;
            $file->move('assets/uploads/basicProjct/',$filename);

            $basicProject->pictures=$filename;
        }

        $basicProject->title = $request->input('title');
        $basicProject->subtitle = $request->input('subtitle');
        $basicProject->description = $request->input('description');
        $basicProject->shortDescription = $request->input('shortDescription');
        $basicProject->category = $request->input('category');
        // $basicProject->pictures = $request->input('pictures');
        // $basicProject->featured = $request->input('featured');

        $basicProject->youtube_link = $request->input('youtube_link');
        $basicProject->slug = $request->input('slug');
        $basicProject->link = $request->input('link');

        // Save the BasicProject instance to the database
        // dd($basicProject);
         $basicProject->save();
        $featured = [];
        if ($request->hasFile('featured')) {
            foreach ($request->file('featured') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $filename);
                $featured[] = $filename;
            }
        }
        $basicProject->featured = join(",", $featured);
        $basicProject->save();

        return redirect()->route('basic_project.show')->with('success', 'Basic Project created successfully');
    }
    public function show()
    {

            $basicProjects = basic_projects::all();

            return view('project.listProject', compact('basicProjects'));

    }

    public function projectShow()
    {
        $basicProjects = basic_projects::all();

        return view('project', compact('basicProjects'));
    }
    public function edit($id)
    {
        $project = basic_projects::find($id);

        return view('project.editProject', compact('project'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'shortDescription' => 'required',
            'category' => 'required',
            // Add other validation rules as needed
        ]);

        $project = basic_projects::find($id);
        if($request->hasFile('pictures'))

        {
            $path = 'assets/uploads/basicProject/'.$project->pictures;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('pictures');


            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/basicProject/',$filename);
            $project->pictures =$filename;
        }
        $project->title = $request->input('title');
        $project->subtitle = $request->input('subtitle');
        $project->description = $request->input('description');
        $project->shortDescription = $request->input('shortDescription');
        $project->category = $request->input('category');
        //  dd($project);
        $project->save();

        return redirect()->route('basic_project.show')->with('success', 'Basic Project updated successfully!');
    }
    public function delete($id)
    {

        $project = basic_projects::find($id);

        if (!$project) {
            abort(404, 'User not found');
        }
        $project->delete();
        return redirect()->route('basic_project.show')->with('success', 'User deleted successfully!');
    }
}
