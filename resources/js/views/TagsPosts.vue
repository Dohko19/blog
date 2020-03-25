<template>
    <!-- <posts-list :posts="posts"></posts-list> -->
    <paginator :url="`/api/etiquetas/${this.tag}`"
    component-name="posts-list"/>
</template>


<script>
    export default {
        props: ['tag']
    	// data(){
    	// 	return{
    	// 		posts: []
    	// 	}
    	// },
	    // mounted(){
     //        axios.get(`/api/etiquetas/${this.tag}`)
     //                    .then(res => {
     //                            this.posts = res.data.data;
     //                    })
     //                    .catch(err => {
     //                        console.log(err.response.data);
     //                    });
	    // 	// this.getPosts();
     //    }
        // beforeRouteUpdate(to, from, next){
        //     this.tag = to.params.tag;
        //     this.getPosts();
        //     console.log(to.params.tag, from.params.tag);
        //     next();
        // },
        // methods: {
        //         getPosts(){
        //             return axios.get(`/api/etiquetas/${this.tag}`)
        //                 .then(res => {
        //                         this.posts = res.data.data;
        //                 })
        //                 .catch(err => {
        //                     console.log(err.response.data);
        //                 });
        //     }
        // },
        // watch: {
        //     tag() {
        //         this.getPosts();
        //     }
        // }
    }
</script>
