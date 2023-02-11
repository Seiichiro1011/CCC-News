@extends('layouts.admin')

@section('title', 'Admin News List')

@section('style')
    <link href="{{ mix('css/admin/table.css') }}" rel="stylesheet">
@endsection

@section('script')
    <script src="{{ mix('js/_news_list.js') }}" defer></script>
@endsection

@section('content')
    <div class="table-responsive py-5">
        <table class="table" id="target-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th class="col-1">date</th>
                    <th class="col-1">Image</th>
                    <th class="col-3">Title</th>
                    <th class="col-4">Comment</th>
                    <th class="col-2">Username</th>
                    <th class="col-1">Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td class="text-center">{{ $comment->id }}</td>
                        <td class="text-nowrap">{{ date('n/j', strtotime($comment->created_at)) }}<br><span
                                class="day-of-week">{{ date('(D)', strtotime($comment->created_at)) }}</span></td>
                        <td>
                            @if ($comment->news->image == null)
                                <a href="{{ route('news.show', $comment->news->id) }}"><img
                                        src="{{ asset('images/news/no_image.webp') }}" alt="News Image"
                                        class="news-image"></a>
                            @elseif ($comment->news->is_api)
                                <a href="{{ route('news.show', $comment->news->id) }}"><img
                                        src="{{ url($comment->news->image) }}" alt="News Image" class="news-image"></a>
                            @else
                                <a href="{{ route('news.show', $comment->news->id) }}"><img
                                        src="{{ asset('images/news/' . $comment->news->image) }}" alt="News Image"
                                        class="news-image"></a>
                            @endif
                        </td>
                        <td class="title"><a href="{{ route('news.show', $comment->news->id) }}"
                                class="text-decoration-none text-black">{{ $comment->news->title }}</a></td>
                        <td class="comment-body">{{ $comment->body }}</td>
                        <td class="text-start username-width">
                            @if ($comment->user->avatar)
                                <a href="{{ route('user.profile.show', $comment->user->id) }}" class="avatar-name-align">
                                    <img src="{{ asset('images/avatars/' . $comment->user->avatar) }}" onerror="this.src='{{ asset('images/news/no_image.webp') }}'" alt=""
                                        class="avatar">
                                    {{ $comment->user->username }}
                                </a>
                            @else
                                <a href="{{ route('user.profile.show', $comment->user->id) }}"
                                    class="avatar-name-align"><span class="user-icon-size"><i
                                            class="fa-solid fa-circle-user"></i></span>{{ $comment->user->username }}</a>
                            @endif
                        </td>
                        <td>
                            <div class="badge-height text-nowrap">
                                @if ($comment->user->deleted_at)
                                    <p class="badge bg-danger">Hidden</p>
                                    <p class="small m-0 text-danger">(Deactive user)</p>
                                @elseif($comment->news->status == 2)
                                    <p class="badge bg-secondary">Hidden</p>
                                    <p class="small m-0">(News deleted)</p>
                                @elseif($comment->deleted_at)
                                    <p class="badge bg-danger">Deleted</p>
                                @else
                                    <p class="badge bg-primary">Display</p>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                <div class="dropdown-menu">
                                    @if ($comment->user->deleted_at)
                                        <a href="{{ route('admin.users.restore', $comment->user->id) }}"
                                            class="btn dropdown-item shadow-none text-primary border-0 px-0 ms-3"><i
                                                class="fa-solid fa-user"></i>Activate<br><span
                                                class="small ms-4">(User)</span></a>
                                    @elseif ($comment->deleted_at)
                                        <a href="{{ route('admin.comments.restore', $comment->id) }}"
                                            class="btn dropdown-item shadow-none text-primary border-0 px-0 ms-3"><i
                                                class="fa-solid fa-eye"></i>Display</a>
                                    @else
                                        <button class="btn dropdown-item shadow-none text-danger border-0 px-0 ms-3"
                                            data-bs-toggle="modal" data-bs-target="#hide-comment-{{ $comment->id }}"><i
                                                class="fa-solid fa-trash-can"></i>Delete</button>
                                    @endif
                                </div>
                            </div>
                            @include('admin.comments.modal.status')
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{-- {{ $comments->links() }} --}}
@endsection
