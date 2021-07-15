@extends('layouts.app')
@section('title','Index')
@section('content')
<div class="container">
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="/index" class="btn btn-info">List Buku</a>
        <a href="#" class="btn btn-warning">Jenis Buku</a>
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
            @forelse($datas as $data)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->nama_buku}}</td>
                    <td>{{$data->penerbit}}</td>
                    <td>{{$data->jenis_buku}}</td>
                    <td>{{$data->thn_terbit}}</td>
                    <td><a href="{{$data->path}}">Document</a></td>
                    <td>
                    <a href="{{route('edit',[$data->id])}}" type="submit" class="btn btn-primary">Edit</a>
                    <a href="{{route('delete',[$data->id])}}" type="button" class="btn btn-danger" onclick= "return confirm('Apakah anda ingin menghapus item.?');">Delate</a>
                    </td>
                </tr>
                @empty
	    				<p> Data Not Found </p>
	    				
            @endforelse
        </tbody>
    </table>
    {{$datas->links()}}
    
@endsection
</div>
