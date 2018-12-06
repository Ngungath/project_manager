@extends("layouts.app")
@section("content")
<div class="container">
	<p class="text-danger">{{$company->id}}</p>
<div class="row">
  <div class="col-md-9 col-sm-9 col-lg-9 pull-left">
<form method="post" action="{{route('projects.update',$project->id)}}">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="put">
	<div class="form-group">
		<label class="control-label" for="project name">Project Name</label>
		<input type="text" name="pname" id="pname" class="form-control" placeholder="Enter Project Name" value="{{$project->name}}">
	</div>
	<div class="form-group">
		<label class="control-label" for="project name">Project Description</label>
		<textarea class="form-control" name="description" id="pdescription" rows="5">
			{{$project->description}}
		</textarea>
	</div>
    <div class="form-group">
    <label class="control-label" for="project name">Project Number</label>
    <input type="number" name="days" id="days" class="form-control" placeholder="" value="{{$project->days}}">
  </div>
  <input type="hidden" name="company_id" value="{{$company->id}}">
    <div class="form-group">
    <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">
  </div>
</form>
</div>
	<div class="col-sm-3 col-md-3 col-lg-3  blog-sidebar pull-right">
        <!--   <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
           <div class="sidebar-module">
           <center><h4>Manage Project</h4>
            <hr>
            <ol class="list-unstyled">
              <li><a href="/projects/{{$project->id}}/edit">Edit</a></li>
              <li><a href="#" onclick="
               var alet = confirm('Are you sure you want to delete this project');
               if (alet) {

               }
               
              " class="text-danger">Delete</a></li>
              <li><a href="#">Update</a></li>
            </ol>
            </center> 
          </div>
        </div>

</div>
</div>
@endsection