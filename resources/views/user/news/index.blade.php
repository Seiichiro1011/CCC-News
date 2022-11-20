@extends('layouts.app')
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('style')
    <link href="{{ mix('css/top.css') }}" rel="stylesheet">
    <link href="{{ mix('css/news_list.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="container">
    <div class="header-section mb-5">
        <img src="{{asset('images/top_heading.webp')}}" class="header-section-image" alt="top_haeading">
        <h1 class="header-section-title">Top news <br class="header-section-br">from world regions</h1>
    </div>
    @foreach ($news_list as $country_name => $country_news)
        <section class="country-section">
            <div class="text-center mb-4">
                <h2 class="country-section-heading fw-bold">{{ $country_name }}</h2>
            </div>

            <div class="row">
                <div class="col-12 col-lg-9">
                    <!-- latest news -->
                    <div class="row top-news">
                        @foreach ($country_news as $news)
                            @if ($loop->first)
                                @include('user.news.layouts.top_news')
                            @endif
                        @endforeach
                    </div>
                    <!-- sub news -->
                    <div class="row mt-md-5 news-list">
                        @foreach ($country_news as $news)
                            @if ($loop->iteration > 1)
                                @include('user.news.layouts.news_list')
                            @endif
                        @endforeach
                    </div>
                </div>

                <aside class="aside d-none d-lg-block col-lg-3">
                    <!-- what's hot -->
                    <h3 class="aside-title pb-2 mb-4">What's hot</h3>
                    <ol class="px-2">
                        @foreach ($whats_hot_news[$country_name] as $news)
                            @include('user.news.layouts.side_content')
                        @endforeach
                    </ol>
                </aside>
            </div>
        </section>
    @endforeach
</div>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "timeOut": "5000",
            }
            @if (Session::has('withdrawal'))
                toastr.error('{{ Session::get('withdrawal') }}');
            @endif
        });
    </script>
@endsection
