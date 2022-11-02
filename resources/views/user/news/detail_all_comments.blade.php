@extends('layouts.app')
@section('title','Detail')
@section('style')
<link rel="stylesheet" href="{{ mix('css/detail.css') }}">
@endsection
@section('script_footer')
<script src="{{ mix('js/_comment_like.js') }}" defer></script>
<script src="{{ mix('js/_comment_delete.js') }}" defer></script>
@endsection
@section('content')
<div class="container my-4">
    <!-- News header -->
    <div class="news-header">
        <h2 class="text-decoration-underline fw-bold"> {{ $news->title }}</h2>
        <p>News site: &nbsp;{{ $news->source->name }}</p>
        <p>Published: &nbsp;{{ $news->post_date_time }}</p>
        <p class="fw-bold"> {{ $news->author }}</p>
    </div>
    <div class="row">
        <!-- Main content -->
        <div class="col-lg-8">
            <!-- Comment section -->
            <section>
                <h3 class="py-2 mt-4 mb-2 comment-title">Comments</h3>
                <ul class="comment-list px-3">
                    @foreach ($news->comments as $comment)
                        @include('user.news.layouts.comment_list')
                    @endforeach
                </ul>
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
