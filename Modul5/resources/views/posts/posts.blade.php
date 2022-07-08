@extends('layouts.admin.master')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <a href="{{ url('posts/add') }}" class="btn btn-success mb-2">Add Posts</a>
        </div>
        <div class="col-lg-12">
            <div class="shoping-cart-inner">
                    <table class="table">
                        <thead>
                            <th class="">X</th>
                            <th class="">Img</th>
                            <th class="">Judul</th>
                            <th class="">tampil</th>
                            <th class="">body</th>
                            <th class="" colspan="2">Action</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $post)
                            <tr>
                                <td class="e">{{ $i++ }}</td>
                                <td class=""><img src="{{ $post->img }}" class="img-thumbnail" alt=""></td>
                                <td class="">{{ $post->nama }}</td>
                                <td class="">{{ $post->tampil }}</td>
                                <td class="">{{ $post->body }}</td>
                                <td class="">
                                    <a class="btn btn-warning" href="{{ url('posts/edit/'.$post->id) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ url('posts/delete/'.$post->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                    {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
@endsection