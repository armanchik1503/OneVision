<x-app-layout>
	<div class="post-container">
		<div class="post-header">
			<h1>Post: {{$post->created_at}}</h1>
			<div class="post-buttons">
				<a href="{{ route('post.edit', $post->id) }}" class="post-edit-button">Edit</a>
				<button class="post-delete-button">Delete</button>
			</div>
		</div>
		<div class="post">
			<div class="post-body">
				{{ $post->user_id }}
			</div>
		</div>
	</div>
</x-app-layout>