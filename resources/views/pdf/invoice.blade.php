<center><h3>List Of All projects</h3></center>
<table border="0.5" width="100%">
	<tr>
		<td>SN</td>
		<td>Project Name</td>
		<td>No Days</td>
	</tr>
	@foreach($projects as $project)
	<tr>
	<td>{{$project->id}}</td>
	<td>{{$project->name}}</td>
	<td>{{$project->days}}</td>
	</tr>
	@endforeach
</table>