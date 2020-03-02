<template>
<div>
	<section class="posts container">
	    <!-- @if (isset($title))
	        <h2>{{ $title }}</h2>
	    @endif -->
	    <!-- @forelse ($posts as $post) -->

	    <article v-for="post in posts" class="post">
	        <!-- @include($post->viewType('home')) -->
	        <div class="content-post">
				<post-header :post="post"></post-header>
	            <!-- @include('<posts class="he"></posts>ader') -->


	            <p v-html="post.excerpt"></p>
	            <footer class="container-flex space-between">
	                <div class="read-more">
	                    <!-- <a href="#" class="text-uppercase c-green">Leer más</a> -->
                        <router-link class="text-uppercase c-green" :to="{name: 'posts_show', params: {url: post.url}}">Leer mas</router-link>
	                </div>
	                <div class="tags container-flex">
	                    <!-- @include('posts.tags') -->
							<span class="tag c-gray-1 text-capitalize" v-for="tag in post.tags">
								<a href="#">#{{ tag.name }}</a>
							</span>
	                </div>
	            </footer>
	        </div>
	    </article>

	    <!-- @empty -->

	     <article class="post" v-if="!posts.length">

	        <div class="content-post">

	            <h1>No hay publicaciones todavia.</h1>
	        </div>
	    </article>

	    <!-- @endforelse -->
	</section><!-- fin del div.posts.container -->
	<!-- {{ $posts->appends(request()->all())->render("pagination::default") }} -->
	<!--  <div class="pagination">
	    <ul class="list-unstyled container-flex space-center">
	        <li><a href="#" class="pagination-active">1</a></li>
	        <li><a href="#">2</a></li>
	        <li><a href="#">3</a></li>
	    </ul>
</div> -->
</div>
</template>

<script>
	export default {
		data(){
			return {
				posts: []
			}
		},
		mounted(){
			axios.get('/api/posts') //Post controller
				.then(res => {
					this.posts = res.data.data;
				})
				.catch(err => {
					console.log(err);
				})
		}
	}
</script>
