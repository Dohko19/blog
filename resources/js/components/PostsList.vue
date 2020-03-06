<template>
    <section class="posts container">
	    <!-- @if (isset($title))
	        <h2>{{ $title }}</h2>
	    @endif -->
	    <!-- @forelse ($posts as $post) -->
        <posts-list-item v-for="post in posts"
        :post="post"
        :key="post.id"
        />

	    <!-- @empty -->

	     <article class="post" v-if="!posts.length">

	        <div class="content-post">

	            <h1>No hay publicaciones todavia.</h1>
	        </div>
	    </article>

	    <!-- @endforelse -->
	</section><!-- fin del div.posts.container -->
	<!-- {{ $posts->appends(request()->all())->render("pagination::default") }} -->
</template>

<script>
    export default {
        props: ['posts']
    }
</script>

<style lang="scss" scoped>

</style>
