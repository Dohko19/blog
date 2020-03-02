<template>
	<div>
		<header class="container-flex space-between">
				    <div class="date">
				        <span class="c-gray-1">
				        	{{ post.published_date }} / {{ post.owner.name }}
				            <!-- {{ optional($post->published_at)->format('M d') }} / {{ $post->owner->name }} -->

				        </span>
				    </div>
				    <!-- @if ($post->category) -->
				        <div class="post-category">
				            <span class="category text-capitalize">
				                <!-- <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a> -->
				                <a href="#">{{ post.category.name }}</a>
				            </span>
				        </div>
				    <!-- @endif -->
				</header>

	            <h1 v-text="post.title"></h1>

	            <div class="divider"></div>
	</div>
</template>

<script>
	export default {
		props: ['post']
	}
</script>