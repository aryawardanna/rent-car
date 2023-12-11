@extends('layouts.guest')
@section('content')

    <div class="container">
        <h2>Login</h2>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body login-card-body">
            <form method="POST" action="{{ route('login.members') }}">
                @csrf
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                        required autofocus>
                </div>

                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password" required>
                </div>

                <div class="mt-2  d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Login</button>
                    <a href="{{ route('member.register') }}" class="btn btn-info">Register</a>
                    {{-- <a href="" class="btn btn-info">Register</a> --}}
                </div>
            </form>
        </div>
    </div>
@endsection
