<x-auth-layout>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                <div class="card-body">
                    @isset($message)
                        <p style="color: rgb(209, 16, 5)">{{ $message }}</p>
                    @endisset
                    <form action="/login/attempt" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" value="{{ isset($email)? $email : null }}" required/>
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" {{ !isset($email)? 'required' : '' }}/>
                            <label for="inputPassword">Password</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="inputRememberPassword" name="remember_password" type="checkbox" value=1 />
                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <a class="small" href="/password">Forgot Password?</a>
                            <button class="btn btn-primary" type="submit" name="submit">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="/register">Need an account? Sign up!</a></div>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>