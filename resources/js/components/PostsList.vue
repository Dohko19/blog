<template>
    <section class="posts container">
        <posts-list-item v-for="post in items"
        :post="post"
        :key="post.id"
        />

	     <article class="post" v-if="! items.length">

	        <div class="content-post">

	            <h1>No hay publicaciones todavia.</h1>
	        </div>
	    </article>
	</section><!-- fin del div.posts.container -->
</template>

<script>
    export default {
        props: ['items']
    }
</script>

<style lang="scss">

</style>
