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
        <h4 class="card-title">Brokers Table</h4>
        <div class="table-responsive">
            <table class="table table-bordered border-dark mb-0">

                <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th style="width: 100px;">Status</th>
                        <th >Broker Name</th>
                        <th style="width: 150px;">State</th>
                        <th style="width: 150px;">Authorized Person</th>
                        <th style="width: 150px;">Authorized Contact</th>
                    </tr>
                </thead>
                <tbody>

                    @if(!isset($count_status))
                        @foreach($resource as $key => $value)
                            <?php $status = $value->status; ?>
                            
                            @if($value->status == '0')                            
                            <tr class="bg-warning text-white">
                            @else
                            <tr>
                            @endif

                                <td>{{$value->id}}</td>

                                <td>
                                    <a class="btn btn-outline-dark" href="{{ route('brokers.show', ['id' => $value->id]) }}"><i class="bx bx-edit"></i></a>
                                </td>
                                
                                <td>{{ $value->company_name }}</td>
                                
                                <td>
                                    {{ $value->state}}    
                                </td>

                                <td>
                                    {{ $value->authorized_p_name}}    
                                </td>

                                <td>
                                    {{ $value->authorized_p_contact}}    
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
