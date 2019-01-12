@if (isset($errors) && $errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ __($error) }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ( !blank(session()->get('flash')) )
    @dd(session()->get('flash'))
    <div class="alert alert-success">
        <ul class="mb-0">
            <li>{{ session('success') }}</li>
        </ul>
    </div>
@endif
