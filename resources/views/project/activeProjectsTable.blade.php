<style>
    td, th {
        text-align: center !important;
    }
    .tableFixHead          { overflow: auto; height: 450px; }
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
                        <th>Status</th>
                        <th>Project Name</th>
                        <th>Location</th>
                        <th>Floor Plans</th>
                        <th>Brochures</th>
                        <th>Factsheets</th>
                        <th>Images</th>
                        <th>Videos</th>
                        <th>Translation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($count_status))
                        <tr>
                            <td colspan='11' class="text-muted">{{$count_status}}</td>
                        </tr>
                    @else
                    @foreach ($projects as $data)
                        <tr>
                            <td scope="row">{{ $data->id }}</td>
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
                                            <a class="dropdown-item" href="{{ url('projects-status-change/'.$data->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                            <a class="dropdown-item" href="{{ url('projects-status-change/'.$data->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                            <a class="dropdown-item" href="{{ url('projects-status-change/'.$data->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                        @elseif($data->status == 2)
                                            <a class="dropdown-item" href="{{ url('projects-status-change/'.$data->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                            <a class="dropdown-item" href="{{ url('projects-status-change/'.$data->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                            <a class="dropdown-item" href="{{ url('projects-status-change/'.$data->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                        @else
                                            <a class="dropdown-item" href="{{ url('projects-status-change/'.$data->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                            <a class="dropdown-item" href="{{ url('projects-status-change/'.$data->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                            <a class="dropdown-item" href="{{ url('projects-status-change/'.$data->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                        @endif
                                        {{-- <a class="dropdown-item" href="#"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                        <a class="dropdown-item" href="#"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                        <a class="dropdown-item" href="#"><i class="bx bx-minus-circle"></i> &nbsp; Trash</a> --}}
                                    </div>
                                </div>
                            </td>
                            <td>{{ $data->name }}</td>
                            <td>Business Bay</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle my-auto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if($data->project_brochure != null)
                                            @if($data->project_brochure->project_id == $data->id)
                                                <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $data->project_brochure->name }}
                                            @else
                                                <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                            @endif
                                        @else
                                            <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                        @endif
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#project-floorplan-connect-{{$data->id}}"><i class="bx bx-plus-circle"></i> &nbsp;Add</a>
                                        <a class="dropdown-item" href="{{ url('project/brochures/disconnect/'.$data->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                    </div>
                                </div>
                            </td>
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

                        {{-- MODAL FOR PROJECTS --}}
                        <div class="modal fade" id="project-floorplan-connect-{{$data->id}}" tabindex="-1" aria-labelledby="project-connect-modal-{{$data->id}}" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Floor Plans</h5>
                                        <button type="button" class="btn btn-outline-secondary p-1 px-2" data-dismiss="modal" aria-label="Close">X</button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="contact-form" id="getInTouch" method="post" action="{{ route('project.connect.brochure') }}">
                                        @csrf
                                            <input name="project_id" value="{{$data->id}}" hidden>
                                            <select
                                                class="form-control select2-search-disable select2-hidden-accessible
                                                @error('project_id') border border-solid border-danger  @enderror"
                                                data-select2-id="basicpill-status-input"
                                                tabindex="-1"
                                                aria-hidden="true"
                                                name="brochure_id"
                                            >
                                                <option selected value="">Choose ...</option>

                                                @if(isset($brochures))
                                                    @foreach($brochures as $data)
                                                        <option selected value="{{$data->id}}">{{ $data->name }}</option>
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
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <tr>
                            <td scope="row">1</td>
                            <td>Atlas</td>
                            <td>Business Bay</td>
                            <td><i class="bx bx-list-check text-primary" style="font-size: 20px"></i></td>
                            <td><i class="bx bx-no-entry text-danger" style="font-size: 18px"></i></td>
                            <td><i class="bx bx-list-check text-primary" style="font-size: 20px"></i></td>
                            <td><i class="bx bx-list-check text-primary" style="font-size: 20px"></i></td>
                            <td><i class="bx bx-list-check text-primary" style="font-size: 20px"></i></td>
                            <td><i class="bx bx-no-entry text-danger" style="font-size: 18px"></i></td>
                            <td><i class="bx bx-no-entry text-danger" style="font-size: 18px"></i></td>
                            <td>
                                <a href="" class="btn btn-sm btn-dark">
                                    <i class="bx bx-edit"></i>
                                </a>
                                &nbsp;
                                |
                                &nbsp;
                                <a href="" class="btn btn-sm btn-warning text-dark">
                                    <i class="bx bx-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>

    </div>
</div>
