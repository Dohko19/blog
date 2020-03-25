<template>
	<div id="disqus_thread"></div>
</template>

		<script>
			export default{
				mounted(){
					(function() { // DON'T EDIT BELOW THIS LINE
			var d = document, s = d.createElement('script');
			s.src = 'https://zendero.disqus.com/embed.js';
			s.setAttribute('data-timestamp', +new Date());
			(d.head || d.body).appendChild(s);
			})();
				}
			}

		</script>
		<noscript>Habilite Javascript para ver el <a href="https://disqus.com/?ref_noscript">Comentario patrocinado por disquis.</a></noscript>