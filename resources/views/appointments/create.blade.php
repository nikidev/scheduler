@extends('layouts.app')


@section('content')

	 <form action="{{ url('appointment/store') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}


             <div class="form-group">
                <label for="doctor" class="col-sm-5 control-label">Select a doctor: </label>

                <div class="col-sm-2">
                    <select name="doctor" class="form-control">
                        
                        @foreach($users as $user)
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


             <div class="form-group{{ $errors->has('hour') ? ' has-error' : '' }}">
                <label for="hour" class="col-sm-5 control-label">Hour:</label>

                <div class="col-sm-2">
                    <input type="text" name="hour" id="hour" class="form-control" value="{{ old('hour') }}">
                    @if ($errors->has('hour'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hour') }}</strong>
                            </span>
                    @endif
                </div>
            </div>


            <div class="form-group">
                <label for="status" class="col-sm-5 control-label">Status:</label>

                <div class="col-sm-2">
                    <select  class="form-control" disabled>
                        <option>Pending</option>
                    </select>
                </div>
            </div>


                          
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-4">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Appointment
                    </button>

                     <a href="{{ url('/appointments') }}" class="btn btn-danger">
                        <span class="fa fa-chevron-right"></span>Back
                     </a>
                </div>
            </div>

        </form>

@endsection