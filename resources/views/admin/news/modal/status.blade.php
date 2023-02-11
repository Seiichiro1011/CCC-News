<div class="modal fade" id="hide-news-{{ $news->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-dange">
        <div class="modal-header border-danger">
            <h5 class="modal-title text-danger">Hide news</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body border-danger">
            <p>Are you sure to hide this news?</p>
            <h1 class="fs-5 text-center">{{ $news->title }}</h1>
            <img src="{{ asset('images/news/' . $news->image) }}" onerror="this.src='{{ asset('images/news/no_image.webp') }}'" alt="{{ $news->image_path }}" class="w-50 h-50 d-block mx-auto mt-2">
        </div>
        <div class="modal-footer  border-0">
            <form action="{{ route('admin.news.destroy', $news->id) }}" method="post">
            @csrf
            @method('DELETE')

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        </div>
    </div>
</div>
