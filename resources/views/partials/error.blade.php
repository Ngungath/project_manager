@if(isset($errors) && count($errors) > 0)
<div class="container">
<div class="alert alert-dismissable alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-label="close">
		<span aria-hidden="true">&times;</span>
	</button>
	@foreach($errors->all() as $error)
	<strong>
		{!!$error!!}
	</strong>
	@endforeach
</div>
</div>

@endif