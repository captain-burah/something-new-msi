<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Unit;
use App\Models\Unit_brochure;
use App\Models\Unit_image;
use App\Models\Unit_factsheet;
use App\Models\Unit_video;
use App\Models\Language;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;

class UnitController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:listing-list|project-create|project-edit|project-delete', ['only' => ['index','show']]);
         $this->middleware('permission:listing-create', ['only' => ['create','store']]);
         $this->middleware('permission:listing-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:listing-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $units = Unit::with('unit_brochure')->where('status', '1')->orderBY('id', 'Desc');

        $this->data['count_draft'] = $count_draft = Unit::where('status', '2')->orderBY('id', 'Desc')->count();
        $this->data['count_active'] = $count_active = Unit::where('status', '1')->orderBY('id', 'Desc')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('status', '3')->orderBY('id', 'Desc')->count();
        $this->data['unit_translated'] = $unit_translated = Language::all();
        $this->data['language'] = $lang = Language::all();

        $check_availability = $units->get();

        if($check_availability->isEmpty()) {
            $this->data['count_status'] = 'No units found. You can launch a new unit above to start-off';
            $this->data['units'] = $units;
        } else {
            $this->data['units'] = $units->get();
        }

        $this->data['brochures'] = Unit_brochure::with('project_brochure_files')->get();
        $this->data['images'] = Unit_image::with('project_image_files')->get();
        $this->data['factsheets'] = Unit_factsheet::with('project_factsheet_files')->get();
        $this->data['videos'] = Unit_video::with('project_video_files')->get();

        return view('unitsActive', $this->data);
    }





    public function index_drafts()
    {
        $units = Unit::where('status', '2')->orderBY('id', 'Desc');


        $this->data['count_draft'] = $count_draft = Unit::where('status', '2')->orderBY('id', 'Desc')->count();
        $this->data['count_active'] = $count_active = Unit::where('status', '1')->orderBY('id', 'Desc')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('status', '3')->orderBY('id', 'Desc')->count();
        $this->data['language'] = $lang = Language::all();

        $check_availability = $units->get();

        if($check_availability->isEmpty()) {

            $this->data['count_status'] = 'No units found. You can launch a new unit above to start-off';

            $this->data['units'] = $units;

        } else {

            $this->data['units'] = $units->paginate(30);

        }

        $this->data['brochures'] = Unit_brochure::with('unit_brochure_files')->get();
        $this->data['images'] = Unit_image::with('unit_image_files')->get();
        $this->data['factsheets'] = Unit_factsheet::with('unit_factsheet_files')->get();
        $this->data['videos'] = Unit_video::with('unit_video_files')->get();

        return view('unitsActive', $this->data);
    }




    public function index_trash()
    {
        $units = Unit::where('status', '3')->orderBY('id', 'Desc');

        $this->data['count_draft'] = $count_draft = Unit::where('status', '2')->orderBY('id', 'Desc')->count();
        $this->data['count_active'] = $count_active = Unit::where('status', '1')->orderBY('id', 'Desc')->count();
        $this->data['count_trash'] = $count_trash = Unit::where('status', '3')->orderBY('id', 'Desc')->count();
        $this->data['language'] = $lang = Language::all();

        $check_availability = $units->get();

        if($check_availability->isEmpty()) {
            $this->data['count_status'] = 'No units found. You can launch a new unit above to start-off';
            $this->data['projects'] = $units;
        } else {
            $this->data['units'] = $units->paginate(30);
        }

        $this->data['brochures'] = Unit_brochure::with('unit_brochure_files')->get();
        $this->data['images'] = Unit_image::with('unit_image_files')->get();
        $this->data['factsheets'] = Unit_factsheet::with('unit_factsheet_files')->get();
        $this->data['videos'] = Unit_video::with('unit_video_files')->get();

        return view('unitsActive', $this->data);
    }





    public function create()
    {
        $projects = Project::where('status', '1')->get();
        return view('unit.create.index');
    }



    public function store(Request $request)
    {

        $validatedData = $request->validate([

            'unit_name' => ['required'],

            'description' => ['required'],

            'unit_size' => ['required'],

            'unit_price' => ['required'],

            'land_reg_fee' => ['required'],

            'oqood' => ['required'],

            'dld_fees' => ['required'],

            'bathrooms' => ['required'],

            'bedrooms' => ['required'],

            'area_range' => ['required'],

            'floor' => ['required'],

            'outdoor_area_range' => ['required'],

            'terrace_area_range' => ['required'],

            'meta_title' => ['required'],

            'meta_description' => ['required'],

            'meta_keywords' => ['required']
        ]);

        $bool=0;


		if($bool==0)
		{
            $project = new Unit();
            $project->project_id = $request->project_id;
            $project->unit_name = $request->unit_name;
            $project->description = $request->description;
            $project->unit_size = $request->unit_size;
            $project->unit_price = $request->unit_price;
            $project->land_reg_fee = $request->land_reg_fee;
            $project->oqood = $request->oqood;
            $project->dld_fees = $request->dld_fees;
            $project->bedrooms = $request->bedrooms;
            $project->bathrooms = $request->bathrooms;
            $project->floor = $request->floor;
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
