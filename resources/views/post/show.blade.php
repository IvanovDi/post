@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 style="color : red;">This is page of Posts</h1>
                {{--{!! dd($data) !!}--}}
                    @foreach($data as $item)
                        @foreach($item['posts'] as $post)
                            <div  class="list-group">
                                <h2 class="color_white list-group-item active list-group-item-heading">{!! $post['name'] !!}</h2>
                                <p class="white_c list-group-item-text"><a href="{!! route('post', $post) !!}">{!! $post['description'] !!}</a></p>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            <div class="col-md-2">
                <form action="{{route('create_post')}}">
                    <input type="submit" value="Add New Post">
                </form>
            </div>
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