@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('create_post')}}">
            <input type="submit" value="Add New Post">
        </form>
        <div class="row">
                <h1 style="color : red;">News</h1>
                @foreach($data as $item)
            @foreach($item['posts'] as $post)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail grey_bg">
                            <img  src="{{ '../images/' . $post['media']}}" alt="music">
                            <div class="caption">
                                <h3>{!! $post['name'] !!}</h3>
                                <p>{!! $post['description'] !!}</p>
                                <p><a href="{!! route('post', $post) !!}" class="btn btn-primary" role="button">Full Post</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@stop