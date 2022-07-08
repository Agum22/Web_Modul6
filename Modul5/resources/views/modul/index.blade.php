@extends('layouts.modul.template')

@section('body')
<div class="container">
    <div class="row">

        @foreach ($posts as $item)
            
            <div class="col-3 mb-2">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $item->img }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama }}</h5>
                        <a href="{{ url('modul/category/'.$item->category_id) }}"><h6>{{ $item->category_id }}</h6></a>
                        <p class="card-text">{{ $item->tampil }}</p>
                        <a href="{{ url('modul/post/'.$item->id) }}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
</div>
@endsection