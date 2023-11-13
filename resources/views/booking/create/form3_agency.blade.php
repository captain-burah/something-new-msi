<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="text-muted">Booking Application</h3>
        <nav aria-label="breadcrumb " >
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a>project selection</a></li>
                <li class="breadcrumb-item"><a>unit selection</a></li>
                <li class="breadcrumb-item"><a>client selection</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form id="form1" action="{{ route('bookings.store.form3.clients') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row my-2">
                <div class="col-8">
                    <h3 class="form-label">Agent Selection</h3>
                </div>
                <div class="col-4">
                    
                    
                    <a href="#" class="btn btn-dark float-right" data-toggle="modal" data-target="#exampleModalFullscreen">
                        Add a new Agent
                    </a>

                    <button type="submit" class="btn btn-outline-dark float-right mx-3"  >
                        Submit and Next
                    </button>
                </div>
            </div>


            <div class="row">
                <div class="table-responsive">
                    <input type="hidden" name="booking_id" value="{{$booking_id}}">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Agency</th>
                                <th>Nationality</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($agency))
                                @foreach($agency as $data)
                                <tr>
                                        <td width="25px">{{ $loop->index }}</td>
                                        <td width="50px">
                                            <input type="checkbox" name="clients[]" value="{{$data->id}}" class="form-control-sm" form="form1">
                                        </td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->contact1 }}</td>
                                        <td>{{ $data->address1 }}</td>
                                        <td>{{ $data->nationality }}</td>

                                </tr>
                                @endforeach
                                <tr>    
                                    <td colspan="8" class="text-center my-auto bg-dark text-white">
                                        **** End of the line ****
                                    </td>
                                </tr>
                            @else
                                <tr>    
                                    <td colspan="8" class="text-center my-auto text-secondary">
                                        No Client Records Found in Database
                                    </td>
                                </tr>
                                <tr>    
                                    <td colspan="8" class="text-center my-auto bg-dark text-white">
                                        **** End of the line ****
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>