@extends('layouts.app')
@section('title','Edit')
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
    <form action="{{route('update',[$data->id])}}" method="POST">
        @csrf
        @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Jenis Buku</label>
        <input type="text" name="jenis_buku" class="form-control" id="exampleFormControlInput1" value="{{$listbook->jenis_buku}}">
    </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="/layouts2/index" class="btn btn-primary ">Back</a>
        </div>
    </form>
</div>
@endsection