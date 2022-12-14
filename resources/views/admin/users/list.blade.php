@extends('layouts.admin')

@section('title', 'Admin News List')

@section('style')
    <link href="{{ mix('css/admin/table.css') }}" rel="stylesheet">
@endsection

@section('script')
<script src="{{ mix('js/_news_list.js') }}" defer></script>
@endsection

@section('content')
<div class="table-responsive container-width py-5">
    <table class="table" id="target-table">
        <thead >
            <tr>
                <th>No.</th>
                <th class="col-2">User</th>
                <th class="col-2">E-mail</th>
                <th class="col-2">Nationality</th>
                <th class="col-2">Country</th>
                <th class="col-1">Comments</th>
                <th class="col-1">Follower</th>
                <th class="col-1">Followings</th>
                <th class="col-1">Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
            <td class="text-center">{{ $user->id }}</td>
            <td class="text-start user-width">
                @if ($user->avatar)
                    <a href="{{ route('user.profile.show', $user->id) }}" class="avatar-name-align">
                        <img src="{{ asset('images/avatars/'. $user->avatar) }}" alt="" class="avatar">
                        <span style="word-wrap: break-all;">{{ $user->username }}</span>
                    </a>
                @else
                    <a href="{{ route('user.profile.show', $user->id) }}" class="text-decoration-none text-black avatar-name-align"><span class="fs-2 me-2"><i class="fa-solid fa-circle-user"></i></span>{{ $user->username }}</a>
                @endif

            </td>
            <td class="email-width text-start">{{ $user->email }}</td>
            <td class="country-td-width">
                <div class="country-width">
                    @if ($user->nationality->national_flag)
                        <img src="{{ asset('images/national_flags/'. $user->nationality->national_flag) }}" alt="{{ $user->nationality->name }}" class="shadow flag">
                    @else
                        <img src="{{ asset('images/national_flags/world.webp') }}" alt="Flag" class="flag">
                    @endif
                    {{ $user->nationality->name }}
                </div>
            </td>
            <td class="country-td-width">
                <div class="country-width">
                    @if ($user->country->national_flag)
                        <img src="{{ asset('images/national_flags/'. $user->country->national_flag) }}" alt="{{ $user->country->name }}" class="shadow flag">
                    @else
                        <img src="{{ asset('images/national_flags/world.webp') }}" alt="Flag" class="flag">
                    @endif
                    {{ $user->country->name }}
                </div>
            </td>
            <td>{{ number_format($user->comments_count) }}</td>
            <td>{{ number_format($user->followers_count) }}</td>
            <td>{{ number_format($user->followings_count) }}</td>
            <td>
                @if ($user->blocked_at)
                    <p class="badge bg-dark m-0">Blocked</p>
                @elseif ($user->deleted_at)
                    <p class="badge bg-danger m-0">Pending</p>
                @else
                    <p class="badge bg-primary m-0">Active</p>
                @endif
            </td>
            <td>
                <div class="dropdown">
                    @if ($user->deleted_at)
                    @else
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-ellipsis"></i>
                    </button>
                    @endif
                    <div class="dropdown-menu">
                        @if ($user->blocked_at)
                        <a href="{{ route('admin.users.restore', $user->id) }}" class="btn dropdown-item shadow-none text-primary border-0 px-0 ms-3"><i class="fa-solid fa-user"></i>Activate</a>
                        @else
                        <button class="btn dropdown-item shadow-none text-dark px-0 ms-3" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{ $user->id }}"><i class="fa-solid fa-user-slash"></i>Block</button>
                        @endif
                    </div>
                </div>
                @include('admin.users.modal.status')
            </td>
            </tr>
            @endforeach

        </tbody>
        </table>
        {{-- {{ $users->links() }} --}}
    </div>
@endsection
