@extends('welcome')

@section('content')
<div class="container row mx-auto mt-5">
    <div class="col-12 col-xs-12 col-sm-12  col-lg-9 px-0">
        @include('on_going.index')
        @include('complete.index')      
    </div>
    <div class="col-lg-3 px-0">
        @include('sidebar.index')
    </div>
</div>
@endsection