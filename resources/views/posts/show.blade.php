@extends('layouts.app')

@section('title', ' | $post->title')

@section('content')

	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<article>
					<div class="col-md-8 col-md-offset-2">

						@if($post->image)
							<img width="180" src="{{ url($post->image) }}">
						@endif
						<h2>{{ $post->title }}</h2>
						<hr>
							<div>
								{!! $post->body !!}
							</div>
						<hr>
						<p align="right">Date Posted: <span>{{ $post->created_at }}</span></p>
						<hr>

						<a href="{{ route('posts.index') }}" class="btn btn-danger btn-sm" value=><<<"Back Home">>></a>
						
					</div>
				</article>
			</div>
		</div>
	</div>

@endsection