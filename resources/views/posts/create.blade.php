@extends('layouts.app')

@section('title', ' | Create')

@section('content')

	<form method="post" action="{{ route('posts.store') }}">
		
		@csrf

		<input type="text" name="title" class="form-control" placeholder="Enter Title">
		<hr>

		<input type="text" name="title" class="form-control" placeholder="Enter Title">
		<hr>
		
		<input type="submit" class="btn btn-primary btn-block" value="create">
		
	</form>

@endsection