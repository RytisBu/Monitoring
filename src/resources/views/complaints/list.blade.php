@extends('main')

@section('main.content')
    <div class="d-flex flex-column bd-highlight mb-3">
        <div class="d-flex flex-column justify-content-center flex-lg-wrap">
            <form action="{{ route('complaint.list') }}" method="get" class="needs-validation simple-form-long">
                @CSRF
                <legend>{{ __('main.complaints_list_header') }}</legend>
                <div class="row">
                    <div class="col-md-6 mb-6">
                        <label>{{ __('main.name') }}:</label>
                        <input type="text" name="name" class="form-control" value="{{ $complaintsFilter->name ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-6">
                        <label>{{ __('main.category') }}:</label>
                        <select class="form-select form-select" name="category" aria-label=".form-select-sm example">
                            @empty($complaintsFilter->category)
                                <option selected></option>
                            @endempty
                            <option value="System not working" @if (($complaintsFilter->category ?? '') == 'System not working') selected @endif>{{ __('dropdowns.category.' . ($complaintsFilter->category ?? '')) }}</option>
                            <option value="Need permissions" @if (($complaintsFilter->category ?? '') == 'Need permissions') selected @endif>{{ __('dropdowns.category.' . ($complaintsFilter->category ?? '')) }}</option>
                            <option value="Found bug" @if (($complaintsFilter->category ?? '') == 'Found bug') selected @endif>{{ __('dropdowns.category.' . ($complaintsFilter->category ?? '')) }}</option>
                            <option value="API" @if (($complaintsFilter->category ?? '') == 'API') selected @endif>{{ __('dropdowns.category.' . ($complaintsFilter->category ?? '')) }}</option>
                            <option value="Other" @if (($complaintsFilter->category ?? '') == 'Other') selected @endif>{{ __('dropdowns.category.' . ($complaintsFilter->category ?? '')) }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label>{{ __('main.priority') }}:</label>
                        <select class="form-select form-select" name="priority" aria-label=".form-select-sm example">
                            @empty($complaintsFilter->priority)
                                <option selected></option>
                            @endempty
                            <option value="Ctritical" @if (($complaintsFilter->priority ?? '') == 'Critical') selected @endif>{{ __('dropdowns.priority.' . ($complaintsFilter->priority ?? '')) }}</option>
                            <option value="Normal" @if (($complaintsFilter->priority ?? '') == 'Normal') selected @endif>{{ __('dropdowns.priority.' . ($complaintsFilter->priority ?? '')) }}</option>
                            <option value="Low" @if (($complaintsFilter->priority ?? '') == 'Low') selected @endif>{{ __('dropdowns.priority.' . ($complaintsFilter->priority ?? '')) }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label>{{ __('main.status') }}:</label>
                        <select class="form-select form-select" name="status" aria-label=".form-select-sm example">
                            @empty($complaintsFilter->status)
                                <option selected></option>
                            @endempty
                            <option value="Registered" @if (($complaintsFilter->status ?? '') == 'Registered') selected @endif>{{ __('dropdowns.complaints_status.' . ($complaintsFilter->status ?? '')) }}</option>
                            <option value="Solving" @if (($complaintsFilter->status ?? '') == 'Solving') selected @endif>{{ __('dropdowns.complaints_status.' . ($complaintsFilter->status ?? '')) }}</option>
                            <option value="Resolved" @if (($complaintsFilter->status ?? '') == 'Resolved') selected @endif>{{ __('dropdowns.complaints_status.' . ($complaintsFilter->status ?? '')) }}</option>
                            <option value="Spam" @if (($complaintsFilter->status ?? '') == 'Spam') selected @endif>{{ __('dropdowns.complaints_status.' . ($complaintsFilter->status ?? '')) }}</option>
                            <option value="Inform client" @if (($complaintsFilter->status ?? '') == 'Inform client') selected @endif>{{ __('dropdowns.complaints_status.' . ($complaintsFilter->status ?? '')) }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label>{{ __('main.created_at_from') }}:</label>
                        <input type="date" name="created_at" class="form-control" value="{{ $complaintsFilter->created_at ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-6">
                        <label>{{ __('main.updated_at_from') }}:</label>
                        <input type="date" name="updated_at" class="form-control" value="{{ $complaintsFilter->updated_at ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-6">
                        <label>{{ __('main.assigned_user_id') }}:</label>
                        <select class="form-select form-select @error('assigned_user_id') validation-issue text-red @enderror" name="assigned_user_id" aria-label=".form-select-sm example">
                            @isset($complaintsFilter->assigned_user_id)
                                @foreach($users as $user)
                                    @if($complaintsFilter->assigned_user_id == $user->id)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            @else
                                <option selected></option>
                            @endisset
                            @error('assigned_user_id') <option selected>{{ $message }}</option> @enderror
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label>{{ __('main.system_id') }}:</label>
                        <select class="form-select form-select @error('system_id') validation-issue text-red @enderror" name="system_id" aria-label=".form-select-sm example">
                            @isset($complaintsFilter->system_id)
                                @foreach($systems as $system)
                                    @if($system->id == $complaintsFilter->system_id)
                                        <option value="{{ $system->id }}">{{ $system->name }}</option>
                                    @endif
                                @endforeach
                            @else
                                <option selected></option>
                            @endisset
                                @foreach($systems as $system)
                                    <option value="{{ $system->id }}">{{ $system->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="d-flex flex-column p-2 bd-highlight">
                        <button class="btn btn-success btn-lg btn-block" type="submit">Filter</button>
                    </div>
                </div>

                <table class="table table-striped table-hover">
                    <thead>
                    <tr class="list-header">
                        <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="name">{{ __('main.name') }}</button></th>
{{--                       Here--}}
                        <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="category">{{ __('main.category') }}</button></th>
                        <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="priority">{{ __('main.priority') }}</button></th>
                        <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="created_at">{{ __('main.created_at') }}</button></th>
                        <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="status">{{ __('main.status') }}</button></th>
{{--                        here--}}
                        <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="assigned_user_id">{{ __('main.assigned_user_id') }}</button></th>
                        <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="system_id">{{ __('main.system_id') }}</button></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($complaints as $complaint)
                        <tr>
                            <th scope="row"><a href="{{ route('complaint.show', $complaint->id) }}" class="text-green">{{ $complaint->name }}</a></th>
                            <th>{{ $complaint->category }}</a></th>
                            <th>{{ $complaint->priority }}</a></th>
                            <th>{{ $complaint->created_at }}</th>
                            <td>{{ $complaint->status }}</td>
                            <th>{{ $complaint->user->name ?? '' }}</th>
                            <td> {{ $complaint->system->name ?? '' }} </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <input type="hidden" name="orderType" value="{{ $orderType ?? 'DESC' }}">
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-end bd-highlight mb-3">
        {{ $complaints->withQueryString()->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
    </div>
@endsection

@section('sidebar.collection')
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
@endsection


