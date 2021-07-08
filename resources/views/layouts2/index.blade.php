@extends('layouts.app')
@section('title','Index')
@section('content')
<div class="container">
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="/index" class="btn btn-primary">List Buku</a>
        <button type="button" class="btn btn-warning">Jenis Buku</button>
        <a href="{{route('create')}}" class="btn btn-success">Tambah Jenis Buku</a>
    </div><br><br>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <td scope="col">No</td>
                <td scope="col">Jenis Buku</td>
                <td scope="col">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($typebook as $listbook)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$listbook->jenis_buku}}</td>
                    <td>
                    <a href="{{route('edit',[$listbook->id])}}" type="submit" class="btn btn-primary">Edit</a>
                    <a href="{{route('delete',[$listbook->id])}}" type="button" class="btn btn-danger">Delate</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$typebook->links()}}
    
@endsection
</div>
