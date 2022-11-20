<div class="container container-footer">
    <!-- Grid row -->
    <div class="row mt-4 px-3">
        {{-- Motto --}}
        <div class="col-lg-3 col-md-12 col-12 mx-auto mb-4 mb-lg-0">
            <div class="text-center fw-bold h4">
                <a href="{{ route('news.index') }}" class="text-decoration-none">
                    <img src="{{ asset('images/logo3.PNG') }}" alt="LOGO" width="120">
                    <p class="text-gray">Customize Compare Communicate</p>
                    <p class="text-gray">with us</p>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-12 mx-auto mb-4 mb-lg-0 footer-content">
            <!-- Recent Post -->
            <h6 class="fw-bold text-white mb-3 footer-list-title">Latest News<i class="fa fa-newspaper-o" aria-hidden="true"></i></h6>
            <ul class="footer-list">
                @php
                    $latest_news = \App\Models\News::latest()->take(4)->get();
                @endphp
                @foreach ($latest_news as $latest)
                <li class="text-gray mb-2">
                    <a href="{{ route('news.show', $latest->id) }}" class="text-reset footer-list-item">{{ $latest->title }}</a>
                </li>
                <hr class="footer-news-hr">
                @endforeach
            </ul>
        </div>
        <div class="col-lg-3 col-md-4 col-12 mx-auto mb-4 mb-lg-0 footer-content footer-content-center">
            <!-- Shortcuts -->
            <h6 class="fw-bold text-white mb-3 footer-list-title">Shortcuts</h6>
            <ul class="footer-list">
                <li class="text-gray mb-2">
                    <a href="{{ route('news.index') }}" class="text-reset footer-list-item">Top</a>
                </li>
                <li class="text-gray mb-2">
                    <a href="{{ route('user.news.favorite') }}"  class="text-reset footer-list-item">My Favorite</a>
                </li>
                <li class="text-gray mb-2">
                    <a href="{{ route('news.category', 2)}}" class="text-reset footer-list-item">Bussiness</a>
                </li>
                <li class="text-gray mb-2">
                    <a href="{{ route('news.category', 3)}}" class="text-reset footer-list-item">Sports</a>
                </li>
                <li class="text-gray mb-2">
                    <a href="#" class="text-reset footer-list-item">Subscribe</a>
                </li>
                <li class="text-gray mb-2">
                    <a href="#" class="text-decoration-none">&nbsp;</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-3 col-md-4 col-12 mx-auto mb-4 mb-lg-0 footer-content">
            <h6 class="fw-bold text-white mb-3 footer-list-title">Contact</h6>
            <ul class="footer-list">
                <li class="text-gray mb-2">
                    <p class="text-reset"><i class="fa-solid fa-house me-2"></i>New York, NY 10012, US</p>
                </li>
                <li class="text-gray mb-2">
                    <p class="text-reset"><i class="fa-solid fa-phone me-2"></i>+ 01 234 567 88</p>
                </li>
                <li class="text-gray mb-2">
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=info@example.com" target="_blank" class="text-reset footer-list-item"><i class="fa-solid fa-envelope me-2"></i>info@example.com</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Copy right & Other apps -->
    <div class="d-sm-flex justify-content-between border-top align-items-center mt-3 pt-1 px-3">
        <!-- Left -->
        <div>
            {{-- <a href=""><img src="{{ asset('images/logo3.png') }}" alt="" width="90"></a> --}}
            <span class="text-gray">All rights reserved 2022</span>
        </div>
        <!-- Right -->
        <div class="text-center">
            <a href="https://twitter.com/" target="_blank" class="text-white ms-3 sns-logo">
                <i class="fa-brands fa-twitter"></i>
            </a>
            <a href="https://www.youtube.com/" target="_blank" class="text-white ms-3 sns-logo">
                <i class="fa-brands fa-youtube"></i>
            </a>
            <a href="https://www.linkedin.com/" target="_blank" class="text-white ms-3 sns-logo">
                <i class="fa-brands fa-linkedin"></i>
            </a>
            <a href="https://www.facebook.com/"  target="_blank" class="text-white ms-3 sns-logo">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
        </div>
    </div>
</div>
