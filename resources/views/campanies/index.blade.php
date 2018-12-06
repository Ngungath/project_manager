@extends("layouts.app")
@section("content")
<div class="col-md-6 col-md-offset-4 col-lg-offset-3">
<div class="panel panel-primary">
  <div class="panel-heading">
  	<div class="row">
  		<div class="col-md-6">
  			<h3 class="panel-title">My Companies</h3>
  		</div>
  		<div class="col-md-6 ">
  		  <a class="btn btn-primary btn-sm pull-right" href="/companies/create"><b>Add new company</b></a> 	
  		</div>
  	</div>
  </div>
  <div class="panel-body">
  <div class="list-group">
  @foreach($companies as $company)
  <a href="/companies/{{$company->id}}" class="list-group-item">{{$company->name}}</a>
  @endforeach

</div>
  </div>
</div>
</div>
@endsection