<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-12 col-lg-11 col-xl-11">
                <div class="card bg-green text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-4 mt-md-4 pb-2">
                            <h2 class="fw-bold mb-2 text-uppercase">Registration</h2>
                                <form action="{{ route('user.register') }}" method="post" class="needs-validation simple-form-long">
                                    @CSRF
                                    <legend>Fill in needed information</legend>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationTooltip01">First name</label>
                                            <input type="text" name="first_name" class="form-control @error('first_name') validation-issue @enderror" id="validationTooltip01" @error('first_name') placeholder="{{ $message }}" @else placeholder="First name" value="{{ old('first_name') }}" @enderror required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationTooltip02">Last name</label>
                                            <input type="text" name="last_name" class="form-control @error('last_name') validation-issue @enderror" id="validationTooltip02" @error('last_name') placeholder="{{ $message }}" @else placeholder="last name" value="{{ old('last_name') }}" @enderror required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationTooltipEmail">Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text">@</span>
                                                <input type="email" name="email" class="form-control @error('email') validation-issue @enderror" id="validationTooltipEmail" @error('email') placeholder="{{ $message }}" @else placeholder="Email" value="{{ old('email') }}" @enderror aria-describedby="validationTooltipEmailPrepend" required>
                                                <div class="invalid-tooltip">
                                                    Please choose a unique and valid username.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationTooltipLanguage">Language</label>
                                            <select class="form-select form-select" name="language" aria-label=".form-select-sm example" id="validationTooltipLanguage">
                                                <option selected>Select preffered language</option>
                                                <option value="LT" @if (old('language') == 'LT') selected @endif>Lithuania</option>
                                                <option value="EN" @if (old('language') == 'EN') selected @endif>English</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-5">
                                            <label for="validationTooltipNewPass">Password</label>
                                            <input type="password" name="password" class="form-control @error('password') validation-issue @enderror" id="validationTooltipNewPass" placeholder="@error('password') {{ $message }} @enderror">
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label for="validationTooltipRepPass">Repeat password</label>
                                            <input type="password" name="repeat_password" class="form-control @error('repeat_password') validation-issue @enderror" id="validationTooltipRepPass" placeholder="@error('repeat_password') {{ $message }} @enderror">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-light btn-lg btn-block" type="submit">Submit registration</button>
                                        </div>
                                    </div>
                            </form>
                        </div>

                        <div>
                            <p class="mb-0">You have an account? <a href="{{ route('main') }}" class="text-white-50 fw-bold">Sign In</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
