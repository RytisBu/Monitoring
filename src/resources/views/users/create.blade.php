@extends('main')

@section('main.content')
    <form action="{{ route('user.store') }}" method="post" class="needs-validation simple-form-long">
        @CSRF
        <legend>{{ __('main.user_create_view') }}</legend>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="validationTooltip01">{{ __('main.first_name') }}:</label>
                <input type="text" name="first_name" class="form-control" id="validationTooltip01" value="{{ old('first_name') }}" placeholder="First name" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationTooltip02">{{ __('main.last_name') }}:</label>
                <input type="text" name="last_name" class="form-control" id="validationTooltip02" value="{{ old('first_name') }}" placeholder="Last name" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationTooltipEmail">{{ __('main.email') }}:</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input type="email" name="email" class="form-control" id="validationTooltipEmail" value="{{ old('email') }}" placeholder="Email" aria-describedby="validationTooltipEmailPrepend" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="validationTooltipNewPass">{{ __('main.new_password') }}:</label>
                <input type="password" name="new_password" class="form-control" id="validationTooltipNewPass">
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationTooltipRepPass">{{ __('main.repeat_password') }}</label>
                <input type="password" name="repeate_new_password" class="form-control" id="validationTooltipRepPass">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="validationTooltipLanguage">{{ __('main.language') }}:</label>
                <select class="form-select form-select" name="language" aria-label=".form-select-sm example" id="validationTooltipLanguage">
                    <option>Select preffered language</option>
                    <option value="LT" @if (old('language') == 'LT') selected @endif>{{ __('dropdowns.language.LT') }}</option>
                    <option value="EN" @if (old('language') == 'EN') selected @endif>{{ __('dropdowns.language.EN') }}</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationTooltipMobilePhone">{{ __('main.mobile_phone') }}:</label>
                <div class="input-group">
                    <span class="input-group-text">+</span>
                    <input type="number" name="phone_mobile" class="form-control" id="validationTooltipMobilePhone" value="{{ old('phone_mobile') }}" aria-describedby="validationTooltipMobilePhonePrepend">
                    <div class="invalid-tooltip">
                        Please type in 11 numbers containing your mobile phone number...
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <button class="btn btn-success btn-lg btn-block" type="submit">Save profile</button>
        </div>
    </form>
@endsection

@section('sidebar.collection')
    <li class="nav-item side-nav">
        <a href="{{ route('user.create') }}" class="nav-link sidebar-nav
            @if (Route::currentRouteName() == 'user.create') active @else text-white @endif
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
        <a href="{{ route('user.list') }}" class="nav-link sidebar-nav
            @if (in_array(Route::currentRouteName(), ['user.list'])) active @else text-white @endif
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
