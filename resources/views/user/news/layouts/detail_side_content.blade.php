<li class="row  aside-news">
    <div class="col-5">
        @if ($news->image == null)
            <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/no_image.webp') }}"
                    alt="News Image" class="w-100 shadow-lg aside-image"></a>
        @elseif ($news->is_api)
            <a href="{{ route('news.show', $news->id) }}"><img src="{{ url($news->image) }}" onerror="this.src='{{ asset('images/news/no_image.webp') }}'" alt="News Image"
                    class="w-100 shadow-lg aside-image"></a>
        @else
            <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/' . $news->image) }}" onerror="this.src='{{ asset('images/news/no_image.webp') }}'"
                    alt="News Image" class="w-100 shadow-lg aside-image"></a>
        @endif
    </div>
    <div class="col-7">
        <p><a href="{{ route('news.show', $news->id) }}" class="text-dark aside-heading">{{ $news->title }}</a></p>
        <div class="d-flex justify-content-end mt-1 status">
            @include('user.news.feature.reaction')
            @include('user.news.feature.comment')
            @include('user.news.feature.bookmark')
        </div>
    </div>
</li>
