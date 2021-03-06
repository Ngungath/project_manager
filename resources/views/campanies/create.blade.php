@extends("layouts.app")
@section("content")
<div class="container">
<div class="row">
  <div class="col-md-9 col-sm-9 col-lg-9 pull-left">
      <!-- Jumbotron -->

      <!-- Example row of columns -->
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
          <h2>Add new comapny</h2>
          <form method="post" action="{{route('companies.store')}}">
            {{csrf_field()}}
           
            <div class="form-group">
              <label for="Company Name">Name<span class="required">*</span></label>
              <input type="text" name="cname" id="cname" spellcheck="false" class="form-control" value="">
            </div>
            <div class="form-group">
              <label for="company-content">Description<span class="required">*</span></label>
              <textarea placeholder="Enter Description" style="resize: vertical;" id="company-content"
              name="description"  rows="5" spellcheck="false" class="form-control" autosize-target>
              
              </textarea>
              
            </div>
            <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">  
            </div>
          </form>
        </div>
      
      </div>
      </div>

      <div class="col-sm-3 col-md-3 col-lg-3  blog-sidebar pull-right">
        <!--   <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <h4>Actions</h4>
            <hr>
            <ol class="list-unstyled">
              <li><a href="/companies">My Companies</a></li>
            </ol>
          </div>
        </div>

      </div> <!-- End Row -->

      
    </div> <!-- /container -->
    <script type="text/javascript">

    </script>
    @endsection

