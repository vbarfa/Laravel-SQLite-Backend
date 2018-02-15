@extends('layouts.app')

@section('content')
<div id="page-wrapper">
<form class="form-horizontal" method="POST" action="/user_edit">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<!--<input type="hidden" name="id" value="{{ $user['userDB']->id}}">-->
<fieldset>
    <div class="form-group">
        <label for="f_name">Name *</label>
          <input type="text" name="name" value="{{ $user['userDB']->name }}" placeholder="Name" class="form-control" required="required" id = "name" >
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
    </div> 

       
    <div class="form-group">
        <label for="email">Email</label>
            <input  type="email" name="email" value="{{ $user['userDB']->email }}" placeholder="E-Mail Address" class="form-control" id="email">
             @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
    </div>

    <div class="form-group">
        <label for="phone">Password</label>
            <input name="password" value="{{ $user['userDB']->password }}"  class="form-control"  type="text" id="password">
             @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
    </div> 

  

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>    
</div>
</form>

@endsection
