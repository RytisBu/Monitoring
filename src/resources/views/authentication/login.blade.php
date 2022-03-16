<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-green text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-4 mt-md-4 pb-2">

                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-3">Please enter your login and password!</p>
                            <form action="{{ route('login') }}" method="post" class="mb-4">
                                @csrf
                                <div class="form-outline form-white mb-4">
                                    <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg"
                                          @error('email')
                                            placeholder="{{ $message }}"
                                          @enderror
                                    />
                                    <label class="form-label" for="typeEmailX">Email</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg"
                                           @error('password')
                                           placeholder="{{ $message }}"
                                        @enderror
                                    />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                            </form>

                            <div class="form-outline form-white mb-4">
                                <p class="small mb-4 pb-lg-2"><a class="text-white-50" href="#">Forgot password?</a>
                                </p>
                            </div>
                        </div>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign
                                    Up</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
