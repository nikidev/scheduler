@extends('layouts.app')

@section('content')

 <form action="{{ url('user/update/'. $user->id) }}" method="POST" class="form-horizontal">

            {{ method_field('PUT') }}
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-sm-3 control-label">Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" value="<?php echo (isset($user->name) ? $user->name :  ''); ?>" id="name"  class="form-control">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

                </div>
            </div>

             <div class="form-group">
                <label for="role" class="col-sm-3 control-label">Switch admin role:</label>
                <div class="col-sm-6">
                    @if(in_array($user->isAdmin, $selectedRole))
                      <input type="checkbox" name="isAdmin"  value="{{ $user->isAdmin }}" checked>
                    @else
                        <input type="checkbox" name="isAdmin"  value="{{ Auth::user()->isAdmin }}">
                    @endif
                </div>
            </div>


            <div class="form-group">
                <label for="role" class="col-sm-3 control-label">Switch doctor role:</label>
                <div class="col-sm-6">
                    @if(in_array($user->isDoctor, $selectedRole))
                      <input type="checkbox" name="isDoctor"  value="{{ $user->isDoctor }}" checked>
                    @else
                        <input type="checkbox" name="isDoctor"  value="{{ Auth::user()->isDoctor }}">
                    @endif
                </div>
            </div>

           
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-edit"></i> Edit User
                    </button>

                    <a href="{{ url('/users') }}" class="btn btn-danger"><span class="fa fa-chevron-right"></span>Back
                     </a>
                </div>
            </div>

            
        </form>

@endsection()