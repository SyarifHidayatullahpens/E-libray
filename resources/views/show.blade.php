@extends('layouts.app')
@section('title','Show')

@section('content')
<div class="container">
<form action="{{route('update',[$data->id])}}" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Buku</label>
        <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" value="{{$data->nama_buku}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Penerbit</label>
        <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" value="{{$data->penerbit}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Jenis Buku</label>
        <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" value="{{$data->jenis_buku}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tahun Terbit </label>
        <input   type="date" name="tanggal" class="form-control" id="exampleFormControlInput1" value="{{$data->thn_terbit}}">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">file</label>
        <input class="form-control" type="file" name="path" id="formFile">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('delete',[$data->id])}}" class="btn btn-danger">Delete</a>
    </div>
</form>
</div>
@endsection