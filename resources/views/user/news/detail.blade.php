@extends('layouts.app')
@section('title', $news->title)
@section('style')
    <link rel="stylesheet" href="{{ mix('css/detail.css') }}">
@endsection
@section('script_footer')
    <script src="{{ mix('js/_comment_like.js') }}" defer></script>
    <script src="{{ mix('js/_comment_delete.js') }}" defer></script>
    <script src="{{ mix('js/_word_count.js') }}" defer></script>
@endsection
@section('content')
    <div class="container my-4">
        <!-- News header -->
        <div class="news-header">
            <h2 class="text-decoration-underline fw-bold"> {{ $news->title }}</h2>
            <p>News site: &nbsp;{{ $news->source->name }}</p>
            <p>Published: &nbsp;{{ $news->published_at }}</p>
            <p class="fw-bold"> {{ $news->author }}</p>
        </div>
        <div class="row">
            <!-- Main content -->
            <div class="col-lg-8">
                <!-- News section -->
                <section class="mb-5">
                    <div class="image-area mb-5 pe-lg-3">

                        @if ($news->image == null)
                            <a href="{{ route('news.show', $news->id) }}"><img
                                    src="{{ asset('images/news/no_image.webp') }}" alt="News Image"
                                    class="w-100 detail-image"></a>
                        @elseif ($news->is_api)
                            <a href="{{ route('news.show', $news->id) }}"><img src="{{ url($news->image) }}"
                                    alt="News Image" class="w-100 detail-image"></a>
                        @else
                            <a href="{{ route('news.show', $news->id) }}"><img
                                    src="{{ asset('images/news/' . $news->image) }}" alt="News Image"
                                    class="w-100 detail-image"></a>
                        @endif
                    </div>
                    <div class="news-content px-3">
                        {!! $news->content !!}
                        <p>URL: &nbsp;<a href="{{ $news->url }}" class="text-dark">{{ $news->url }}</a></p>
                    </div>
                </section>
                <!-- Comment section -->
                <section>
                    <h3 class="py-2 mb-2 comment-title">Comments</h3>
                    <ul class="comment-list px-3">
                        @foreach ($news->comments->take(5) as $comment)
                            @include('user.news.layouts.comment_list')
                        @endforeach
                    </ul>
                    <p class="view-all text-end"><a href="{{ route('news.all-comments', $news->id) }}"
                            class="text-dark">View All Comments</a></p>
                    @include('user.news.feature.comment_post')
                </section>
            </div>
            <!-- Side content -->
            <aside class="d-none d-lg-block col-lg-4">
                <!-- What's hot -->
                <section class="mb-5">
                    <h3 class="aside-title pb-2 mb-4">What's hot</h3>
                    <ol>
                        @foreach ($whats_hot_news as $news)
                            @include('user.news.layouts.detail_side_content')
                        @endforeach
                    </ol>
                </section>
                <!-- Latest in -->
                <section>
                    <h3 class="aside-title pb-2 mb-4">Latest in</h3>
                    <ol>
                        @foreach ($latest_news as $news)
                            @include('user.news.layouts.detail_side_content')
                        @endforeach
                    </ol>
                </section>
            </aside>
        </div>
    </div>
@endsection
