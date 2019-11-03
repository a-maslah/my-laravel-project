
    <link rel="stylesheet" href="{{asset('asset/css/CreateForm.css')}}">

   
    <div class="container contact">
        <div class="row">
            <div class="col-md-3">
                <div class="contact-info">
                    <img src="http://localhost:8000/image/pass.png" style="width:250px" alt="image"/>
                    <h2>Update pasport</h2>
                    <h4>We would love to hear from you !</h4>
                </div>
            </div>
            <div class="col-md-9">
                <div class="contact-form">
                    <div class="form-group @if($errors->get('nom')) has-error @endif">
                      <label class="control-label col-sm-2" for="fname">Nom:</label>
                   <div class="col-sm-10">           
                   <input type="text" name="nom" class="form-control" id="fname" placeholder="Enter First Name" name="fname" value="{{old('nom',$item->nom ?? null)}}">
                     @if ($errors->get('nom'))
                     @foreach ($errors->get('nom') as $message)
                    <li style="color:red">{{$message}}</li>
                    @endforeach   
                    @endif
                   </div>
                   
                    </div>
                    <div class="form-group @if($errors->get('prenom')) has-error @endif">
                      <label class="control-label col-sm-2" for="lname">Prenom:</label>
                      <div class="col-sm-10">          
                        <input type="text" name="prenom" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" value="{{old('prenom',$item->prenom ?? null)}}">
                        @if ($errors->get('prenom'))
                        @foreach ($errors->get('prenom') as $message)
                       <li style="color:red">{{$message}}</li>
                       @endforeach   
                       @endif
                      </div>
                    </div>
                    <div class="form-group @if($errors->get('email')) has-error @endif">
                      <label class="control-label col-sm-2" for="email">Email:</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('email',$item->email ?? null)}}">
                        @if ($errors->get('email'))
                        @foreach ($errors->get('email') as $message)
                       <li style="color:red">{{$message}}</li>
                       @endforeach   
                       @endif
                      </div>
                    </div>
                    <div class="form-group @if($errors->get('CIN')) has-error @endif">
                        <label class="control-label col-sm-2" for="email">CIN:</label>
                        <div class="col-sm-10">
                          <input type="text" name="CIN" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('CIN',$item->CIN ?? null)}}">
                          @if ($errors->get('CIN'))
                          @foreach ($errors->get('CIN') as $message)
                         <li style="color:red">{{$message}}</li>
                         @endforeach   
                         @endif
                        </div>
                      </div>
                      <div class="form-group @if($errors->get('NUP')) has-error @endif">
                        <label class="control-label col-sm-2" for="email">NUP:</label>
                        <div class="col-sm-10">
                          <input type="text" name="NUP" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('NUP',$item->NUP ?? null)}}">
                          @if ($errors->get('NUP'))
                          @foreach ($errors->get('NUP') as $message)
                         <li style="color:red">{{$message}}</li>
                         @endforeach   
                         @endif
                        </div>
                      </div>
                    <div class="form-group">        
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">save</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   



