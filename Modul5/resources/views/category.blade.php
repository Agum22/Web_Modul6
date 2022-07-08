@extends('layouts.admin.master')

@section('body')
<div class="container">
    <div class="card-body">
        <table class="table table-responsive-md mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Category</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection