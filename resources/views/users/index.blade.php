@extends('layouts.app')

@section('content')
	<div class="container">
 		 <div class="row">
			<div class="col-md-10 col-md-offset-1">

			<a href="{{ url('user/create') }}" class="btn btn-primary btn-add-phone"><span class="glyphicon glyphicon-plus"></span>Add new user
                </a>

				 <table class="table table-hover table-responsive" id="tblUsers">
	                <thead>
	                    <tr>
	                        <th>Name</th>
	                        <th>Administrator</th>
	                        <th>Doctor</th>
	                        <th>Actions</th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>
	                        @foreach ($users as $user)
	                            <tr>
	                                <td>{{ $user->name }}</td>
	                                
	                                <td>
	                                	@if(in_array($user->isAdmin, $selectedRole))
                     					 <input type="checkbox" disabled="disabled" name="isAdmin"  value="{{ $user->isAdmin }}" checked>
                    					@else
                       					 <input type="checkbox" disabled="disabled" name="isAdmin"  value="{{ Auth::user()->isAdmin }}">
                   						@endif
	                                </td>

	                                <td>
	                                	@if(in_array($user->isDoctor, $selectedRole))
                     					 <input type="checkbox" disabled="disabled" name="isDoctor"  value="{{ $user->isDoctor }}" checked>
                    					@else
                       					 <input type="checkbox" disabled="disabled" name="isDoctor"  value="{{ Auth::user()->isDoctor }}">
                   						@endif
	                                </td>

	                                <td>
	                                    <a href="{{ url('user/edit/'. $user->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Edit
	                                    </a>
	                                </td>
	                                <td>
	                                    <a class="btn btn-danger delete-button" data-toggle="modal" data-target="#myModal" data-action="{{ url('user/delete/'. $user->id) }}"><span class="fa fa-trash-o"></span>Delete</a>
	                                </td>
	                            </tr>
	                        @endforeach
	                </tbody>
	            </table>
			</div> 
		</div>
	</div>


	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete User</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete the selected user ?</p>
      </div>
      <div class="modal-footer">
          <form method="get" id="delete-form">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary btn-conf">Confirm delete</button>
          </form>
        
      </div>
    </div>
  </div>
</div>


@endsection