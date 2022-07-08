@extends('layouts.admin.master')

@section('body')
<div class="container">
    <div class="card-body">
        <table class="table table-responsive-md mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Category</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->category_id }}</td>
                <td>{{ $item->body }}</td>
                <td>
                    <a href="{{ url('posts/edit'.$item->id) }}"><button class="btn btn-warning">Edit</button></a>
                    <a href="{{ url('posts/delete'.$item->id) }}"><button class="btn btn-danger">Delete</button></a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection