<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','show']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('status', '1')->orderBY('id', 'Desc');

        $check_availability = $projects->get();

        if($check_availability->isEmpty()) {
            $this->data['count_status'] = 'No projects found. You can launch a new project above to start-off';
            $this->data['projects'] = $projects;
        } else {
            $this->data['projects'] = $projects->paginate(30);
        }
        return view('projectsActive', $this->data);
    }


    public function index_drafts()
    {
        $projects = Project::where('status', '0')->orderBY('id', 'Desc');

        $check_availability = $projects->get();

        if($check_availability->isEmpty()) {
            $this->data['count_status'] = 'No projects found. You can launch a new project above to start-off';
            $this->data['projects'] = $projects;
        } else {
            $this->data['projects'] = $projects->paginate(30);
        }
        return view('projectsActive', $this->data);
    }

    public function index_trash()
    {
        $projects = Project::where('is_trash', '1')->orderBY('id', 'Desc');

        $check_availability = $projects->get();

        if($check_availability->isEmpty()) {
            $this->data['count_status'] = 'No projects found. You can launch a new project above to start-off';
            $this->data['projects'] = $projects;
        } else {
            $this->data['projects'] = $projects->paginate(30);
        }
        return view('projectsActive', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([

            // 'property_release' => ['required'],

            // 'community' => ['required'],

            // 'category' => ['required'],

            // 'emirates' => ['required'],

            // 'location' => ['required'],

            'longitude' => ['required'],

            'latitude' => ['required'],

            'title_en' => ['required'],

            'project_ownership' => ['required'],

            'handover' => ['required'],

            'price' => ['required'],

            'units' => ['required'],

            'bedrooms' => ['required'],

            'bathrooms' => ['required'],

            'floors' => ['required'],

            'area_range' => ['required'],

            'outdoor_area_range' => ['required'],

            'terrace_area_range' => ['required'],

            'meta_title' => ['required'],

            'meta_description' => ['required'],

            'meta_keywords' => ['required']
        ]);

        $bool=0;


		if($bool==0)
		{
            $project = new Project();
            $project->property_release = $request->property_release;
            $project->community_id = $request->community;
            $project->category_id = $request->category;
            $project->emirate_id = $request->emirates;
            $project->location_id = $request->location;
            $project->longitude = $request->longitude;
            $project->latitude = $request->latitude;
            $project->name = $request->title_en;
            $project->ownership = $request->ownership;
            $project->handover = $request->handover;
            $project->starting_price = $request->price;
            $project->no_of_units = $request->units;
            $project->bedrooms = $request->bedrooms;
            $project->bathrooms = $request->bathrooms;
            $project->floors = $request->floors;
            $project->unit_size_range = $request->area_range;
            $project->outoor_area = $request->outdoor_area_range;
            $project->terrace_area = $request->terrace_area_range;
            $project->meta_title = $request->meta_title;
            $project->meta_description = $request->meta_description;
            $project->meta_keywords = $request->meta_keywords;
            $project->slug_link = '0';
            $project->status = '0';
            $project->save();

            $this->data['property_id'] = $project->id;

            return $this->index();
        }
        else
        {   dd('fail');
            return Redirect::back()->withErrors('Record is already Exist');
        }
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
