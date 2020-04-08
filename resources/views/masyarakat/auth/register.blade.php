@extends('layouts.auth.app', ['title' => 'Register'])

@section('content')
<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
    <div class="login-brand">
        <img src="{{ asset('template') }}/img/stisla-fill.svg" alt="logo" width="100"
            class="shadow-light rounded-circle">
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('masyarakat.register.submit') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="nama">Nama Lengkap</label>
                        <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}"
                            autofocus required>
                        @error('nama')
                        <small class="text-danger">Nama sudah digunakan, silahkan gunakan nama lain!</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-7">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                            required>
                        @error('email')
                        <small class="text-danger">Email sudah digunakan, silahkan gunakan email lain!</small>
                        @enderror
                    </div>

                    <div class="form-group col-5">
                        <label for="telp">No. Telp</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="telp" value="{{ old('telp') }}"
                                required>
                            @error('telp')
                            <small class="text-danger">The phone must be between 8 and 13 digits.</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="telp">Username</label>
                        <div class="input-group">
                            <input type="text" class="form-control phone-number" name="username"
                                value="{{ old('username') }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label>Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="password" class="form-control pwstrength" data-indicator="pwindicator"
                                id="password" name="password" required>
                            @error('password')
                            <small class="text-danger">The password must be between 7 and 255 characters.</small>
                            @enderror
                        </div>
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label>Password Confirmation</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="password" class="form-control pwstrength" data-indicator="pwindicator"
                                name="password-confirm" id="confirm_password" required>
                        </div>
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                    </div>
                    <script>
                        var password = document.getElementById("password")
                        , confirm_password = document.getElementById("confirm_password");

                        function validatePassword(){
                        if(password.value != confirm_password.value) {
                            confirm_password.setCustomValidity("Passwords Don't Match");
                        } else {
                            confirm_password.setCustomValidity('');
                        }
                        }

                        password.onchange = validatePassword;
                        confirm_password.onkeyup = validatePassword;
                    </script>
                </div>

                <hr>
                <div class="form-divider">
                    Bukti Identitas
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="nik" value="{{ old('nik') }}" required>
                        @error('nik')
                        <small class="text-danger">Nik sudah digunakan, silahkan gunakan NIK lain!</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                        <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="simple-footer">
        Copyright &copy; Stisla 2018
    </div>
</div>
@endsection
