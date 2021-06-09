<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact | Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="undefined" crossorigin="anonymous">
</head>
<body>
<div class="container mt-2">
    <form action="{{ route('contact.update', $contact->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="col-6">
                <input type="text" id="name" name="name" value="{{ $contact->name }}" class="form-control">
            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
