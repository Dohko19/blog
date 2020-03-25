<template>
	<div class="form-contact">
		<transition name="fade" mode="out-in">
		<p v-if="send">Tu mensaje a sido recibido te contactaremos pronto</p>
		<form v-else @submit.prevent="submit">
			<div class="input-container container-flex space-between">
				<input v-model="form.name" placeholder="Tu Nombre" class="input-name" required>
				<input v-model="form.email" type="email" placeholder="Email" class="input-email" required>
			</div>
			<div class="input-container">
				<input v-model="form.subject" placeholder="Asunto" class="input-subject" required>
			</div>
			<div class="input-container">
				<textarea v-model="form.message" cols="30" rows="10" placeholder="Tu mensaje" required></textarea>
			</div>
			<div class="send-message">
				<button class="text-uppercase c-green" :disabled="working">
					<span v-if="working">Enviando...</span>
					<span v-else="working">Enviar Mensaje</span>
				</button>
			</div>
		</form>
	</transition>
	</div>
</template>
<script>
	export default{
		data(){
			return {
				send: false,
				working: false,
				form: {
					name: 'Daniel',
					email: 'daniel@email.com',
					subject: 'Asunto',
					message: 'Cuerpo del Mensaje'
				}
			}
		},
		methods:{
			submit(){
				this.working = true;
				axios.post('/api/messages', this.form)
				.then(res => {
					this.send = true;
					this.working = false;
				})
				.catch(errors => {
					this.sent = false;
					this.working = false;
				})
			}
		}
	}
</script>