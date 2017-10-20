@extends("shared.base")

@section("body")

    @include("shared.navbar-base", ["page" => "Daftar Akun Baru"])

    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <i class="fa fa-list"></i> Daftar Akun Baru
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    <div class="form-group">
                        <label class="control-label"> Nama Asli: </label>
                        <input value="{{ old('name') }}" type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">

                        @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label"> Nama Pengguna: </label>
                        <input value="{{ old('username') }}" type="text" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}">

                        @if ($errors->has('username'))
                        <div class="invalid-feedback">
                            {{ $errors->first('username') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label"> Alamat E-Mail: </label>
                        <input value="{{ old('email') }}" type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">

                        @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label"> Kata Sandi: </label>
                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">

                        @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label"> Ulangi Kata Sandi: </label>
                        <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">

                        @if ($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                        @endif
                    </div>

                    <p style="text-align: right;">
                        <button class="btn btn-primary"> <i class="fa fa-check"></i> Daftar </button>
                    </p>

                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        
    </div>
    
@endsection