@extends('app')

@section('title', 'Index')

@section('content')
    <div class="container">
        <div class="row w-100"></div>
        <div class="row w-100">
            <div class="col-12 text-light">
                <div class="row">
                @foreach($images as $image)
                    @include('front.image-tile')
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
