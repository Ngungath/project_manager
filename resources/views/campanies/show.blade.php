@extends("layouts.app")
@section("content")
<div class="container">
<div class="row">
  <div class="col-md-9 col-sm-9 col-lg-9 pull-left">
      <!-- Jumbotron -->
      <div class="well well-lg">
        <h1>{{$company->name}}</h1>
        <p class="lead">{{$company->description}}</p>
        <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>-->
      </div>

      <!-- Example row of columns -->
      <div class="row">
                <div class="col-md-12">
         <a href="/projects/create/{{$company->id}}" class="btn btn-info pull-right">Add Project</a> 
        </div>
      @foreach($company->projects as $project)
        <div class="col-lg-4">
          <h2>{{$project->name}}</h2>
          <p class="text-danger">As of v9.1.2, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View details &raquo;</a></p>
        </div>
        @endforeach
      
      </div>
      </div>
       
      <div class="col-sm-3 col-md-3 col-lg-3  blog-sidebar pull-right">
        <!--   <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <h4>Manage Company</h4>
            <hr>
            <ol class="list-unstyled">
            <li><a href="/companies/{{$company->id}}/edit" class="text-danger">Edit</a></li>
            <li><a href="/companies/create">Add new company</a></li>
            <li><a href="/projects/create/{{$company->id}}">New Project</a></li>
              <li>
              <a href="#" onclick="
              var result = confirm('Are you sure you want to delete this comapny ?');
              if(result){
                event.preventDefault();
                document.getElementById('delete_form').submit();
              }
              ">Delete</a>
              <form style="display:none" id="delete_form" method="post" action="{{route('companies.destroy',[$company->id])}}">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="delete">    
              </form>
              </li>
              
              <li><a href="#">Add a new member</a></li>
            </ol>
          </div>
        </div>
      </div> <!-- End Row -->
    </div> <!-- /container -->
    @endsection

