@extends("shared.admin-base")

@section("title", "Kelola Akun")

@section("main-content")
    <div class="container-fluid">
        @if (session("message-success"))
        <div class="alert alert-success">
            {{ session("message-success") }}
        </div>
        @endif
        <h1> Perbaharui Data Akun </h1>
        <hr/>

        <form method="POST" action="{{ route('user.update', auth()->user()) }}">
            <div class="form-group">
                <label class="control-label"> Nama Asli: </label>
                <input value="{{ old('name') ?: auth()->user()->name }}" type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">

                @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label class="control-label"> Nama Pengguna: </label>
                <input value="{{ old('username') ?: auth()->user()->username }}" type="text" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}">

                @if ($errors->has('username'))
                <div class="invalid-feedback">
                    {{ $errors->first('username') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label class="control-label"> Alamat E-Mail: </label>
                <input value="{{ old('email') ?: auth()->user()->email }}" type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">

                @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label class="control-label"> Nomor Induk Kependudukan (NIK): </label>
                <input value="{{ old('identity_code') ?: auth()->user()->identity_code }}" type="text" name="identity_code" class="form-control {{ $errors->has('identity_code') ? 'is-invalid' : '' }}">

                @if ($errors->has('identity_code'))
                <div class="invalid-feedback">
                    {{ $errors->first('identity_code') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label class="control-label"> Nomor Telepon: </label>
                <input value="{{ old('phone') ?: auth()->user()->phone }}" type="phone" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}">

                @if ($errors->has('phone'))
                <div class="invalid-feedback">
                    {{ $errors->first('phone') }}
                </div>
                @endif
            </div>

            <div class="text-right">
                <button class="btn btn-primary">
                    Perbaharui Data Akun
                    <i class="fa fa-check"></i>
                </button>
            </div>

            {{ csrf_field() }}
        </form>

        <div style="height: 50px"></div>

        <form method="POST" action="{{ route('user.updatePassword', auth()->user()) }}">
            <h1> Ganti Kata Sandi </h1>
            <hr/>

            <div class="form-group">
                <label class="control-label"> Kata Sandi Lama: </label>
                <input type="password" name="old_password" class="form-control {{ $errors->has('old_password') ? 'is-invalid' : '' }}">

                @if ($errors->has('old_password'))
                <div class="invalid-feedback">
                    {{ $errors->first('old_password') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label class="control-label"> Kata Sandi Baru: </label>
                <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">

                @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
                @endif
            </div>

            <div class="form-group">

                <label class="control-label"> Ulangi Kata Sandi Baru: </label>
                <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">

                @if ($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
                </div>
                @endif
            </div>

            <div class="text-right">
                <button class="btn btn-primary">
                    Ganti Kata Sandi
                    <i class="fa fa-check"></i>
                </button>
            </div>

            {{ csrf_field() }}
        </form>

    </div>
@endsection