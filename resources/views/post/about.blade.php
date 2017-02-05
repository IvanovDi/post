@extends('layouts.app')


@section('content')


    <div class="container">
        <h1 class="title">О Нас</h1>
        <p class="description">Наш коллектив был основан в 2004 году ... </p>

    </div>


    <style>
        body {
            background: url("/images/bg1.jpg");
            background-size: cover;
        }
        .title, .description{
            color: #fff;
        }
        .title {
            font-size: 4em;
        }
        .description {
            font-size: 2em;
        }


    </style>
@endsection