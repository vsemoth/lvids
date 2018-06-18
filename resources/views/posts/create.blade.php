@extends('layouts.app')

@section('title', ' | Create')

@section('content')

	<form enctype="multipart/form-data" method="post" action="{{ route('posts.store') }}">
		
		@csrf

		<input type="text" name="title" class="form-control" placeholder="Enter Title">
		<hr>

		<label for="image">Upload:</label>
		<input type="file" name="image" class="form-control">
		<hr>

		<textarea type="text" name="body" class="form-control" placeholder="Embed here..."></textarea>
		<hr>
		
		<input type="submit" class="btn btn-primary btn-block" value="create">
		
	</form>

@endsection