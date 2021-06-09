<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact | Numbers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="undefined" crossorigin="anonymous">
</head>
<body>
<div class="container mt-2">
    <h2>{{ $contact->name }}</h2>

    <span>Add New Phone Number</span>
    <form action="{{ route('mobile.store') }}" method="post">
        @csrf

        <div class="form-row mb-5">
            <div class="col-6">
                <input type="text" id="number" name="number" class="form-control">
                <input type="hidden" name="id" value="{{ $contact->id }}">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>
    <x-table>
        <x-slot name="head">
            <x-table.heading>#</x-table.heading>
            <x-table.heading>Number</x-table.heading>
            <x-table.heading>Created at</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @forelse($contact->mobile_numbers as $k => $number)
                <x-table.row>
                    <x-table.cell>{{ ++$k }}</x-table.cell>
                    <x-table.cell>{{ $number->number }}</x-table.cell>
                    <x-table.cell>{{ $number->created_at->format('d-m-Y') }}</x-table.cell>
                </x-table.row>
            @empty
                <x-table.cell colspan="3">Nothing found.</x-table.cell>
            @endforelse
        </x-slot>
    </x-table>
</div>
</body>
</html>
