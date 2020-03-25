<template>
	<div>
		<paginator url="/api/posts" component-name="posts-list" />

	</div>
</template>
<!--
<script>
	/**export default {
		data(){
			return {
				posts: [],
				pagination: {}
			}
		},
		mounted(){
			axios.get(`/api/posts?page=${this.$route.query.page || 1}`) //Post controller
				.then(res => {
					this.pagination = res.data;
					this.posts = res.data.data;
					delete this.pagination.data;
				})
				.catch(err => {
					console.log(err);
				})
		}
	}**/
</script> -->