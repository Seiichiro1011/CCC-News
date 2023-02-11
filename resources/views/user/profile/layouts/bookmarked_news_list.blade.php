<div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4">
    <div class="card">
        @if ($news->image == null)
            <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/no_image.webp') }}"
                    alt="News Image" class="card-img-top news-list-img"></a>
        @elseif ($news->is_api)
            <a href="{{ route('news.show', $news->id) }}"><img src="{{ url($news->image) }}" onerror="this.src='{{ asset('images/news/no_image.webp') }}'" alt="News Image"
                    class="card-img-top news-list-img"></a>
        @else
            <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/' . $news->image) }}" onerror="this.src='{{ asset('images/news/no_image.webp') }}'"
                    alt="News Image" class="card-img-top news-list-img"></a>
        @endif
        <div class="card-body">
            <p class="fw-bold news-list-title"><a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a></p>
            <p class="mb-0 news-list-description">{{ $news->description }}</p>
            <small class="text-muted news-list-author">{{ $news->author }}</small>
            <div class="d-flex mt-1 justify-content-end status">
                <p class="reaction">
                    <span class="upCount">{{ number_format($news->getLike()->count()) }}</span>
                    <i class="fa-regular fa-thumbs-up up-toggle @if($news->isLiked()) text-primary @endif" data-newsid="{{ $news->id }}"></i>
                </p>
                <p class="reaction">
                    <span class="downCount">{{ number_format($news->getDislike()->count()) }}</span>
                    <i class="fa-regular fa-thumbs-down down-toggle @if($news->isDisliked()) text-danger @endif" data-newsid="{{ $news->id }}"></i>
                </p>
                <p class="comment">
                    {{ number_format($news->comments_count) }} <i class="fa-regular fa-comment-dots"></i>
                </p>
                <p class="bookmark">
                    <i class="fa-solid fa-bookmark bookmark-toggle text-success" data-newsid="{{ $news->id }}"></i>
                </p>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <span class="news-list-clock"><i class="fa-regular fa-clock"></i>
                        {{ date('n/j(D)', strtotime($news->post_date_time)) }}</span>
                </div>
                <div>
                    <span class="badge bg-opacity-50 news-list-badge">{{ $news->country->name }}</span>
                    <span class="badge bg-opacity-50 news-list-badge">{{ $news->category->name }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
