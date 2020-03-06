<template>
    <article class="post">
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
								<router-link :to="{name: 'tags_posts', params: {tag: tag.url} }">
                                    #{{ tag.name }}
                                    </router-link>
							</span>
	                </div>
	            </footer>
	        </div>
	    </article>
</template>

<script>
    export default {
        props: ['post']
    }
</script>

<style lang="scss" scoped>

</style>
