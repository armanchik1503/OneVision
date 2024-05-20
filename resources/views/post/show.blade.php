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
				<p><span class="bold">Name:</span> {{ $post->author->name }}</p>
				<p><span class="bold">Id:</span> {{ $post->id }}</p>
				<p class="post-body__title">{{ $post->dummy_json->title }}</p>
				<p class="post-body__content">{{ $post->dummy_json->body }}</p>
			</div>
		</div>
	</div>
</x-app-layout>