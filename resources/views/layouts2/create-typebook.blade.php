@extends('layouts.app')
@section('title','Create')

@section('content')
<div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form method="POST" action="{{route('store')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jenis Buku</label>
            <input type="text" name="jenis_buku" class="form-control" id="Jenis Buku">
        </div>
        <div class="mb-3">
            <a href="/layouts2/index" class="btn btn-primary">Back</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection