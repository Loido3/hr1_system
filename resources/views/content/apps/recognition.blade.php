@extends('layouts/layoutMaster')

@section('title', 'Recognition')

@section('vendor-style')
@vite('resources/assets/vendor/libs/flatpickr/flatpickr.scss')
@endsection


@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/flatpickr/flatpickr.js',
  'resources/assets/vendor/libs/cleavejs/cleave.js',
  'resources/assets/vendor/libs/cleavejs/cleave-phone.js',
  'resources/assets/vendor/libs/jquery-repeater/jquery-repeater.js'
])
@endsection


@section('content')


<style>
        .input-form {
            flex-wrap: wrap;
        }
        .input-form input {
            width: auto;
            margin-right: 5px;
        }
    </style>
</head>
    <div class="container mt-4">
        <h1 class="text-center mb-3">Employee Recognition</h1>

        <form action="{{ route('recognition.store') }}" method="POST">
    @csrf
    <div class="input-form mb-3 d-flex justify-content-center">
        <input type="text" class="form-control mr-1" name="name" placeholder="Name" required>
        <input type="text" class="form-control mr-1" name="achievement" placeholder="Achievement" required>
        <input type="number" class="form-control mr-1" name="score" placeholder="Score" required>
        <button class="btn btn-primary" type="submit">Add</button>
    </div>
</form>
@endsection
