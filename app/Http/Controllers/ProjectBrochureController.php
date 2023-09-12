<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Project_brochure;
use App\Models\Project_brochure_file;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Redirect;
use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;

class ProjectBrochureController extends Controller
{

    private $uploadPath = "uploads/projects/images/";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brochures = Project_brochure::with('project_brochure_files')->get();

        // $brochures_files = Project_brochure::with('project_brochure_files')->get();

        // dd($brochures[10]->project_brochure_files()->count());


        // dd($brochures);

        $this->data['results'] = $brochures;
        $this->data['count_status'] = Project_brochure::count();

        return view('project.brochure.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.brochure.create.index');
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
            'files' => 'required | max: 5 | min: 1',
            'files.*' => 'max: 51200|mimes:pdf'
        ]);


        try {
            if($request->hasfile('files'))
            {
                $files = [];

                $project_brochure = new Project_brochure();
                $project_brochure->name = $request->segment_name;
                $project_brochure->save();
                $project_brochure_id = $project_brochure->id;

                foreach($request->file('files') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $image->storeAs('projects/brochures/'.$request->segment_name, $image_name, 'public'); //nonsecured storage - has public access

                    // Storage::disk('local')->put($image_name, $image); //secured storage - avoid public access

                    // dd('check');

                    $project_brochure_file = new Project_brochure_file();
                    $project_brochure_file->project_brochure_id = $project_brochure_id;
                    $project_brochure_file->name = $image_name;
                    $project_brochure_file->save();

                }
                // dd($files);
            }

        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->withErrors(['message', $e->getMessage() ]);
        }

        return redirect()->route('project-brochures.index');
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
        $brochures = Project_brochure::with('project_brochure_files')->where('id', $id)->get();

        $brochures_files = Project_brochure_file::with('project_brochure')->where('project_brochure_id', $id)->get();

        $this->data['brochures_files'] = $brochures_files;

        $this->data['brochures'] = $brochures;

        return view('project.brochure.update.index', $this->data);
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

        try {
            Project_brochure_file::find($id);
        }
        catch(ModelNotFoundException $e)
        {
            return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
        }

        $brochure_file = Project_brochure_file::with('project_brochure')->find($id);


        if(Storage::exists('projects/brochures/'.$brochure_file->project_brochure->name.'/'.$brochure_file->name)){
            Project_brochure_file::destroy($id); //DELETE THE DATABASE RECORD
            try {
                Storage::delete('projects/brochures/'.$brochure_file->project_brochure->name.'/'.$brochure_file->name);  //DELETE THE ACTUAL FILE FROM STORAGE
            }
            catch (\Exception $e)
            {
                dd($e->getMessage());
                return Redirect::back()->withErrors(['message', $e->getMessage() ]);
            }
        }else{
            dd('File does not exist.');
        }


        return Redirect::back()->with(['msg' => 'Successfully deleted']);
    }
}
