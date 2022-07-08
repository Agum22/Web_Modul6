@extends('layouts.master')

@section('body')
<div>
    <form action="{{ url('posts/edit') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Input name" value="{{ $data->name }}">
    </div>
    <div class="mb-3">
        <label for="img" class="form-label">Url Img</label>
        <input type="text" class="form-control" name="img" id="img" placeholder="Input Url img" value="{{ $data->img }}">
    </div>
    <button type="submit" class="btn btn-primary">submit</button>
    </form>
</div>
@endsection