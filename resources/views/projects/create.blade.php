@extends("layouts.app")
@section("content")
<div class="container">
	<div class="row">
	<div class="col-md-9 col-sm-9 col-lg-9">
	<form method="post" action="{{route('projects.store')}}">
		{{csrf_field()}}
		<div class="form-group">
			<label class="control-label">Project Name</label>
			<input type="text" name="pname" class="form-control" placeholder="Enter Project Name">	
		</div>
		<div class="form-group">
			<label class="control-label">Project Description</label>
			<textarea class="form-control" name="description" placeholder="Enter Project Description" rows="5"></textarea>
		</div>
		@if($companies != null)
		<div class="form-group">
			<label class="control-label">Select Company</label>
			<select name="company_id" class="form-control">
				@foreach($companies as $company)
				<option value="{{$company->id}}">{{$company->name}}</option>
				@endforeach
			</select>
		</div>
		@endif
		<div class="form-group">
			<label class="control-label">Project Time</label>
			<input type="number" name="days" class="form-control" placeholder="Enter Project days">	
		</div>
		@if($companies==null)
		<input type="hidden" name="company_id" value="{{$company_id}}">
		@endif
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
	</form>
	</div>
	<div class="col-md-3 col-sm-3 col-lg-3">
		<center><h3>Actions</h3></center>
		<hr>
	</div>
	</div>
</div>
@endsection