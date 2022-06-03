@extends('layouts.home')

@section('content')
<!-- Header -->
<header id="header" class="ex-2-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Log In</h1>
                <p>Masukkan Email / Username / NIP serta Password untuk masuk ke sistem</p>
                <!-- Sign Up Form -->
                <div class="form-container">
                    @if ($errors->all())
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li class="text-danger">{{ $item }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="login" name="login" required>
                            <label class="label-control" for="login">Email / Username / NIP</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control-input" id="password" name="password" required autocomplete="off">
                            <label class="label-control" for="password">Password</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">LOG IN</button>
                        </div>
                    </form>
                </div> <!-- end of form container -->
                <!-- end of sign up form -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->
@endsection
