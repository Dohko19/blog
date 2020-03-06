<template>
<div>
    <posts-list :posts="posts"></posts-list>
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
