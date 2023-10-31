@extends('layouts.appIn')


@section('appIn_css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection





@section('content')
    <div style="padding-top: 100px;">

        @if($form_type == 'form0')
            @include('booking.create.form0')
        @elseif($form_type == 'form0_units')
            @include('booking.create.form0_units')
        @elseif($form_type == 'form1')
            @include('booking.create.form1')
        @elseif($form_type == 'form2')
            @include('booking.create.form2')
        @elseif($form_type == 'form3')
            @include('booking.create.form3')
        @elseif($form_type == 'form4')
            @include('booking.create.form4')
        @endif

    </div>
@endsection





@section('appIn_js')


@endsection
