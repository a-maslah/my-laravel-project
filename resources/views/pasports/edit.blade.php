@extends('layouts.app')
@section('content')
    

<form class="form-style-9" action="{{route('pasports.update',['pasport'=>$item->id])}}" method="POST">
   
        @include('pasports.shared_form')
        {{ csrf_field() }}
        <input type="hidden" name="_method"  value="PUT">
        </form>
@endsection
