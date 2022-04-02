@extends('main')

@section('main.content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" colspan="5" rowspan="2">
                    <legend>Profile Detail View</legend>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="detailview-subtitles">
                <th scope="row" colspan="5">Main user info</th>
            </tr>
            <tr>
                <th scope="row">First Name:</th>
                <td>{{ $user->first_name ?? '' }}</td>
                <th scope="row"></th>
                <th>Last Name:</th>
                <td>{{ $user->last_name ?? '' }}</td>
            </tr>
            <tr>
                <th scope="row">Preffered language:</th>
                <td>{{ $user->language ?? '' }}</td>
                <th scope="row"></th>
                <th>Email:</th>
                <td>{{ $user->email ?? '' }}</td>
            </tr>
            <tr>
                <th scope="row">Mobile phone:</th>
                <td>{{ $user->phone_mobile ?? '' }}</td>
                <th scope="row"></th>
                <th>Work phone:</th>
                <td>{{ $user->work_mobile ?? '' }}</td>
            </tr>
            <tr>
                <th scope="row">Mobile phone:</th>
                <td>{{ $user->phone_mobile ?? '' }}</td>
                <th scope="row"></th>
                <th>Work phone:</th>
                <td>{{ $user->work_mobile ?? '' }}</td>
            </tr>
            <tr>
                <th scope="row" colspan="1">Description:</th>
                <td colspan="4">{{ $user->description ?? '' }}</td>
            </tr>
            <tr class="detailview-subtitles">
                <th scope="row" colspan="5">Additional info</th>
            </tr>
            <tr>
                <th scope="row">Status:</th>
                <td>{{ $user->status ?? '' }}</td>
                <th scope="row"></th>
                <th>User type:</th>
                <td>
                    @if (($user->is_admin ?? '') === 1)
                        System Administrator
                    @else
                        Regular User
                    @endif
                </td>
            </tr>
            <tr>
                <th scope="row">Email confirmed:</th>
                <td>@if (!empty($user->email_verified_at ?? ''))
                        True
                    @else
                        False
                    @endif
                </td>
                <th scope="row"></th>
                <th></th>
                <td></td>
            </tr>
        </tbody>
    </table>
@endsection

@section('sidebar.collection')
        <li class="nav-item side-nav">
            <a href="{{ route('profile.edit') }}" class="nav-link sidebar-nav
            @if (in_array(Route::currentRouteName(), ['profile.edit', 'profile.store'])) active @else text-white @endif
                ">
            <span>
                Edit View
            </span>
                <svg class="sidebar-img" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                    <path
                        d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path>
                </svg>
            </a>
        </li>
        <li class="nav-item side-nav">
            <a href="{{ route('profile.show') }}" class="nav-link sidebar-nav
            @if (Route::currentRouteName() == 'profile.show') active @else text-white @endif
                ">
            <span>
                Detail View
            </span>
                <svg class="sidebar-img" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                    <path
                        d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h16l.002 14H4z"></path>
                    <path d="M6 7h12v2H6zm0 4h12v2H6zm0 4h6v2H6z"></path>
                </svg>
            </a>
        </li>
@endsection
