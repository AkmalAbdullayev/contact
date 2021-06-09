<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact | Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="undefined" crossorigin="anonymous">
</head>
<body>
<div class="container mt-2">
    @if (session()->has('success'))
        <span class="text-success">{{ session('success') }}</span>
    @endif

    @if (session()->has('error'))
        <span class="text-success">{{ session('error') }}</span>
    @endif

    <form action="{{ route('contact.store') }}" method="post">
        @csrf

        <div class="form-row">
            <div class="col-4">
                <label for="full_name">Full Name: </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Enter full name..."
                    value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror"
                >

                @error('name')
                <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-4">
                <label for="full_name">Email: </label>
                <input
                    type="text"
                    id="email"
                    name="email"
                    placeholder="Enter email..."
                    value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                >

                @error('email')
                <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-4">
                <label for="full_name">Mobile: </label>
                <input
                    type="text"
                    id="number"
                    name="number"
                    placeholder="Enter mobile number..."
                    class="form-control @error('number') is-invalid @enderror"
                >

                @error('number')
                <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success float-right mt-2">Save</button>
    </form>
</div>
</body>
</html>
