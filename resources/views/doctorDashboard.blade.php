@extends('layouts.app')

@section('content')
<div class="container">
         <div class="row">
            <div class="col-md-10 col-md-offset-1">

            
                 <table class="table table-hover table-responsive" id="tblAppointments">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Hour</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
	                        @foreach ($appointments as $appointment)
	                            <tr>
	                                <td>{{ $appointment->user->name }}</td>
	                                
	                                <td>
	                                    @foreach($doctors as $doctor)
	                                        @if(isset($doctor->id))

	                                            @if($doctor->id == $appointment->doctor_id)
	                                                {{ $doctor->name }}
	                                            @endif

	                                        @endif
	                                    @endforeach
	                                </td>

	                                <td>{{ $appointment->hour }} </td>

	                                <td>
									
										<form action="{{ url('doctor/appointment/update/'.$appointment->id) }}" method="POST" id="changeStatusForm{{ $appointment->id }}" onchange="changeStatus({{ $appointment->id }})" class="form-horizontal">
	            
									            {{ method_field('PUT') }}
									            {!! csrf_field() !!}
												
			                                   <select name="status" id="selectStatus" class="form-control">
			                                   		<option selected="true" value="{{ $appointment->status }}">{{ $appointment->status }}</option>
			                                   		@if($appointment->status == "Pending")
			                                   			<option value="Approved">Approved</option>
				                                   		<option value="Not Approved">Not Approved</option>
			                                   		@elseif($appointment->status == "Approved")
				                                   		<option value="Not Approved">Not Approved</option>
				                                   		<option value="Pending">Pending</option>
			                                   		@elseif($appointment->status == "Not Approved")
			                                   			<option value="Approved">Approved</option>
														<option value="Pending">Pending</option>
													@elseif($appointment->status != "Pending" && $appointment->status != "Not Approved" && $appointment->status != "Approved")
														<option value="Approved">Approved</option>
			                                   			<option value="Not Approved">Not Approved</option>
														<option value="Pending">Pending</option>
													@endif
			                                   </select>
		                                 </form>

		                                 <p id="showStatus"></p>

	                                </td>
	                            </tr>
	                        @endforeach
                    </tbody>
                </table>


            </div> 
        </div>
    </div>
@endsection
