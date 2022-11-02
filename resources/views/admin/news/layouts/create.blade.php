<div class="container container-width mt-4">
    @if (request()->is('admin/news/create'))
        <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
        @else
            <form action="{{ route('admin.news.update', $news->id) }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
    @endif

    @csrf

    <label for="title" class="form-label fs-4">■Title</label>
    <textarea name="title" id="title" cols="30" rows="2" class="form-control">{{ request()->is('admin/news/create') ? old('title') : old('title', $news->title) }}</textarea>
    @error('title')
        <p class="text-danger small">{{ $message }}</p>
    @enderror

    <label for="description" class="form-label fs-4 mt-3">■Description</label>
    <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{ request()->is('admin/news/create') ? old('description') : old('description', $news->description) }}</textarea>
    @error('description')
        <p class="text-danger small mb-4">{{ $message }}</p>
    @enderror

    <h1 class="fs-4 mt-5">■About News</h1>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="publish-col">
                <label for="category-id" class="form-label label-width">Category:</label>
                <select name="category_id" id="category-id" class="form-select form-width select-size">
                    @if (request()->is('admin/news/create'))
                        <option value="">-- Choose category --</option>
                    @else
                        <option value="{{ old('category_id', $news->category->id) }}">{{ $news->category->name }}
                        </option>
                    @endif

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
                <p class="error-message">{{ 'The category field is required.' }}</p>
            @enderror
        </div>

        <div class="col-12 col-md-6">
            <div class="publish-col">
                <label for="country-id" class="form-label label-width">Country:</label>
                <select name="country_id" id="country-id" class="form-select form-width select-size">
                    @if (request()->is('admin/news/create'))
                        <option value="">-- Choose country --</option>
                    @else
                        <option value="{{ old('country_id', $news->country->id) }}">{{ $news->country->name }}
                        </option>
                    @endif

                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('country_id')
                <p class="error-message">{{ 'The country field is required.' }}</p>
            @enderror
        </div>
    </div>

    <h1 class="fs-4 mt-5">■Published Information</h1>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="publish-col">
                <label for="source-id" class="form-label label-width text-nowrap">Media:</label>
                <select name="source_id" id="source-id" class="form-select form-width select-size">
                    @if (request()->is('admin/news/create'))
                        <option value="">-- Choose media --</option>
                    @else
                        <option value="{{ old('source_id', $news->source->id) }}">{{ $news->source->country->name }}
                        </option>
                    @endif

                    @foreach ($all_media as $media)
                        <option value="{{ $media->id }}">{{ $media->country->name }}</option>
                    @endforeach
                </select>

            </div>

            @error('source_id')
                <p class="error-message">{{ 'The media field is required.' }}</p>
            @enderror
        </div>
        <div class="col-12 col-md-6">
            <div class="publish-col">

                <label for="url" class="form-label label-width">URL:</label>
                <input type="text" name="url" id="url" class="form-control form-width"
                    value="{{ request()->is('admin/news/create') ? old('url') : old('url', $news->url) }}">
            </div>
            @error('url')
                <p class="error-message">{{ $message }}</p>
            @enderror
            </select>
        </div>

        <div class="col-12 col-md-6">
            <div class="publish-col">
                <label for="published-at" class="form-label label-width">Published:</label>
                <input type="date" name="published_at" id="published-at" class="form-control form-width"
                    value="{{ request()->is('admin/news/create') ? old('published_at') : old('published_at', $news->published_at) }}">
            </div>
            @error('published_at')
                <p class="error-message">{{ 'The published field is required.' }}</p>
            @enderror
        </div>

        <div class="col-12 col-md-6">
            <div class="publish-col">
                <label for="author" class="form-label label-width">Author:</label>
                <input type="text" name="author" id="author" class="form-control form-width"
                    value="{{ request()->is('admin/news/create') ? old('author') : old('author', $news->author) }}">
            </div>
            @error('author')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <label for="image" class="form-label mt-5 fs-4 d-block">■Image</label>
    @if (request()->is('admin/news/edit/*'))
        @if ($news->image == null)
            <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/no_image.webp') }}"
                    alt="News Image" class="news-image" id="showImage"></a>
        @elseif ($news->is_api)
            <a href="{{ route('news.show', $news->id) }}"><img src="{{ url($news->image) }}"
                    alt="News Image" class="news-image" id="showImage"></a>
        @else
            <a href="{{ route('news.show', $news->id) }}"><img
                    src="{{ asset('storage/images/news/' . $news->image) }}" alt="News Image"
                    class="news-image" id="showImage"></a>
        @endif
    @else
        <img src="{{ asset('images/news_create_dummy.jpg') }}" alt="Image" class="news-image" id="showImage">
    @endif
    <label class="px-2 text-center upload-icon fs-6 ms-3">
        <input type="file" name="image" class="upload-input" id="image">
        <i class="fa fa-cloud-upload"></i> Upload iamge
    </label>

    @error('image')
        <p class="text-danger small ms-3">{{ $message }}</p>
    @enderror

    <label for="content" class="form-label mt-5 fs-4 d-block">■Content</label>
    @error('content')
        <p class="text-danger small">{{ $message }}</p>
    @enderror
    <textarea id="myeditorinstance" name="content">{{ request()->is('admin/news/create') ? old('content') : old('content', $news->content) }}</textarea>


    <h1 class="fs-4 mt-5">■Post schedule</h1>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="publish-col">
                <label for="post-date-time" class="form-label label-width">Date</label>
                <input type="datetime-local" name="post_date_time" id="post-date_time"
                    class="form-control form-width"
                    value="{{ request()->is('admin/news/create') ? old('post_date') : old('post_date', $news->post_date_time) }}">
            </div>
        </div>
    </div>

    <div class="row justify-content-center text-center my-4">
        @error('status')
            <p class="text-danger small text-center p-0 m-0">{{ $message }}</p>
        @enderror
        <div class="col-6 col-md-4">
            <input class="form-check-input" type="radio" name="status" id="publish" value="1"
                {{ old('status') == 1 || (request()->is('admin/news/edit/*') && $news->status == 1) ? 'checked' : '' }}>
            <label class="form-check-label fs-5" for="puclish">Publish</label>
        </div>
        <div class="col-6 col-md-4">
            <input class="form-check-input" type="radio" name="status" id="draft" value="2"
                {{ old('status') == 2 || (request()->is('admin/news/edit/*') && $news->status == 2) ? 'checked' : '' }}>
            <label class="form-check-label fs-5" for="draft">Save as draft</label>
        </div>
    </div>

    @if (request()->is('admin/news/create'))
        <button type="submit" class="btn btn-primary w-50 mt-4 mb-5 mx-auto d-block">Save</button>
    @else
        <button type="submit" class="btn btn-warning w-50 mt-4 mb-5 mx-auto d-block">Update</button>
    @endif
    </form>
</div>
