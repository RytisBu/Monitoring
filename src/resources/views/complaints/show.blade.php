@extends('main')

@section('main.content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" colspan="5" rowspan="2">
                <legend>{{ __('main.complaint_detail_view') }}</legend>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr class="detailview-subtitles">
            <th scope="row" colspan="5">{{ __('main.main_info') }}</th>
        </tr>
        <tr>
            <th scope="row">{{ __('main.name') }}:</th>
            <td>{{ $complaint->name ?? '' }}</td>
            <th scope="row"></th>
            <th>{{ __('main.status') }}</th>
            <td>{{ __('dropdowns.complaints_status.' . ($complaint->status ?? '')) }}</td>
        </tr>
        <tr>
            <th>{{ __('main.assigned_user_id') }}</th>
            <td>{{ $complaint->user->name ?? '' }}</td>
            <th scope="row"></th>
            <th>{{ __('main.system_id') }}</th>
            <td>{{ $complaint->system->name ?? '' }}</td>
        </tr>
        <tr>
            <th>{{ __('main.priority') }}:</th>
            <td>{{ __('dropdowns.priority.' . ($complaint->priority ?? '')) }}</td>
            <th scope="row"></th>
            <th>{{ __('main.category') }}:</th>
            <td>{{ __('dropdowns.category.' . ($complaint->category ?? ''))  }}</td>
        </tr>
        <tr>
            <th scope="row" colspan="1">{{ __('main.description') }}:</th>
            <td colspan="4">{{ $complaint->description ?? '' }}</td>
        </tr>
        <tr class="detailview-subtitles">
            <th scope="row" colspan="5">{{ __('main.additional_info') }}</th>
        </tr>
        <tr>
            <th>{{ __('main.created_at') }}:</th>
            <td>{{ $complaint->created_at ?? '' }}</td>
            <th scope="row"></th>
            <th>{{ __('main.updated_at') }}:</th>
            <td>{{ $complaint->updated_at ?? '' }}</td>
        </tr>
        <tr>
            <th>{{ __('main.created_by') }}:</th>
            <td>{{ $complaint->createdBy->name ?? '' }}</td>
            <th scope="row"></th>
            <th>{{ __('main.updated_by') }}:</th>
            <td>{{ $complaint->updatedBy->name ?? '' }}</td>
        </tr>
        <tr>
            <th>{{ __('main.deleted') }}:</th>
            <td>
                @if(($complaint->deleted ?? '') == 0)
                    {{ __('dropdowns.deleted.0') }}
                @elseif(($complaint->deleted ?? '') == 1)
                    {{ __('dropdowns.deleted.1') }}
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
        <a href="{{ route('complaint.destroy', ($complaint->id ?? '')) }}" class="nav-link sidebar-nav
            @if (in_array(Route::currentRouteName(), ['complaint.destroy'])) active @else text-white @endif
            ">
            <span>
                {{ __('actions.delete') }}
            </span>
            <svg class="sidebar-img" fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                <path d="M 21 0 C 19.355469 0 18 1.355469 18 3 L 18 5 L 10.1875 5 C 10.0625 4.976563 9.9375 4.976563 9.8125 5 L 8 5 C 7.96875 5 7.9375 5 7.90625 5 C 7.355469 5.027344 6.925781 5.496094 6.953125 6.046875 C 6.980469 6.597656 7.449219 7.027344 8 7 L 9.09375 7 L 12.6875 47.5 C 12.8125 48.898438 14.003906 50 15.40625 50 L 34.59375 50 C 35.996094 50 37.1875 48.898438 37.3125 47.5 L 40.90625 7 L 42 7 C 42.359375 7.003906 42.695313 6.816406 42.878906 6.503906 C 43.058594 6.191406 43.058594 5.808594 42.878906 5.496094 C 42.695313 5.183594 42.359375 4.996094 42 5 L 32 5 L 32 3 C 32 1.355469 30.644531 0 29 0 Z M 21 2 L 29 2 C 29.5625 2 30 2.4375 30 3 L 30 5 L 20 5 L 20 3 C 20 2.4375 20.4375 2 21 2 Z M 11.09375 7 L 38.90625 7 L 35.3125 47.34375 C 35.28125 47.691406 34.910156 48 34.59375 48 L 15.40625 48 C 15.089844 48 14.71875 47.691406 14.6875 47.34375 Z M 18.90625 9.96875 C 18.863281 9.976563 18.820313 9.988281 18.78125 10 C 18.316406 10.105469 17.988281 10.523438 18 11 L 18 44 C 17.996094 44.359375 18.183594 44.695313 18.496094 44.878906 C 18.808594 45.058594 19.191406 45.058594 19.503906 44.878906 C 19.816406 44.695313 20.003906 44.359375 20 44 L 20 11 C 20.011719 10.710938 19.894531 10.433594 19.6875 10.238281 C 19.476563 10.039063 19.191406 9.941406 18.90625 9.96875 Z M 24.90625 9.96875 C 24.863281 9.976563 24.820313 9.988281 24.78125 10 C 24.316406 10.105469 23.988281 10.523438 24 11 L 24 44 C 23.996094 44.359375 24.183594 44.695313 24.496094 44.878906 C 24.808594 45.058594 25.191406 45.058594 25.503906 44.878906 C 25.816406 44.695313 26.003906 44.359375 26 44 L 26 11 C 26.011719 10.710938 25.894531 10.433594 25.6875 10.238281 C 25.476563 10.039063 25.191406 9.941406 24.90625 9.96875 Z M 30.90625 9.96875 C 30.863281 9.976563 30.820313 9.988281 30.78125 10 C 30.316406 10.105469 29.988281 10.523438 30 11 L 30 44 C 29.996094 44.359375 30.183594 44.695313 30.496094 44.878906 C 30.808594 45.058594 31.191406 45.058594 31.503906 44.878906 C 31.816406 44.695313 32.003906 44.359375 32 44 L 32 11 C 32.011719 10.710938 31.894531 10.433594 31.6875 10.238281 C 31.476563 10.039063 31.191406 9.941406 30.90625 9.96875 Z"/>
            </svg>
        </a>
    </li>
    <hr>
    <li class="nav-item side-nav">
        <a href="{{ route('complaint.show', ($complaint->id ?? '')) }}" class="nav-link sidebar-nav
            @if (Route::currentRouteName() == 'complaint.show') active @else text-white @endif
            ">
            <span>
                {{ __('actions.view') }}
            </span>
            <svg class="sidebar-img" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                 style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                <path
                    d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h16l.002 14H4z"></path>
                <path d="M6 7h12v2H6zm0 4h12v2H6zm0 4h6v2H6z"></path>
            </svg>
        </a>
    </li>
    <li class="nav-item side-nav">
        <a href="{{ route('complaint.create') }}" class="nav-link sidebar-nav
            @if (Route::currentRouteName() == 'complaint.create') active @else text-white @endif
            ">
            <span>
                {{ __('actions.create') }}
            </span>
            <svg class="sidebar-img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                <path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path>
            </svg>
        </a>
    </li>
    <li class="nav-item side-nav">
        <a href="{{ route('complaint.edit', ($complaint->id ?? '')) }}" class="nav-link sidebar-nav
            @if (in_array(Route::currentRouteName(), ['complaint.edit'])) active @else text-white @endif
            ">
            <span>
                {{ __('actions.edit') }}
            </span>
            <svg class="sidebar-img" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                 style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                <path
                    d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path>
            </svg>
        </a>
    </li>
    <li class="nav-item side-nav">
        <a href="{{ route('complaint.list') }}" class="nav-link sidebar-nav
            @if (in_array(Route::currentRouteName(), ['complaint.list'])) active @else text-white @endif
            ">
            <span>
                {{ __('actions.list') }}
            </span>
            <svg class="sidebar-img" version="1.0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                    <path d="M272 4480 c-102 -22 -193 -96 -241 -199 -22 -47 -26 -69 -26 -141 1 -72 5 -94 28 -142 62 -128 203 -208 341 -194 293 30 415 382 204 588 -75 73 -201 110 -306 88z"/>
                    <path d="M1360 4405 c-101 -32 -170 -129 -170 -241 0 -34 7 -78 15 -98 23 -55 79 -111 135 -135 l49 -21 1778 2 c1678 3 1780 4 1810 21 90 49 138 130 138 232 -1 101 -48 179 -140 228 l-40 22 -1765 2 c-1490 1 -1772 0 -1810 -12z"/>
                    <path d="M250 2891 c-93 -29 -177 -101 -219 -190 -38 -81 -38 -201 0 -282 56 -119 161 -190 294 -197 104 -5 173 19 248 88 75 69 110 147 110 250 0 62 -6 88 -28 139 -35 78 -113 151 -190 180 -57 22 -164 27 -215 12z"/>
                    <path d="M1393 2810 c-123 -25 -203 -122 -203 -250 0 -106 53 -189 150 -234 l45 -21 1770 0 c1650 0 1772 1 1806 17 54 25 96 64 127 117 23 39 27 57 27 121 0 64 -4 82 -27 121 -31 53 -73 92 -127 117 -34 16 -156 17 -1781 19 -960 0 -1764 -3 -1787 -7z"/>
                    <path d="M233 1300 c-80 -26 -161 -99 -200 -178 -23 -48 -27 -70 -28 -142 0 -77 3 -92 33 -152 73 -148 229 -223 384 -183 160 40 260 168 260 330 1 235 -225 398 -449 325z"/>
                    <path d="M1335 1187 c-93 -44 -145 -126 -145 -231 0 -76 34 -151 88 -196 77 -64 -36 -60 1897 -58 l1760 3 40 22 c92 49 139 127 140 228 0 102 -48 183 -138 232 -30 17 -132 18 -1812 20 l-1780 3 -50 -23z"/>
                </g>
            </svg>
        </a>
    </li>
@endsection
