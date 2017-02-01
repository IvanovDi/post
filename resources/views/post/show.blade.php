@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 style="color : red;">This is page of Posts</h1>
                {{--{!! dd($data) !!}--}}
                <div class="bg-info">
                    @foreach($data as $item)
                        @foreach($item['posts'] as $post)
                            <h2 class="text-primary text-capitalize bg-info  ">{!! $post['name'] !!}</h2>
                            <p class="bg-info"><a href="{!! route('post', $post) !!}">{!! $post['description'] !!}</a></p>
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

@stop