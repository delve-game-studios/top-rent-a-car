<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\UploadImage;
use App\Models\Category;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    public function index(Request $request)
    {
        $images = Image::with(['author', 'category']);
        $filters = collect([]);

        if (!empty($request->get('filters')) && ($filters = $request->get('filters'))) {
            foreach ($filters as $key => $value) {
                if (is_numeric($key)) {
                    continue;
                }

                // mutate $key & $value in different cases
                switch ($key) {
                    case 'author':
                        $key = 'user_id';
                        $value = User::where(function($q) use ($value) {
                            $q->where('name', 'like', "%{$value}%");
                            $q->orWhere('email', 'like', "%{$value}%");
                            $q->orWhere('id', '=', $value);
                        })->pluck('id')->toArray();
                        break;
                    case 'category':
                        $key = 'category_id';
                        $value = Category::where(function($q) use ($value) {
                            $q->where('title', 'like', "%{$value}%");
                            $q->orWhere('id', '=', $value);
                        })->pluck('id')->toArray();
                        break;
                }

                $images = $images->whereIn($key, $value);
            }
        }

        $images = $images->orderByDesc('id')->paginate(6);

        return view('front.all-images', compact('images', 'filters'));
    }

    public function view(Image $image)
    {
        return view('front.image', compact('image'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('front.upload', compact('categories'));
    }

    public function store(UploadImage $request)
    {
        $data = $request->except('_token');
        $image = new Image();
        $image->author()->associate(auth()->user());
        $image->category()->associate(Category::find($data['category']));
        $image->title = $data['title'];
        $image->asset = $this->uploadImage($request);
        $image->description = $data['description'];
        $image->save();

        return redirect()->route('front.view-image', $image->id);
    }

    public function uploadImage(UploadImage $request)
    {
        $path = $request->file('image')->store('public/uploads');
        return '/storage' . substr($path, 6);

    }
}
