<template>
<section class="pages container">
	<div class="page page-archive">
		<h1 class="text-capitalize">archive</h1>
		<p>Nam efficitur, massa quis fringilla volutpat, ipsum massa consequat nisi, sed eleifend orci sem sodales lorem. Curabitur molestie eros urna, eleifend molestie risus placerat sed.</p>
		<div class="divider-2" style="margin: 35px 0;"></div>
		<div class="container-flex space-between">
			<div class="authors-categories">
				<h3 class="text-capitalize">authors</h3>
				<ul class="list-unstyled">
					<li v-for="author in authors" v-text="author.name"></li>
				</ul>
				<h3 class="text-capitalize">categories</h3>
				<ul class="list-unstyled">
					<!-- @foreach ($categories as $category)
						<li class="text-capitalize">
							<a href="{{ route('categories.show',$category) }}">{{ $category->name }}</a>
						</li>
					@endforeach -->
					<li v-for="category in categories">
						<router-link :to="{name: 'category_posts', params: {category: post.category.url }}">
                                    {{ category.name }}
                                </router-link>
					</li>
				</ul>
			</div>
			<div class="latest-posts">
				<h3 class="text-capitalize">Ultiimas publicaciones</h3>
				<!-- @foreach ($posts as $post)
				<p><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></p>
				@endforeach -->
				<h3 class="text-capitalize">Publicaciones por mes</h3>
				<ul class="list-unstyled">
					<!-- @foreach ($archive as $date) -->
					<li class="text-capitalize">
						<!-- <a href="{{ route('pages.home', ['month' => $date->month, 'year' => $date->year]) }}"> -->
						<!-- {{ $date->monthname }} {{ $date->year }} ({{ $date->posts }}) -->
						</a>
					</li>
					<!-- @endforeach -->
				</ul>
			</div>
		</div>
	</div>
</section>
</template>

<script>
	export default {
		data(){
			return {
				authors: [],
				categories: [],
				posts: [],
				archive: []
			}
		},
		mounted(){
			axios.get('/api/archivo')
			.then(res => {
				this.authors = res.data.authors;
				this.categories = res.data.categories;
				this.posts = res.data.posts;
				this.archive = res.data.archive;
			})
		}
	}
</script>