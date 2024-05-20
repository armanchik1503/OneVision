<x-app-layout>
	<div class="post-container single-post">
		<h1>Create new post</h1>
		<form action="{{ route('post.store') }}" method="POST" class="post">
			@csrf
			<textarea name="title" rows="10" class="post-title" placeholder="Enter post title"></textarea>
			<textarea name="body" rows="10" class="post-body" placeholder="Enter post description"></textarea>
			<div class="post-buttons">
				<a href="{{ route('post.index') }}" class="post-cancel-button">Cancel</a>
				<button class="post-submit-button">Submit</button>
			</div>
		</form>
	</div>
</x-app-layout>