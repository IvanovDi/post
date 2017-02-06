@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 style="color : red;">Posts</h1>
            <div class="bg-info">

                <div class="panel panel-info">
                    <div class="panel-body">
                        <h2>{!! $data['name'] !!}</h2>
                    </div>
                    <div class="panel_body">
                        <img src="{{'../images/' . $data['media']}}" height="250" width="550" alt="music">
                    </div>
                    <div class="panel-footer">
                        <p>{!! $data['description'] !!}</p>
                    </div>
                </div>
            @if(!empty($data['comments']))
                @foreach($data['comments'] as $comment)
                    <p class="text-primary text-capitalize bg-info  ">{!! $comment['content'] !!}</p>
                @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection