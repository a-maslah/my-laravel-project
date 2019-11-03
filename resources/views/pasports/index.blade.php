
 @extends('layouts.app')
@section('content')
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
@include('partial.message')
<body>
*    <div class="container">
      <div class="form-group">
         <h2 align="center">list des pasports</h2>
        <img src="http://localhost:8000/image/logo.png" align="center" style="width: 142px;margin-left:691px;margin-top:-76px;" alt="logo"/>
    
      </div>
           <div class="form-group">
      
          <form action="{{url('send_all')}}" method="post">
          {{ csrf_field() }}
        <a href="{{route('pasports.create')}}" class="btn btn-info">ajouter nouveau pasport</a>
        <input type="submit" value="send tous" class="btn btn-success">
          </form>
          <div align="right">
              <form action="{{url('rec')}}">
<input type="submit" value="recouver" class="btn btn-info">

</form>
          </div>

              </div>
              
        <div class="form-group">
        </div>
      <form action="{{url('search')}}" method="post">
        {{ csrf_field() }}
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">CIN</span>
            <input type="text" class="form-control" placeholder="Search..." aria-describedby="basic-addon1" name="search">
          </div>
        </form>
        
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prenom</th>
              <th>CIN</th>
              <th>Email</th>
              <th>NUP</th>
              <th>operations</th>
              
            </tr>
          </thead>
          <tbody>
              @forelse($pasports as $item)
            <tr>
              <td> {{$item->nom}}</td>
              <td>{{$item->prenom}}</td>
              <td>{{$item->CIN}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->NUP}}</td>
              <td>
              <form action="{{route('pasports.destroy',['pasports'=>$item->id])}}" method="POST">
                {{ csrf_field()}};
                {{method_field('DELETE')}};
                 <input type="submit" value="delete" class="btn btn-danger">
                <a href="{{route('pasports.edit',['pasports'=>$item->id])}}" class="btn btn-info">edit</a>
              <a href="{{url('send/'.$item->id)}}" class="btn btn-success">envoyé</a>
              </form>
              </td>
             @empty
                 <h1>No information</h1> 
           
                @endforelse

             
            </tr>
          </tbody>
        </table>
      <h2>Administrateur : </h2>

      </div>
    

</body>
</html>
    @endsection





