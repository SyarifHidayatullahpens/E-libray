@extends('layouts.app')
@section('title','Index')
@section('content')
<div class="container">
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{route('create')}}" class="btn btn-success">Tambah Buku</a>
    </div><br><br>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <td scope="col">No</td>
                <td scope="col">Nama Buku</td>
                <td scope="col">Penerbit</td>
                <td scope="col">Jenis Buku</td>
                <td scope="col">Tahun Terbit</td>
                <td scope="col">File</td>
                <td scope="col">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->nama_buku}}</td>
                    <td>{{$data->penerbit}}</td>
                    <td>{{$data->jenis_buku}}</td>
                    <td>{{$data->thn_terbit}}</td>
                    <td>{{$data->path}}</td>
                    <td>
                    <a href="{{route('edit',[$data->id])}}" type="submit" class="btn btn-primary">Edit</a>
                    <a href="{{route('delete',[$data->id])}}" type="button" class="btn btn-danger" onclick= "return confirm('Apakah anda ingin menghapus item.?');">Delate</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$datas->links()}}
    
@endsection
</div>
