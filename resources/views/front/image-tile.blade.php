@if ($loop->count < 6)
    <div class="col-md-4 offset-md-{{ ceil(12 / $loop->count) - 8 }} col-sm-12 mt-5 image-container">
@else
    <div class="col-lg-4 col-md-6 col-sm-12 mt-5 image-container">
@endif
    <img src="{{ $image->asset }}" alt="{{ $image->title }}" width="100%">
    <div class="position-absolute w-100 h-100 image-handle p-4">
        <h4>Name: {{ $image->title }}</h4>
        <h5 class="text-muted">Category: {{ $image->category->title }}</h5>
        <h6 class="text-muted">Author: {{ $image->author->name }}</h6>
        <p class="text-muted">{{ substr($image->description, 0, 100) === $image->description ? $image->description : substr($image->description, 0, 70) . '...' }}</p>
        <p class="text-muted">Date Added: {{ $image->created_at->format('M d, Y') . ' at ' . $image->created_at->format('H:i:s') }}</p>
        <a href="{{ route('front.view-image', $image) }}" class="image-link">Read More...</a>
    </div>
</div>
