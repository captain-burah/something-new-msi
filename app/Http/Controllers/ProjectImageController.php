<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;


use App\Models\Project;
use App\Models\Project_image;
use App\Models\Project_image_file;
class ProjectImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Project_image::with('project_image_files')->get();

        $this->data['results'] = $images;
        $this->data['projects'] = Project::select(['id', 'name', 'status'])->where('status', '2')->get();
        $this->data['count_status'] = Project_image::count();

        return view('project.image.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.image.create.index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
         * PUBLIC STORAGE
         * ALL FILES ARE BEING STORED IN THE PUBLIC FOLDER UNDER ROOT/STORAGE
         * THESE FILES ARE ACCESSSIBLE TO THE PUBLIC
         *
         * SECURED FILES WILL BE STORED USING THE BELOW SYNTAX WITHIN THE APP DIRECTORY
         *
         * Storage::disk('local')->put('image_name_goes_here', file_variable_should_be_placed_here);
         *
         */

        $request->validate([
            'segment_name' => 'required',
            'files' => 'required | max: 10 | min: 1',
            'files.*' => 'max: 400'
        ]);


        try {
            if($request->hasfile('files'))
            {
                $files = [];

                $project_segment = new Project_image();
                $project_segment->name = $request->segment_name;
                $project_segment->save();
                $project_segment_id = $project_segment->id;

                foreach($request->file('files') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $image->storeAs('projects/images/'.$project_segment_id, $image_name, 'public'); //nonsecured storage - has public access

                    $project_segment_file = new Project_image_file();
                    $project_segment_file->project_image_id = $project_segment_id;
                    $project_segment_file->name = $image_name;
                    $project_segment_file->save();

                }
            }
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['message', $e->getMessage() ]);
        }

        return redirect()->route('project-images.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
