@extends('layouts.app')

@section('content')
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-6">
            <h1 class="page-header">Admin Users</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
            <a href="user_add"> <button class="btn btn-success">Add new</button></a>
            </div>
        </div>
</div>
   
    <!--    Begin filter section-->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="user" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label for="input_search" >Search</label>
            <input type="text" class="form-control" id="input_search"  name="search_string" value="{{ old('search_string') }}">
            <input type="submit" value="Go" class="btn btn-primary">

        </form>
    </div>
    <!--   Filter section end-->
    <hr>
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th class="header">#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($users as $key => $value)
            
            <tr>
                <td>{{$users[$key]->id}}</td>
                <td>{{$users[$key]->name}}</td>
                <td>{{$users[$key]->email}}</td>

                <td>
                    <a href="user_edit/{{$users[$key]->id}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>

                    <a href=""  class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-{{$users[$key]->id}}" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span>
                    
                </td>
            </tr>
                <!-- Delete Confirmation Modal-->
                     <div class="modal fade" id="confirm-delete-{{$users[$key]->id}}" role="dialog">
                        <div class="modal-dialog">
                         <form class="form-horizontal" method="POST" action="{{ route('user.destroy', ['id' => $users[$key]->id]) }}">
                            {{ csrf_field() }}
   							 {{ method_field('DELETE') }}
                          <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Confirm</h4>
                                </div>
                                <div class="modal-body">
                                   
                                    <p>Are you sure you want to delete this user?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default pull-left">Yes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                              </div>
                          </form>
                          
                        </div>
                    </div>
           @endforeach
        </tbody>
    </table>
    <!--    Pagination links-->
    
</div>


@endsection
