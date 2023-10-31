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


<div class="card w-100" style="min-height: 100vh">
    <div class="card-body">
        <h4 class="card-title">Active Units Table</h4>
        <p class="card-title-desc">The table consists of Active Units on the ESNAAD website</p>
        <div class="table-responsive">
            <table class="table table-bordered border-dark mb-0">

                <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th style="width: 100px;">Operation</th>
                        <th style="width: 100px;">Unit Status</th>
                        <th >Unit Reference</th>
                        <th style="width: 200px;">Price (AED)</th>
                        <th style="width: 150px;">Area</th>
                        <th style="width: 150px;">Bedrooms</th>
                        <th style="width: 150px;">Bathrooms</th>
                        <th style="width: 150px;">Project Name</th>
                        <th style="width: 150px;">Brochures</th>
                        <th style="width: 150px;">Floor Plans</th>
                        <th style="width: 150px;">Images</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>

                    @if(!isset($count_status))
                        @foreach($units as $key => $value)

                            <?php $status = $value->status; ?>
                            <tr>
                                <td>{{$value->id}}</td>
                                
                                {{-- OPERATION --}}
                                <td class="d-inline-flex">
                                    <?php
                                        /**
                                         * UNIT STATES
                                         * 1 == ACTIVE
                                         * 2 == DRAFT
                                         * 3 == TRASH
                                        */
                                    ?>
                                    
                                    <a class="btn btn-sm btn-outline-light rounded " href="{{ route('units.show', ['unit' => $value->id]) }}"><i class="bx bx-show-alt text-dark font-size-18"></i></a>

                                    <div class="dropdown mx-1">
                                        <a class="dropdown-toggle btn btn-sm btn-outline-light rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if($value->status == '1')
                                                <i class="bx bx-check-shield text-success font-size-18" ></i>
                                            @elseif($value->status == '2')
                                                <i class="bx bx-cloud-download text-dark font-size-18" ></i>
                                            @else
                                                <i class="bx bx-trash text-danger font-size-18" ></i>
                                            @endif
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if($value->status == '1')
                                                <a class="dropdown-item" href="{{ url('units-status-change/'.$value->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                <a class="dropdown-item" href="{{ url('units-status-change/'.$value->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                <a class="dropdown-item" href="{{ url('units-status-change/'.$value->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                            @elseif($value->status == 2)
                                                <a class="dropdown-item" href="{{ url('units-status-change/'.$value->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                <a class="dropdown-item" href="{{ url('units-status-change/'.$value->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                <a class="dropdown-item" href="{{ url('units-status-change/'.$value->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                            @else
                                                <a class="dropdown-item" href="{{ url('units-status-change/'.$value->id.'/1') }}"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                                <a class="dropdown-item" href="{{ url('units-status-change/'.$value->id.'/2') }}"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                                <a class="dropdown-item" href="{{ url('units-status-change/'.$value->id.'/3') }}"><i class="bx bx-trash"></i> &nbsp; Trash</a>
                                            @endif
                                        </div>
                                    </div>

                                    <a class="btn btn-sm btn-outline-light rounded" href="{{ route('units.edit', ['unit' => $value->id]) }}"><i class="bx bx-edit text-dark font-size-18"></i></a>

                                    
                                </td>

                                {{-- STATUS --}}
                                <td>
                                    <?php
                                        /**
                                         * UNIT STATES
                                         * 1 == LISTED
                                         * 2 == BOOKED
                                         * 3 == AMORTIZING
                                         * 4 == SOLD
                                         * 5 == RESALE
                                        */
                                    ?>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if($value->state == '1')
                                                Listed
                                            @elseif($value->state == '2')
                                                Booked
                                            @elseif($value->state == '3')
                                                Amortizing
                                            @elseif($value->state == '4')
                                                Sold
                                            @elseif($value->state == '5')
                                                Resale
                                            @else
                                                N/A
                                            @endif
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if($value->state == '1')
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                            @elseif($value->state == '2')
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                            @elseif($value->state == '3')
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                            @elseif($value->state == '4')
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                            @elseif($value->state == '5')
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                            @else
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/1') }}">Listed</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/2') }}">Booked</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/3') }}">Amortizing</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/4') }}">Sold</a>
                                                <a class="dropdown-item border" href="{{ url('units-state-change/'.$value->id.'/5') }}">Resale</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <td>{{ $value->name }}</td>

                                <td>{{ number_format($value->unit_price, 1) }}</td>

                                <td>{{ number_format($value->unit_size_range, 0) }}</td>

                                <td>{{ $value->bedroom }}</td>
                                
                                <td>{{ $value->bathroom }}</td>


                                {{-- PROJECT --}}
                                <td class="text-left">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle my-auto @if($status != '2') disabled @endif" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"                                        >
                                            {{-- {{$value->project_id}} --}}
                                            @if($value->project != null)
                                                @if($value->project->id == $value->project_id)
                                                    <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $value->project->name }}
                                                @else
                                                    <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                                @endif
                                            @else
                                                <i class="bx bx-no-entry text-danger" style="font-size: 18px"></i>
                                            @endif
                                        </a>
                                        {{-- {{$projects}} --}}
                                        <div class="dropdown-menu w-100 " aria-labelledby="dropdownMenuButton">
                                            {{-- <button class="dropdown-item" data-toggle="modal" data-target="#project-brochure-connect"><i class="bx bx-plus-circle"></i> &nbsp;Add</button> --}}
                                            <a class="dropdown-item" href="{{ url('unit-project/disconnect/'.$value->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
                                            <hr class="my-2">
                                            <form class="contact-form px-3" id="getInTouch" method="post" action="{{ route('unit-project.connect') }}">
                                            @csrf
                                                <input name="unit_id" value="{{$value->id}}" hidden>
                                                <select
                                                    class="form-control form-control-sm select2-search-disable select2-hidden-accessible
                                                    @error('project_id') border border-solid border-danger  @enderror"
                                                    data-select2-id="basicpill-status-input"
                                                    tabindex="-1"
                                                    aria-hidden="true"
                                                    name="project_id"
                                                    >
                                                    <option selected value="">Choose Segment...</option>

                                                    @if(isset($projects))
                                                        @foreach($projects as $data)
                                                            <option  value="{{$data->id}}">{{ $data->name }}</option>
                                                        @endforeach
                                                    @endif

                                                </select>

                                                <div class="my-2 w-100 text-right">
                                                    <button class="btn btn-outline-dark btn-sm btn-block  ">
                                                        Connect
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </td>

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
                                            <a class="dropdown-item" href="{{ url('unit/brochures/disconnect/'.$value->id)  }}"><i class="bx bx-minus-circle"></i> &nbsp;Remove</a>
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
                                            @if($value->unit_floorplan != null)
                                                @if($value->unit_floorplan->unit_id == $value->id)
                                                    <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $value->unit_floorplan->name }}
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
                                            @if($value->unit_image != null)
                                                @if($value->unit_image->unit_id == $value->id)
                                                    <i class="bx bx-check-circle text-success   " style="font-size: 18px"></i> {{ $value->unit_image->name }}
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

                                {{-- ACTION --}}
                                {{-- <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-light rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('units.show', ['unit' => $value->id]) }}"><i class="bx bx-spreadsheet text-dark"></i> &nbsp;View</a>
                                            <a class="dropdown-item" href="{{ route('units.edit', ['unit' => $value->id]) }}"><i class="bx bx-edit text-dark"></i> &nbsp;Update</a>
                                        </div>
                                    </div>
                                </td> --}}


                            </tr>
                        @endforeach

                        <tr class="bg-dark">
                            <td colspan='12' class="text-white">*** End of the Line ***</td>
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
