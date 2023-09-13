<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Project;
use App\Models\Project_brochure;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;


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
        $projects = Project::with('project_brochure')->where('status', '1')->orderBY('id', 'Desc');

        $check_availability = $projects->get();

        if($check_availability->isEmpty()) {
            $this->data['count_status'] = 'No projects found. You can launch a new project above to start-off';
            $this->data['projects'] = $projects;
        } else {
            // dd($projects->get() );
            $this->data['projects'] = $projects->get();
        }

        $this->data['brochures'] = Project_brochure::with('project_brochure_files')->get();
        // dd(Project_brochure::with('project_brochure_files')->get());

        return view('projectsActive', $this->data);
    }


    public function index_drafts()
    {
        $projects = Project::where('status', '2')->orderBY('id', 'Desc');

        $check_availability = $projects->get();

        if($check_availability->isEmpty()) {

            $this->data['count_status'] = 'No projects found. You can launch a new project above to start-off';

            $this->data['projects'] = $projects;

        } else {

            $this->data['projects'] = $projects->paginate(30);

        }

        $this->data['brochures'] = Project_brochure::with('project_brochure_files')->get();

        return view('projectsActive', $this->data);
    }

    public function index_trash()
    {
        $projects = Project::where('status', '3')->orderBY('id', 'Desc');

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

            'description' => ['required'],

            'ownership' => ['required'],

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
            $project->property_release_id = $request->property_release;
            $project->community_id = $request->community;
            $project->category_id = $request->category;
            $project->emirate_id = $request->emirates;
            $project->location_id = $request->location;
            $project->longitude = $request->longitude;
            $project->latitude = $request->latitude;
            $project->name = $request->title_en;
            $project->description = $request->description;
            $project->ownership = $request->ownership;
            $project->handover = $request->handover;
            $project->starting_price = $request->price;
            $project->no_of_units = $request->units;
            $project->bedrooms = $request->bedrooms;
            $project->bathrooms = $request->bathrooms;
            $project->floors = $request->floors;
            $project->unit_size_range = $request->area_range;
            $project->outdoor_area = $request->outdoor_area_range;
            $project->terrace_area = $request->terrace_area_range;
            $project->meta_title = $request->meta_title;
            $project->meta_description = $request->meta_description;
            $project->meta_keywords = $request->meta_keywords;
            $project->slug_link = '0';
            $project->status = '2';
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
        try
        {
            $projects = Project::findOrFail($id);

            if($projects->status == '1') {
                return Redirect::back()->withErrors(['msg' => 'Warning! You cannot edit a live project. Move the project to Draft and make further edits.']);
            }
        }
        catch(ModelNotFoundException $e)
        {
            // dd(get_class_methods($e));
            // dd($e);

            // SLACK UPDATE

                //API Url
                $url = 'https://hooks.slack.com/services/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';

                //Initiate cURL.
                $ch = curl_init($url);

                //The JSON data.
                $payload = array(
                    'text' => 'ESNAAD - MIS | Project Update - Read Failed - Project Not Found | Searching id: '.$id
                );

                //Encode the array into JSON.
                $jsonDataEncoded = json_encode($payload);

                //Tell cURL that we want to send a POST request.
                curl_setopt($ch, CURLOPT_POST, 1);

                //Attach our encoded JSON string to the POST fields.
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

                //Set the content type to application/json
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

                //Execute the request
                $result = curl_exec($ch);

            // SLACK UPDATE

            return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
        }

        $this->data['project'] = $projects;
        return view('project.update.index', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

            'description' => ['required'],

            'ownership' => ['required'],

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
            try
            {
                $project = Project::find($id);
                $project->property_release_id = $request->property_release;
                $project->community_id = $request->community;
                $project->category_id = $request->category;
                $project->emirate_id = $request->emirates;
                $project->location_id = $request->location;
                $project->longitude = $request->longitude;
                $project->latitude = $request->latitude;
                $project->name = $request->title_en;
                $project->description = $request->description;
                $project->ownership = $request->ownership;
                $project->handover = $request->handover;
                $project->starting_price = $request->price;
                $project->no_of_units = $request->units;
                $project->bedrooms = $request->bedrooms;
                $project->bathrooms = $request->bathrooms;
                $project->floors = $request->floors;
                $project->unit_size_range = $request->area_range;
                $project->outdoor_area = $request->outdoor_area_range;
                $project->terrace_area = $request->terrace_area_range;
                $project->meta_title = $request->meta_title;
                $project->meta_description = $request->meta_description;
                $project->meta_keywords = $request->meta_keywords;
                $project->slug_link = '0';
                $project->status = '2';
                $project->save();

            }
            catch(ModelNotFoundException $e)
            {
                // dd(get_class_methods($e));
                // dd($e);

                // SLACK UPDATE

                    //API Url
                    $url = 'https://hooks.slack.com/services/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';

                    //Initiate cURL.
                    $ch = curl_init($url);

                    //The JSON data.
                    $payload = array(
                        'text' => 'ESNAAD MIS | Project Update - Failed | id: '.$id.' | Error : '.$e
                    );

                    //Encode the array into JSON.
                    $jsonDataEncoded = json_encode($payload);

                    //Tell cURL that we want to send a POST request.
                    curl_setopt($ch, CURLOPT_POST, 1);

                    //Attach our encoded JSON string to the POST fields.
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

                    //Set the content type to application/json
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

                    //Execute the request
                    $result = curl_exec($ch);

                // SLACK UPDATE

                return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
            }


            $this->data['property_id'] = $project->id;
            // return $this->index();
            return redirect()->route('projects.index')->with('success', 'Project information has been updated');
        }
        else
        {   dd('fail');
            return Redirect::back()->withErrors('Record is already Exist');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status_change($id, $status)
    {
        // dd($status);
        try
        {
            $projects = Project::findOrFail($id);
        }
        catch(ModelNotFoundException $e)
        {
            // dd(get_class_methods($e));
            // dd($e);

            // SLACK UPDATE

                //API Url
                $url = 'https://hooks.slack.com/services/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';

                //Initiate cURL.
                $ch = curl_init($url);

                //The JSON data.
                $payload = array(
                    'text' => 'ESNAAD - MIS | Project Update - Status Change - Project Not Found | Searching id: '.$id
                );

                //Encode the array into JSON.
                $jsonDataEncoded = json_encode($payload);

                //Tell cURL that we want to send a POST request.
                curl_setopt($ch, CURLOPT_POST, 1);

                //Attach our encoded JSON string to the POST fields.
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

                //Set the content type to application/json
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

                //Execute the request
                $result = curl_exec($ch);

            // SLACK UPDATE

            return Redirect::back()->withErrors(['msg' => 'Could not find project. Please contact developer.']);
        }

        $projects = Project::findOrFail($id);
        if($status == '1')
        {
            $projects->status = 1;
            $projects->slug_link = Str::slug($projects->name);
            $projects->save();
            return Redirect::back()->with('message', 'Project is now live!');


        } elseif ($status == '2') {
            $projects->status = 2;
            $projects->slug_link = '0';
            $projects->save();
            return Redirect::back()->with('message', 'Project has been drafted');

        } elseif($status == '3') {
            $projects->status = 3;
            $projects->slug_link = '0';
            $projects->save();
            return Redirect::back()->with('message', 'Project has been moved to trash');
        } else {
            return Redirect::back()->withErrors(['msg' => 'Invalid URL. Please contact developer.']);
        }

        $this->data['project'] = $projects;
        return Redirect::back()->with('message', 'Project status has been changed');
    }

    public function project_connect_store(Request $request) {

        $project = Project::with('project_brochure')->find($request->project_id);

        if($project->project_brochure != null ){
            return Redirect::back()->withErrors(['The selected project already contains a brochure. Remove it first to reassign.' ]);
        }

        $brochure = Project_brochure::find($request->brochure_id);
        $brochure->project_id = $request->project_id;
        $brochure->save();
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }

    public function project_disconnect($id) {
        $project = Project::with('project_brochure')->find($id);
        if($project->project_brochure != null) {
            $project->project_brochure->project_id = null;
            $project->project_brochure->save();
        }
        return Redirect::back()->with(['msg' => 'Successfully connected']);
    }
}
