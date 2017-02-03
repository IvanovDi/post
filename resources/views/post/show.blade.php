@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('create_post')}}">
            <input type="submit" value="Add New Post">
        </form>
        <div class="row">
                <h1 style="color : red;">This is page of Posts</h1>
                {{--{!! dd($data) !!}--}}
                @foreach($data as $item)
                    @foreach($item['posts'] as $post)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="images/m1.jpg" alt="music">
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
    <style>
        body {
            background: url("/images/bg1.jpg");
            background-size: cover;
        }
        .color_white {
            background: darkgrey !important;
            color: #000 !important;
        }

        a {
            color: #fff !important;
            font-size: 25px;
        }

    </style>



@stop