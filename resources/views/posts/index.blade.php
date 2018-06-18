@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<div class="col-md-8 col-md-offset-2">

					<h1>Posts index<a class="glyphicon glyphicon-pencil link" href="{{ route('posts.create') }}"></a></h1>

					<hr>

						@foreach($posts as $post)

							@if(!$post)

								"<p align="center">
									Nothing here yet...
								</p>"

							@elseif($post)

									<article>
										<a href="{{ route('posts.show',$post->id) }}" class="link">
											<p>
												@if($post->image)
													<img src="{!! $post->image !!}" height="100">
												@endif
											</p>
											<h2>{{ $post->title }}</h2>
										</a>
									<hr>
									</article>

							@endif

						@endforeach
					
				</div>
			</div>
		</div>
	</div>

@endsection