@extends('layouts.admin.master')

@section('body')
<div class="container mb-2">
    <form action="{{ url('posts/add') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Judul</label>
            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="posts" placeholder="Input Judul">
        </div>
        
        <div class="mb-3">
            <label for="img" class="form-label">img</label>
            <input type="text" class="form-control" name="img" id="img" aria-describedby="posts" placeholder="Input img">
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control" aria-label="Default select example">
                <option >Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tampil" class="form-label">Tampil</label>
            <textarea type="text" class="form-control" name="tampil" id="tampil" aria-describedby="posts" placeholder="tampil"></textarea>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">body</label>
            <textarea type="text" class="form-control" name="body" id="body" aria-describedby="posts" placeholder="Body"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection