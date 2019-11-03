@extends('layouts.app')
@section('content')
    

<form class="form-style-9" action="{{route('pasports.store')}}" method="POST">
  {{ csrf_field() }}
   @include('pasports.shared_form')
   
        </form>
@endsection
