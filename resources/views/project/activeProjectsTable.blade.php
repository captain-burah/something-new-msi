<style>
    td, th {
        text-align: center !important;
    }
    .tableFixHead { overflow: auto; height: 450px; }
    .tableFixHead thead { position: sticky; top: 0; z-index: 1; }


</style>

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        {{$errors->first()}}
    </div>
@endif


@if(session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
@endif

<div class="card w-100">
    <div class="card-body">
        <h4 class="card-title">Active Projects Table</h4>
        <p class="card-title-desc">The table consists of Active Projects on the ESNAAD website</p>



        <div class="table-responsive tableFixHead">
            <table class="table table-sm table-bordered table-hover mb-0">

                <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th style="width: 100px;">Status</th>
                        <th >Project Name</th>
                        <th style="width: 150px;">Number of Units</th>
                        <th style="width: 150px;">Brochures</th>
                        <th style="width: 150px;">Factsheets</th>
                        <th style="width: 150px;">Images</th>
                        <th style="width: 150px;">Videos</th>
                        <th style="width: 150px;">Translation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($count_status))
                        <tr>
                            <td colspan='11' class="text-muted">{{$count_status}}</td>
                        </tr>
                    @else
                        @foreach($projects->unique('id')  as $data)
                            <?php
                                $project_id = $data->id;
                            ?>
                            <tr>
                                <td scope="row">{{ $project_id }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if($data->status == '1')
                                                <i class="bx bx-check-shield text-success" style="font-size: 20px"></i>
                                            @elseif($data->status == '2')
                                                <i class="bx bx-cloud-download text-dark" style="font-size: 20px"></i>
                                            @else
                                                <i class="bx bx-trash text-danger" style="font-size: 20px"></i>
                                            @endif
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if($data->status == '1')
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$project_id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$project_id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$project_id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                            @elseif($data->status == 2)
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$project_id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$project_id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$project_id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                            @else
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$project_id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$project_id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$project_id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                            @endif
                                            {{-- <a class="dropdown-item" href="#"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-minus-circle"></i> &nbsp; Trash</a> --}}
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $data->name }}</td>
                                <td>0</td>

                                {{-- brochures --}}
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle my-auto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if($data->project_brochure != null)
                                                @if($data->project_brochure->project_id == $project_id)
                                                    <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $data->project_brochure->name }}
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            @else
                                                <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                            @endif
                                        </a>
                                        <div class="dropdown-menu w-100 " aria-labelledby="dropdownMenuButton">
                                            {{-- <button class="dropdown-item" data-toggle="modal" data-target="#project-brochure-connect"><i class="bx bx-plus-circle"></i> &nbsp;Add</button> --}}
                                            <a class="dropdown-item" href="{{ url('project/brochures/disconnect/'.$project_id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                            <hr class="my-2">
                                            <form class="contact-form px-3" id="getInTouch" method="post" action="{{ route('project.connect.brochure') }}">
                                            @csrf
                                                <input name="project_id" value="{{$project_id}}" hidden>
                                                <select
                                                    class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                                                    @error('brochure_id') border border-solid border-danger  @enderror"
                                                    data-select2-id="basicpill-status-input"
                                                    tabindex="-1"
                                                    aria-hidden="true"
                                                    name="brochure_id"
                                                    >
                                                    <option selected value="">Choose Segment...</option>

                                                    @if(isset($brochures))
                                                        @foreach($brochures as $data)
                                                            <option  value="{{$data->id}}">{{ $data->name }}</option>
                                                        @endforeach
                                                    @endif

                                                </select>

                                                <div class="my-2 w-100 text-right">
                                                    <button class="btn btn-outline-dark btn-sm text-right  ">
                                                        Connect
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </td>

                                {{-- factsheet --}}
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-list-check text-primary" style="font-size: 20px"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"><i class="bx bx-plus-circle"></i> &nbsp;Add</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-redo"></i> &nbsp;Update</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                        </div>
                                    </div>
                                </td>

                                {{-- images --}}
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle my-auto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if(!is_null($data->project_image))
                                                @if($data->project_image->project_id == $project_id)
                                                    <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $data->project_image->name }}
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            @else
                                                <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                            @endif
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ url('project/images/disconnect/'.$project_id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                            <hr class="my-2">
                                            <form class="contact-form px-3" method="post" action="{{ route('project.connect.image') }}">
                                                @csrf
                                                <input name="project_id" value="{{$project_id}}" hidden >
                                                <select
                                                    class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                                                    @error('brochure_id') border border-solid border-danger @enderror"
                                                    data-select2-id="basicpill-status-input"
                                                    tabindex="-1"
                                                    aria-hidden="true"
                                                    name="image_id"
                                                    >
                                                    <option selected value="">Choose Segment</option>

                                                    @if(isset($images))
                                                        @foreach($images as $data)
                                                            <option  value="{{$data->id}}">{{ $data->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                <div class="my-2 w-100 text-right">
                                                    <button class="btn btn-outline-dark text-right  ">
                                                        Connect
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>

                                {{-- videos --}}
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"><i class="bx bx-plus-circle"></i> &nbsp;Add</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-redo"></i> &nbsp;Update</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                        </div>
                                    </div>

                                </td>

                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"><i class="bx bx-plus-circle"></i> &nbsp;Add</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-redo"></i> &nbsp;Update</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                        </div>
                                    </div>

                                </td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-light rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('projects.edit', ['project' => $data->id]) }}"><i class="bx bx-edit text-dark"></i> &nbsp;Update</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
