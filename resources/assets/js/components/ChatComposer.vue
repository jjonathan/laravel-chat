<template>
	<div class="chat-composer">
		<input type="text" name="message" style="border-radius: 0px" id="inputMessage" class="form-control chat-composer" placeholder="Start typing your message..." required="true" v-model="messageText" @keydown.enter="sendMessage">
		<button class="btn btn-primary" style="border-radius: 0px" @click="sendMessage">Send</button>
	</div>
</template>

<script>

	export default {
		data(){
			return {
				messageText : ''
			}
		},
		methods: {
			sendMessage(){
				this.$emit('messagesent', {
					message: this.messageText,
					user : {
						name: $('.navbar-right .dropdown-toggle').text()
					}
				});
				this.messageText = '';
			}
		}
	}

</script>

<style lang="css">
	
	.chat-composer{
		display: flex;
	}
	.chat-composer input{
		flex: 1 auto;
	}
	.whitout-border-radius button{
		border-radius: 0!important;
	}

</style>