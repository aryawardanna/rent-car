@extends('layouts.guest')
@section('content')

    <div class="container">
        <h2>Register</h2>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body register-card-body">
            <form method="POST" action="{{ route('registernow') }}">
                @csrf
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required
                        autofocus>
                </div>

                <div>
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" name="phone" required value="{{ old('phone') }}">
                </div>
                <div>
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                </div>
                <div>
                    <label for="address">SIM</label>
                    <input type="number" class="form-control" name="sim" value="{{ old('sim') }}">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password" required>
                </div>

                <div class="mt-2  d-flex justify-content-between">
                    <a href="{{ route('member.login') }}" class="btn btn-warning">Back To Login</a>
                    <button type="submit" class="btn btn-success">Register Now</button>
                </div>
            </form>
        </div>
    </div>
@endsection
