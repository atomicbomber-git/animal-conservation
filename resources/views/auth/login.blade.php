@extends("shared.base")

@section("body")

    @include("shared.navbar-base", ["page" => "Masuk"])

    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <i class="fa fa-sign-in"></i> Masuk
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    <div class="form-group">
                        <label class="control-label"> Nama Pengguna: </label>
                        <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}">

                        @if ($errors->has('username'))
                        <div class="invalid-feedback">
                            {{ $errors->first('username') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label class="control-label"> Kata Sandi: </label>
                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">

                        @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                        @endif
                    </div>

                    <p style="text-align: right;">
                        <small>
                            Belum memiliki akun? <a href="{{ route('register') }}"> Daftar disini. </a>
                        </small>
                    </p>

                    <p style="text-align: right;">
                        <button class="btn btn-primary"> <i class="fa fa-sign-in"></i> Masuk </button>
                    </p>

                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        
    </div>
    
@endsection