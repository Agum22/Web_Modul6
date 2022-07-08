@extends('layouts.master')
@section('body')
<div class="container mb-2">
<form action="{{ url('posts/add') }}" method="post">
@csrf
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Input name">
</div>
<div class="mb-3">
    <label for="img" class="form-label">Url Image</label>
    <input type="text" class="form-control" name="img" id="img" placeholder="Input Url Image">
</div>
<button type="submit" class="btn btn-primary">submit</button>
</form>
</div>
@endsection