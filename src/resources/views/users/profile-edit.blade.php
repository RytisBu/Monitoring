@extends('main')

@section('main.content')
    <form action="{{ route('profile.store') }}" method="post" class="needs-validation simple-form-long">
        @CSRF
        <legend>Profile Edit View</legend>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="validationTooltip01">First name</label>
                <input type="text" name="first_name" class="form-control" id="validationTooltip01" value="{{ $user->first_name ?? '' }}" placeholder="First name" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationTooltip02">Last name</label>
                <input type="text" name="last_name" class="form-control" id="validationTooltip02" value="{{ $user->last_name ?? '' }}" placeholder="Last name" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationTooltipEmail">Email</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input type="email" name="email" class="form-control" id="validationTooltipEmail" value="{{ $user->email ?? '' }}" placeholder="Email" aria-describedby="validationTooltipEmailPrepend" required @if(!empty($user->email)) disabled @endif>
                    <div class="invalid-tooltip">
                        Please choose a unique and valid username.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="validationTooltipOldPass">Old password</label>
                <input type="password" name="old_password" class="form-control" id="validationTooltipOldPass">
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationTooltipNewPass">New password</label>
                <input type="password" name="new_password" class="form-control" id="validationTooltipNewPass">
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationTooltipRepPass">Repeate password</label>
                <input type="password" name="repeate_new_password" class="form-control" id="validationTooltipRepPass">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="validationTooltip05">Street</label>
                <input type="text" name="address_street" class="form-control" id="validationTooltip05" value="{{ $user->address_street ?? '' }}" placeholder="Street" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationTooltip04">City</label>
                <input type="text" name="address_city" class="form-control" id="validationTooltip04" value="{{ $user->address_city ?? '' }}" placeholder="City" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationTooltip03">State</label>
                <input type="text" name="address_state" class="form-control" id="validationTooltip03" value="{{ $user->address_country ?? '' }}" placeholder="State" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="validationTooltipLanguage">Language</label>
                <select class="form-select form-select" name="language" aria-label=".form-select-sm example" id="validationTooltipLanguage">
                    <option selected>Select preffered language</option>
                    <option value="LT" @if ($user->language ?? '' == 'LT') selected @endif>Lithuania</option>
                    <option value="EN" @if ($user->language ?? '' == 'EN') selected @endif>English</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationTooltipMobilePhone">Mobile phone</label>
                <div class="input-group">
                    <span class="input-group-text">+</span>
                    <input type="number" name="phone_mobile" class="form-control" id="validationTooltipMobilePhone" value="{{ $user->phone_mobile ?? '' }}" aria-describedby="validationTooltipMobilePhonePrepend">
                    <div class="invalid-tooltip">
                        Please type in 11 numbers containing your mobile phone number...
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationTooltipWorkPhone">Work phone</label>
                <div class="input-group">
                    <span class="input-group-text">+</span>
                    <input type="number" name="work_mobile" class="form-control" id="validationTooltipWorkPhone" value="{{ $user->work_mobile ?? '' }}" aria-describedby="validationTooltipWorkPhonePrepend">
                    <div class="invalid-tooltip">
                        Please type in 11 numbers containing your work phone number...
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-mb-12 mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ $user->description ?? '' }}</textarea>
            </div>
        </div>
        <div class="row">
            <button class="btn btn-success btn-lg btn-block" type="submit">Save profile</button>
        </div>
    </form>
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
