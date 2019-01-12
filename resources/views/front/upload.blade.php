@extends('app')

@section('title', __('site.PAGE_PREFIX') . 'Upload')

@section('content')
    <div class="container text-light">
        <div class="row mt-5">
            @include('admin.partials.alerts')
        </div>
        <div class="row mt-5">
            <div class="col-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
                <form action="{{ route('front.store') }}" method="POST" class="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control" required>
                            <option selected>Please select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ title_case($category->title) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class=" form-control w-100 h-100" accept=".png,.jpg,.jpeg" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control-plaintext bg-white" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success text-center form-control">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
