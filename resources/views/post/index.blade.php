<x-app-layout>
	<div class="post-container">
		<a href="{{ route('post.create') }}" class="new-post-btn">Create post</a>
		<div class="posts">
			@foreach($posts as $post)
				<div class="post">
					<div class="post-body">
						<p><span class="bold">Name:</span> {{ $post->author->name }}</p>
						<p><span class="bold">Id:</span> {{ $post->id }}</p>
						<p class="post-body__title">{{ $post->dummy_json->title }}</p>
						<p class="post-body__content">{{ Str::words($post->dummy_json->body, 128) }}</p>
					</div>
					<div class="post-buttons">
						<a href="{{ route('post.show', ['post' => $post->id]) }}" class="post-view-button">View</a>
						@if(Auth::check() && Auth::user()->id === $post->user_id)
							<a href="{{ route('post.edit', ['post' => $post->id]) }}" class="post-edit-button">Edit</a>
							<form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST">
								@csrf
								@method('DELETE')
								<button class="post-delete-button">Delete</button>
							</form>
						@endif
					</div>
				</div>
			@endforeach
		</div>
	</div>
</x-app-layout>