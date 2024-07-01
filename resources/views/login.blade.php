<x-auth-layout>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                <div class="card-body">
                    @isset($message)
                        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                            <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </symbol>
                        </svg>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-1 me-2 col-1" role="img" style="height:1.7em;" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div class="col-10">{{ $message }}</div>
                        </div>
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