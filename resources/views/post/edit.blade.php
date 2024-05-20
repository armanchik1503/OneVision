<x-app-layout>
	<div class="post-container single-post">
		<h1>Edit post</h1>
		<form action="{{ route('post.update', $post->id) }}" method="POST" class="post">
			@csrf
			@method('PUT')
			<textarea name="title" rows="10" class="post-title" placeholder="Enter post title">
				{{ $post->user_id }}
			</textarea>
			<textarea name="body" rows="10" class="post-body" placeholder="Enter post description"></textarea>
			<div class="post-buttons">
				<a href="{{ route('post.index') }}" class="post-cancel-button">Cancel</a>
				<button class="post-submit-button">Submit</button>
			</div>
		</form>
	</div>
</x-app-layout>