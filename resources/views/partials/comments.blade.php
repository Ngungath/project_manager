@foreach($comments as $comment)
      <div class="well well-sm">
        <p>{{$comment->body}}</p>
        <small>Posted By <span style="color: red;">{{$comment->user->first_name}}</span> on {{$comment->created_at}}</small>
      </div> 
@endforeach