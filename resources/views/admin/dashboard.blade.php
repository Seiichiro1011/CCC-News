@extends('layouts.admin')

@section('title', 'Dashboard')

@section('style')
    <link href="{{ mix('css/admin/dashboard.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-lg-4 card-margin">
            <div class="card">
                <div class="card-body">
                    <div class="icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="ms-3">
                        <h2>{{ number_format($users->whereNull('blocked_at')->count()) }} <span class="line-sm">Total news users</span></h2>
                        <p class="line-md">Totla new users</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-4 card-margin">
            <div class="card">
                <div class="card-body">
                    <div class="icon">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <div class="ms-3">
                        <h2>{{ number_format($news->whereNull('deleted_at')->count()) }} <span class="line-sm">Total published news</span></h2>
                        <p class="line-md">Total published news</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-4 card-margin">
            <div class="card">
                <div class="card-body">
                    <div class="icon">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <div class="ms-3">
                        <h2>{{ number_format($comments->count()) }} <span class="line-sm">Total comments</span></h2>
                        <p class="line-md">Total comments</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-4 card-margin">
            <div class="card">
                <div class="card-body">
                    <div class="icon">
                        <i class="fa-solid fa-thumbs-up"></i>
                    </div>
                    <div class="ms-3">
                        <h2>{{ number_format($reactions->where('status', 1)->count()) }} <span class="line-sm">Total good reactions</span></h2>
                        <p class="line-md">Total good reactions</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-sm-6 col-lg-4 card-margin">
            <div class="card">
                <div class="card-body">
                    <div class="icon">
                        <i class="fa-solid fa-thumbs-down"></i>
                    </div>
                    <div class="ms-3">
                        <h2>{{ number_format($reactions->where('status', 2)->count()) }} <span class="line-sm">Total bad reactions</span></h2>
                        <p class="line-md">Total bad reactions</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-4 card-margin">
            <div class="card">
                <div class="card-body">
                    <div class="icon">
                        <i class="fa-solid fa-bookmark"></i>
                    </div>
                    <div class="ms-3">
                        <h2>{{ number_format($bookmarks->count()) }} <span class="line-sm">Total bookmarks</span></h2>
                        <p class="line-md">Total bookmarks</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-4 mt-4">
            <div class="outline">
                <h1>Top 5 good news <i class="fa-solid fa-thumbs-up"></i></h1>
                <ol>
                    @foreach ($good_news as $news)
                    <li>
                        <div class="list-align">
                            <a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a>
                            <div class="col-2 icon-align">{{ number_format($news->reactions_count)}}&nbsp;<i class="fa-solid fa-thumbs-up"></i></div>
                        </div>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mt-4">
            <div class="outline">
                <h1>Worst 5 bad news <i class="fa-solid fa-thumbs-down"></i></h1>
                <ol>
                    @foreach ($bad_news as $news)
                    <li>
                        <div class="list-align">
                            <a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a>
                            <div class="icon-align">{{ number_format($news->reactions_count)}}&nbsp;<i class="fa-solid fa-thumbs-down"></i></div>
                        </div>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
            <div class="col-12 col-md-6 col-lg-4 mt-4">
                <div class="outline">
                    <h1>Top 5 bookmarked news <i class="fa-solid fa-bookmark"></i></h1>
                    <ol>
                        @foreach ($bookmark_news as $news)
                        <li>
                            <div class="list-align">
                                <a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a>
                                <div class="icon-align">{{ number_format($news->bookmarks_count)}}&nbsp;<i class="fa-solid fa-bookmark"></i></div>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
    </div>
@endsection
