@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 style="color : red;">Posts</h1>
            <div class="bg-info">
                <h2>{!! $data['name'] !!}</h2>
                <p>{!! $data['description'] !!}</p>
                @if(!empty($data['comments']))
                @foreach($data['comments'] as $comment)
                    <p class="text-primary text-capitalize bg-info  ">{!! $comment['content'] !!}</p>
                @endforeach
                @endif
            </div>
        </div>
    </div>

    <style>
        body {
            background: url("/images/bg1.jpg");
            background-size: cover;
        }
    </style>
@endsection