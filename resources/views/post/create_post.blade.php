@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 style="color : red;">Create new Post</h1>
            <form action="{{route('store')}}" method="post">
                {{csrf_field()}}
                <label for="name">Title Post</label><br>
                @if (isset($errors->toArray()['name']))//todo
                    <div class="alert alert-danger" style="margin-top: 50px;">
                        {!! $errors->toArray()['name'] !!}
                    </div>
                @endif
                <input type="text" id="name" name="name"><br>
                @if (!empty($errors->toArray()['description']))
                    <div class="alert alert-danger" style="margin-top: 50px;">
                        {!! $errors->toArray()['description'] !!}
                    </div>
                @endif
                <label for="description">Description</label><br>
                <textarea name="description" id="description" cols="30" rows="10"></textarea><br>
                <input type="submit" value="add post">
            </form>
        </div>
    </div>

@endsection