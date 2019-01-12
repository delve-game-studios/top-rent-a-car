@extends('app')

@section('title', __('site.PAGE_PREFIX') . $image->title)

@section('content')
    <div class="container text-light">
        <div class="row mt-5">
            <div class="col-8">
                <img src="{{ $image->asset }}" alt="{{ $image->title }}">
            </div>
            <div class="col-4 align-top">
                <h5>
                    <span class="font-weight-bold">Name:&nbsp;</span>
                    <span>{{ $image->title }}</span>
                </h5>
                <h6 class="text-muted">
                    <span class="font-weight-bold">Date Added:&nbsp;</span>
                    <span>{{ $image->created_at->format('M d, Y') . ' at ' . $image->created_at->format('H:i:s') }}</span>
                </h6>
                <h6 class="text-muted">
                    <span class="font-weight-bold">Author:&nbsp;</span>
                    <span>{{ $image->author->name }}</span>
                </h6>
                <p></p>
                <p>{{ $image->description }}</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-left">
                <a href="{{ url()->previous() }}">Go Back</a>
            </div>
        </div>
    </div>
@endsection
