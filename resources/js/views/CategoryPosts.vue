<template>
    <!-- <posts-list :posts="posts"></posts-list> -->
    <paginator :url="`/api/categorias/${this.category}`" component-name="posts-list" />
</template>


<script>
    export default {
    	props: ['category']
    	// data(){
    	// 	return{
    	// 		posts: []
    	// 	}
    	// },
	    // mounted(){
	    // 	axios.get(`/api/categorias/${this.category}`)
	    // 	.then(res => {
	    // 			this.posts = res.data.data;
	    // 	})
	    // 	.catch(err => {
	    // 		console.log(err.response.data);
	    // 	})
	    // }
    }
</script>
