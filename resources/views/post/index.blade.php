<x-app-layout>
	<div class="post-container">
		<a href="{{ route('post.create') }}" class="new-post-btn">Create post</a>
		<div class="posts">
			@foreach($posts as $post)
				<div class="post">
					<div class="post-body">
						{{ $post->user_id }}
						{{ $post->dummy_post_id }}
					</div>
					<div class="post-buttons">
						<a href="{{ route('post.show', ['post' => $post->id]) }}" class="post-view-button">View</a>
						<a href="{{ route('post.edit', ['post' => $post->id]) }}" class="post-edit-button">Edit</a>
						<form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST">
							@csrf
							@method('DELETE')
							<button class="post-delete-button">Delete</button>
						</form>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</x-app-layout>