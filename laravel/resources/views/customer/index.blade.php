@extends('layouts.app')

@section('content')
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-6">
            <h1 class="page-header">Customers</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
            <a href="customer_add"> <button class="btn btn-success">Add new</button></a>
            </div>
        </div>
</div>
 <?php //include('./includes/flash_messages.php') ?>

    <?php
    if (isset($del_stat) && $del_stat == 1) {
        echo '<div class="alert alert-info">Successfully deleted</div>';
    }
    ?>
    
    <!--    Begin filter section-->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="customer" method="post">
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
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($customer as $key => $value)
            
            <tr>
                <td>{{$customer[$key]->id}}</td>
                <td>{{$customer[$key]->name}}</td>
                <td>{{$customer[$key]->email}}</td>
				<td>{{$customer[$key]->phone}}</td>

                <td>
                    <a href="/customer_edit/{{$customer[$key]->id}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>

                    <a href=""  class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-{{$customer[$key]->id}}" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span>
                    
                </td>
            </tr>
                <!-- Delete Confirmation Modal-->
                     <div class="modal fade" id="confirm-delete-{{$customer[$key]->id}}" role="dialog">
                        <div class="modal-dialog">
                         <form class="form-horizontal" method="POST" action="{{ route('customer.destroy', ['id' => $customer[$key]->id]) }}">
                            {{ csrf_field() }}
   							 {{ method_field('DELETE') }}
                          <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Confirm</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this customer?</p>
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
