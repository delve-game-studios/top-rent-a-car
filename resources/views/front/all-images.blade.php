@extends('app')

@section('title', __('site.PAGE_PREFIX') . 'All Images')

@section('content')
    <div class="container-fluid">
        <div class="row w-100">
            <div class="col-2 text-light mt-5 border-right border-white mr-5">
                <form action="{{ route('front.all-images') }}" method="GET" class="form">
                    @csrf
                    <div class="form-group">
                        <h4 class="text-center">Filters</h4>
                    </div>
                    <div class="form-group col-12">
                        <label for="author">Author</label>
                        <input type="text" name="filters[author]" id="author" class="form-control" value="{{ request()->input('filters.author') }}">
                    </div>
                    <div class="form-group col-12">
                        <label for="category">Category</label>
                        <input type="text" name="filters[category]" id="category" class="form-control" value="{{ request()->input('filters.category') }}">
                    </div>
                    <div class="form-group col-12">
                        <input type="submit" value="Submit" class="btn btn-primary form-control w-50">
                        <a href="{{ 'front.all-images' }}" class="btn btn-outline-danger float-right">Clear Filters</a>
                    </div>
                </form>
            </div>
            <div class="col-8 text-light">
                <div class="row">
                    @foreach($images as $image)
                        @include('front.image-tile')
                    @endforeach
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        {{ $images->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
