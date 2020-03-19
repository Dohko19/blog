<template>
<section class="post container" style="padding-right: 0px; padding-left: 0px">

  <!-- @include($post->viewType()) -->

    <div class="content-post">
        <post-header :post="post"></post-header>
        <div class="image-w-text" v-html="post.body"></div>
        </div>

        <footer class="container-flex space-between">
		      <!-- @include('partials.social-links', ['description' => $post->title]) -->
          <div class="tags container-flex">
            <!-- @include('posts.tags') -->
          </div>
      </footer>
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>
		<!-- @include('partials.disqus-script') -->

      </div><!-- .comments -->
    </div>
</section>
</template>

<script>
    export default {
      props: ['url'],
    	data(){
    		return{
    			post: {
    				owner:{},
    				category:{}
    			}
    		}
    	},
	    mounted(){
	    	axios.get(`/api/blog/${this.url}`)
	    	.then(res => {
	    			this.post = res.data;
	    	})
	    	.catch(err => {
	    		console.log(err.response.data);
	    	})
	    }
    }
</script>

<style lang="scss" scoped>

</style>
