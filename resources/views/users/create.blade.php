@extends('layouts.app')


@section('content')

	 <form action="{{ url('user/store') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-sm-3 control-label">Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-sm-3 control-label">Email</label>

                <div class="col-sm-6">
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                     @endif
                </div>
            </div>

            
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-sm-3 control-label">Password</label>

                <div class="col-sm-6">
                    <input type="password" name="password" id="password" class="form-control">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group">
                    <label for="group" class="col-sm-3 control-label">Choose admin role to be:</label>

                    <div class="col-sm-6">
                        <input type="checkbox" name="isAdmin"  value="{{ Auth::user()->isAdmin }}">
                    </div>
            </div>

            <div class="form-group">
                    <label for="group" class="col-sm-3 control-label">Choose doctor role to be:</label>

                    <div class="col-sm-6">
                        <input type="checkbox" name="isDoctor"  value="{{ Auth::user()->isDoctor }}">
                    </div>
            </div>
           
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add User
                    </button>

                     <a href="{{ url('/users') }}" class="btn btn-danger"><span class="fa fa-chevron-right"></span>Back
                     </a>
                </div>
            </div>

        </form>

@endsection()