@extends('layouts.appIn')


@section('appIn_css')
@endsection

@section('content')

@include('project.topNav')

    <div style="padding-top: 150px;">

        @include('project.brochure.list')
        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#exampleModalScrollable">Scrollable modal</button>

        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Scrollable Modal</h5>
                        <button type="button" class="btn btn-outline-secondary p-1 px-2" data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        @include('project.brochure.projectSelectList')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

    </div>
@endsection

@section('appIn_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
