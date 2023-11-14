<h4 class="card-title mt-5">Documents</h4>



    @if(Empty($resource->broker_files))
        <table class="table mb-0">
            <tbody>                
                <tr>
                    <th colspan="4">No documents submitted</th>
                </tr>
            </tbody>
        </table>
    @else
        <div class="row my-4">
            @foreach($resource->broker_files as $file)
                
                @if($file->name == 'Bank Letter')
                <div class="col-md-6 mb-5">
                    <h5>{{$file->name}}</h5>
                    <img src="{{ url('storage/broker/'.$resource->id.'/documents/'.$file->filename ) }}">
                </div>
                @else
                <div class="col-md-6 mb-5">
                    <h5>{{$file->name}}</h5>
                    <p class="text-muted"><i class="bx bx-error text-danger"></i> No Document Submitted</p>
                </div>                    
                @endif
            @endforeach
        </div>
    @endif
