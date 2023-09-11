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
