 <li class="d-flex justify-content-between mb-4 aside-news">
     <div class="aside-news-image">
         @if ($news->image == null)
             <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/no_image.webp') }}"
                     alt="News Image" class="shadow-lg w-100"></a>
         @elseif ($news->is_api)
             <a href="{{ route('news.show', $news->id) }}"><img src="{{ url($news->image) }}" onerror="this.src='{{ asset('images/news/no_image.webp') }}'" alt="News Image"
                     class="shadow-lg w-100"></a>
         @else
             <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/' . $news->image) }}" onerror="this.src='{{ asset('images/news/no_image.webp') }}'"
                     alt="News Image" class="shadow-lg w-100"></a>
         @endif
     </div>
     <div class="aside-news-content">
         <p><a href="{{ route('news.show', $news->id) }}"
                 class="text-dark aside-news-content-heading">{{ $news->title }}</a></p>
         <div class="d-flex justify-content-end mt-1 status">
             @include('user.news.feature.reaction')
             @include('user.news.feature.comment')
             @include('user.news.feature.bookmark')
         </div>
     </div>
 </li>
