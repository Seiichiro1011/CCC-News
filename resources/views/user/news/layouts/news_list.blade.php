<div class="col-lg-3 col-md-6 col-12">
    <!-- sub news -->
    @if ($news->image == null)
        <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/no_image.webp') }}" alt="News Image"
                class="news-list-image w-100"></a>
    @elseif ($news->is_api)
        <a href="{{ route('news.show', $news->id) }}"><img src="{{ url($news->image) }}" onerror="this.src='{{ asset('images/news/no_image.webp') }}'" alt="News Image"
                class="news-list-image w-100"></a>
    @else
        <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/' . $news->image) }}" onerror="this.src='{{ asset('images/news/no_image.webp') }}'"
                alt="News Image" class="news-list-image w-100"></a>
    @endif
    <h3 class="news-list-heading fw-bold mt-3"><a href="{{ route('news.show', $news->id) }}"
            class="news-list-heading-link">{{ $news->title }}</a></h3>
    <p class="news-list-description">{{ $news->description }}</p>
    <div class="d-flex mt-1 justify-content-end status">
        @include('user.news.feature.reaction')
        @include('user.news.feature.comment')
        @include('user.news.feature.bookmark')
    </div>
</div>
