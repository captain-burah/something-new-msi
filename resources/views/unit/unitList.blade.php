<style>
    td, th {
        text-align: center !important;
    }
    .tableFixHead { overflow: auto; height: 450px; }
    .tableFixHead thead { position: sticky; top: 0; z-index: 1; }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }

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


<div class="card w-100" style="height: 100vh">
    <div class="card-body">
        <h4 class="card-title">Active Units Table</h4>
        <p class="card-title-desc">The table consists of Active Units on the ESNAAD website</p>
        <div class="table-responsive">
            <table class="table table-bordered border-dark mb-0">

                <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th style="width: 100px;">Status</th>
                        <th >Unit Name</th>
                        <th style="width: 150px;">Project Name</th>
                        <th style="width: 150px;">Brochures</th>
                        <th style="width: 150px;">Floor Plans</th>
                        <th style="width: 150px;">Images</th>
                        <th style="width: 150px;">Payment Plans</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if(!isset($count_status))
                        @foreach($units as $key => $value)

                            <?php $status = $value->status; ?>
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if($value->status == '1')
                                                <i class="bx bx-check-shield text-success" style="font-size: 20px"></i>
                                            @elseif($value->status == '2')
                                                <i class="bx bx-cloud-download text-dark" style="font-size: 20px"></i>
                                            @else
                                                <i class="bx bx-trash text-danger" style="font-size: 20px"></i>
                                            @endif
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if($value->status == '1')
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$value->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$value->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$value->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                            @elseif($value->status == 2)
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$value->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$value->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$value->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                            @else
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$value->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$value->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                <a class="dropdown-item" href="{{ url('projects-status-change/'.$value->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $value->name }}</td>
                                <td>0</td>

                                {{-- BROCHURE --}}
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle my-auto @if($status != '2') disabled @endif" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"                                        >
                                            @if($value->unit_brochure != null)
                                                @if($value->unit_brochure->unit_id == $value->id)
                                                    <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $value->unit_brochure->name }}
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            @else
                                                <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                            @endif
                                        </a>
                                        <div class="dropdown-menu w-100 " aria-labelledby="dropdownMenuButton">
                                            {{-- <button class="dropdown-item" data-toggle="modal" data-target="#project-brochure-connect"><i class="bx bx-plus-circle"></i> &nbsp;Add</button> --}}
                                            <a class="dropdown-item" href="{{ url('unit/floorplans/disconnect/'.$value->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                            <hr class="my-2">
                                            <form class="contact-form px-3" id="getInTouch" method="post" action="{{ route('unit.connect.brochure') }}">
                                            @csrf
                                                <input name="project_id" value="{{$value->id}}" hidden>
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

                                {{-- FLOOR PLANS --}}
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle my-auto @if($status != '2') disabled @endif" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if($value->project_factsheet != null)
                                                @if($value->project_factsheet->project_id == $value->id)
                                                    <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $value->project_factsheet->name }}
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            @else
                                                <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                            @endif
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ url('unit/floorplan/disconnect/'.$value->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                            <hr class="my-2">
                                            <form class="contact-form px-3" method="post" action="{{ route('unit.connect.floorplan') }}">
                                                @csrf
                                                <input name="project_id" value="{{$value->id}}" hidden >
                                                <select
                                                    class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                                                    @error('factsheet_id') border border-solid border-danger @enderror"
                                                    data-select2-id="basicpill-status-input"
                                                    tabindex="-1"
                                                    aria-hidden="true"
                                                    name="floorplan_id"
                                                    >
                                                    <option selected value="">Choose Segment</option>

                                                    @if(isset($floorplans))
                                                        @foreach($floorplans as $data)
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

                                {{-- IMAGES --}}
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle my-auto @if($status != '2') disabled @endif" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if($value->project_image != null)
                                                @if($value->project_image->project_id == $value->id)
                                                    <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $value->project_image->name }}
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            @else
                                                <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                            @endif
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ url('unit/images/disconnect/'.$value->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                            <hr class="my-2">
                                            <form class="contact-form px-3" method="post" action="{{ route('unit.connect.image') }}">
                                                @csrf
                                                <input name="project_id" value="{{$value->id}}" hidden >
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

                                {{-- PAYMENT PLANS --}}
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle my-auto @if($status != '2') disabled @endif" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if($value->project_video != null)
                                                @if($value->project_video->project_id == $value->id)
                                                    <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $value->project_video->name }}
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            @else
                                                <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                            @endif
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ url('unit/paymentplan/disconnect/'.$value->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                            <hr class="my-2">
                                            <form class="contact-form px-3" method="post" action="{{ route('unit.connect.paymentplan') }}">
                                                @csrf
                                                <input name="project_id" value="{{$value->id}}" hidden >
                                                <select
                                                    class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                                                    @error('brochure_id') border border-solid border-danger @enderror"
                                                    data-select2-id="basicpill-status-input"
                                                    tabindex="-1"
                                                    aria-hidden="true"
                                                    name="paymentplan_id"
                                                    >
                                                    <option selected value="">Choose Segment</option>

                                                    @if(isset($paymentplans))
                                                        @foreach($paymentplans as $data)
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


                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-light rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('units.edit', ['unit' => $value->id]) }}"><i class="bx bx-edit text-dark"></i> &nbsp;Update</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan='11' class="text-muted">*** End of the Line ***</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan='11' class="text-muted">{{$count_status}}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>
