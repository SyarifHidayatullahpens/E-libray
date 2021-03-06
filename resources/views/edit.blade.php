@extends('layouts.app')
@section('title','Edit Book')
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
    <form action="{{route('update',[$data->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Buku</label>
        <input type="text" name="nama_buku" class="form-control" id="exampleFormControlInput1" value="{{$data->nama_buku}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Penerbit</label>
        <input type="text" name="penerbit" class="form-control" id="exampleFormControlInput1" value="{{$data->penerbit}}">
    </div>
    <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jenis Buku</label>
            <select class="form-control" name="jbook_id" id="subCategory" required>
                <option value=""> Pilih </option>
                @foreach($check as $dbook)
                    <option value="{{ $dbook->id}}"> {{ $dbook->jenis_buku}}</option>
                @endforeach
            </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tahun Terbit </label>
        <input   type="date" name="thn_terbit" class="form-control" id="exampleFormControlInput1" value="{{$data->thn_terbit}}">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">File</label>
        <input class="form-control" type="file" name ="path" id="formFile">
    </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="/index" class="btn btn-primary ">Back</a>
        </div>
    </form>
</div>
@endsection