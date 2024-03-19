@if(count($errors) > 0 )
<div class="alert alert-dark text-white alert-dismissible fade show" role="alert">
	<ul>
		@foreach($errors->all() as $error)
		<li class="text-xs">{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif