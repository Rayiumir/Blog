<x-app-layout>
    <div class="container">
        <div class="col-md-6 offset-3" style="margin-top: 250px">
            <div class="card">
                <div class="card-header">
                    ورود به سایت
                </div>
                <div class="card-body">
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Email1" class="form-label">ایمیل</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="Email1" value="{{ old('email') }}" placeholder="ایمیل خود را وارد کنید">
                            @error('email')
                            <div class="text-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Password1" class="form-label">رمز عبور</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="Password1" value="{{ old('password') }}" placeholder="رمز عبور قوی وارد کنید">
                            @error('password')
                            <div class="text-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="privacy" name="privacy">
                            <label class="form-check-label" for="privacy">شرایط و قوانین را می پذیرم</label>
                            @error('privacy')
                            <div class="text-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">ورود</button>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                حساب کاربری ندارید؟ <a href="{{ route('register') }}" class="fw-bolder text-dark text-decoration-none">عضو شوید</a>
                <br>
                رمز عبور را فراموش کردید؟ <a href="{{ route('password.email') }}" class="fw-bolder text-dark text-decoration-none">وارد شوید</a>
            </div>
        </div>
    </div>
</x-app-layout>
