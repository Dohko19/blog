<template>
    <posts-list :posts="posts"></posts-list>
</template>


<script>
    export default {
    	data(){
    		return{
    			posts: []
    		}
    	},
	    mounted(){
	    	axios.get(`/api/categorias/${this.$route.params.category}`)
	    	.then(res => {
	    			this.posts = res.data.data;
	    	})
	    	.catch(err => {
	    		console.log(err.response.data);
	    	})
	    }
    }
</script>
