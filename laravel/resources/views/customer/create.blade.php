@extends('layouts.app')

@section('content')
<div id="page-wrapper">
<form class="form-horizontal" method="POST" action="customer_add">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<fieldset>
    <div class="form-group">
        <label for="f_name">Name *</label>
          <input type="text" name="name" value="" placeholder="Name" class="form-control" required="required" id = "name" >
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
    </div> 

    <div class="form-group">
        <label for="address">Address</label>
          <input name="address" value="" placeholder="Address" class="form-control" type="text" id="address">
           @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
    </div> 

      
    <div class="form-group">
        <label for="email">Email</label>
            <input  type="email" name="email" value="" placeholder="E-Mail Address" class="form-control" id="email">
             @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
            <input name="phone" value="" placeholder="987654321" class="form-control"  type="text" id="phone">
             @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
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
