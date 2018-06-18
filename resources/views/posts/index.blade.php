@extends('layouts.app')

@section('content')

	@foreach($posts as $post)

		{{ $post->title }}
		<hr>

	@endforeach

@endsection