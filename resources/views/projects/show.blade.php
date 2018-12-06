@extends("layouts.app")
@section("content")
<div class="container">
<div class="row">
  <div class="col-md-9 col-sm-9 col-lg-9 pull-left">
      <!-- Jumbotron -->
      <div class="well well-lg">
        <h1>{{$project->name}}</h1>
        <p class="lead">{{$project->description}}</p>
        <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>-->
      </div>

      <!-- Example row of columns -->
      <div class="row">
                <div class="col-md-12">
         <a href="/projects/create" class="btn btn-info pull-right">Add Project</a> 
        </div>

      
      </div>
      <br>
      <div style="background-color: white;" class="container-fluid">
        
       <br>
      @include("partials.comments")
      <br>
      <form method="post" action="{{route('comments.store')}}">
    {{csrf_field()}}
    <div class="form-group">
      <label class="control-label">Comment Body</label>
      <textarea class="form-control" name="body" placeholder="Comment" rows="3"></textarea>
    </div>
        <div class="form-group">
      <label class="control-label">Proof of work done</label>
        <textarea class="form-control" name="url" placeholder="Enter Proof of work done" rows="2"></textarea>
    </div>
    <input type="hidden" name="commentable_id" value="{{$project->id}}">
    <input type="hidden" name="commentable_type" value="Danny\Project">
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </div>
  </form>
      </div>
      

      </div>

      <div class="col-sm-3 col-md-3 col-lg-3  blog-sidebar pull-right">
          <div class="sidebar-module">
            <h4>Manage Project</h4>
            <hr>
            <ol class="list-unstyled">
              <li><a href="/projects/{{$project->id}}/edit">Edit Project</a></li>
              @if($project->user_id == Auth::user()->id)
              <li><a href="#" class="text-danger" onclick="
               var alet = confirm('Are you sure you want to Delete the project ?');
               if (alet) {
                event.preventDefault();
                document.getElementById('delete_form').submit();

               }

              ">Delete Project</a>
              <form method="post" id="delete_form" action="{{route('projects.destroy',[$project->id])}}" style="display: none;">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="delete">
              </form>
            </li>
            @endif
              <li><a href="#">My Projects</a></li>
            </ol>
            <br>
            <hr>
            <h4>Add Member</h4>
            <div class="row">
              <div class="col-md-12">
                <form method="POST" action="{{route('projects.adduser')}}">
                  {{csrf_field()}}
                <div class="input-group">
                  <input type="hidden" name="project_id" value="{{$project->id}}">
                  <input type="text" class="form-control" name="email" placeholder="Email">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Add</button>
                  </span>
                </div>
                </form>
              </div>
            </div>

            <br>
           
              <h4>Team Member</h4>
              <ol class="list-unstyled">
                @foreach($project->users as $user)
                <li><a href="#">{{$user->email}}</a></li>
                 @endforeach
              </ol>

          </div>
        </div>

      </div> <!-- End Row -->

      
    </div> <!-- /container -->
    @endsection

