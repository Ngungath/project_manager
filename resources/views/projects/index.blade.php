@extends("layouts.app")
@section("content")
<div class="col-md-6 col-md-offset-4 col-lg-offset-3">
<div class="panel panel-primary">
  <div class="panel-heading">
  	<div class="row">
  		<div class="col-md-6">
  			<h3 class="panel-title">My Projects</h3>
  		</div>
  		<div class="col-md-6 ">
  		  <a class="btn btn-primary btn-sm pull-right" href="/projects/create"><b>Create New</b></a> 	
  		</div>
  	</div>
  </div>
  <div class="panel-body">
  <div class="list-group">
  @foreach($projects as $project)
  <a href="/projects/{{$project->id}}" class="list-group-item">{{$project->name}}</a>
  @endforeach

</div>
  </div>
</div>
</div>
@endsection