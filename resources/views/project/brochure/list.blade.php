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

        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex">
                    <div class="flex-grow-1 align-self-center">
                        <div class="text-muted">
                            <h4 class="card-title">Brochure Segments</h4>
                            <p class="card-title-desc">The table consists of all brochure segments created for projects. This will be displayed only in the specific project page.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block my-auto">
                <div class="clearfix mt-4 mt-lg-0 my-auto">
                    <div class="my-auto float-right">
                        <a href="{{ route('projects.create') }}" class="btn btn-dark">
                            <i class="bx bx-bookmark-plus mr-2"></i>Add New Segment
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive tableFixHead">
            <table class="table table-sm table-bordered table-hover mb-0">

                <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th>Project Connected</th>
                        <th>Segment Name</th>
                        <th>Number of Files</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($count_status))
                        @foreach ($results as $data)
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
                                                <a class="dropdown-item" href="#"><i class="bx bx-check-shield "></i> &nbsp; Connect To Project</a>
                                                <a class="dropdown-item" href="#"><i class="bx bx-cloud-download"></i> &nbsp; Move to Draft</a>
                                                <a class="dropdown-item" href="#"><i class="bx bx-trash"></i> &nbsp; Move to Trash</a>
                                            @elseif($data->status == 2)
                                                <a class="dropdown-item" href="#"><i class="bx bx-check-shield "></i> &nbsp; Connect To Project</a>
                                                <a class="dropdown-item" href="#"><i class="bx bx-cloud-download"></i> &nbsp; Move to Draft</a>
                                                <a class="dropdown-item" href="#"><i class="bx bx-trash"></i> &nbsp; Move to Trash</a>
                                            @else
                                                <a class="dropdown-item" href="#"><i class="bx bx-check-shield "></i> &nbsp; Connect To Project</a>
                                                <a class="dropdown-item" href="#"><i class="bx bx-cloud-download"></i> &nbsp; Move to Draft</a>
                                                <a class="dropdown-item" href="#"><i class="bx bx-trash"></i> &nbsp; Move to Trash</a>
                                            @endif
                                            {{-- <a class="dropdown-item" href="#"><i class="bx bx-check-shield "></i> &nbsp; Activate</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-cloud-download"></i> &nbsp; Draft</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-minus-circle"></i> &nbsp; Trash</a> --}}
                                        </div>
                                    </div>
                                </td>

                                <td>Business Bay</td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-light rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('projects.edit', ['project' => $data->id]) }}"><i class="bx bx-edit text-dark"></i> &nbsp;Update</a>
                                            <a class="dropdown-item" href="#"><i class="bx bx-trash text-danger"></i> &nbsp;Remove</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else

                        <tr>
                            <td scope="row">1</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-check-shield text-success" style="font-size: 20px"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i class="bx bx-check-shield "></i> &nbsp; Connect To Project</a>
                                        <a class="dropdown-item" href="#"><i class="bx bx-cloud-download"></i> &nbsp; Move to Draft</a>
                                        <a class="dropdown-item" href="#"><i class="bx bx-trash"></i> &nbsp; Move to Trash</a>
                                    </div>
                                </div>
                            </td>
                            <td>Business Bay</td>
                            <td>4</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-light rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i class="bx bx-edit text-dark"></i> &nbsp;Update</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>

    </div>
</div>
