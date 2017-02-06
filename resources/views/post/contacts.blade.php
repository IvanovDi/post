@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class=" col-md-offset-1 col-md-4">
                <h2>Наши Контакты</h2>
            </div>
            <div class="col-md-4">
                <h2>тел - 099 076 14 36</h2>
            </div>
            <div class="col-md-2">
                <h2>Оля</h2>
            </div>
        </div>
         <div class="form_contacts" class="form-group">
             <form action="{{route('mail')}}" method="get">
                 <div class="row">
                     <div class="col-md-5">
                         <label for="name">Имя</label>
                         <input type="text" class="form-control" name="name" id="name">
                         <label for="email">Email</label>
                         <input type="email" class="form-control" name="email" id="email">
                     </div>
                     <div class="col-md-6">
                         <label for="message">Сообщение</label>
                         <textarea class="form-control"  name="message" id="message" cols="30" rows="10"></textarea>
                         <input type="submit" class="btn btn-primary" value="Отправить Сообщение">
                     </div>
                </div>
             </form>
         </div>
    </div>
@endsection