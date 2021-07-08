@extends('layouts.app')
@section('title','Show')

@section('content')
<div class="container">
<form action="{{route('update',[$data->id])}}" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Jenis Buku</label>
        <input type="text" name="jenis_buku" class="form-control" id="exampleFormControlInput1" value="{{$data->jenis_buku}}">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('delete',[$data->id])}}" class="btn btn-danger">Delete</a>
    </div>
</form>
</div>
@endsection