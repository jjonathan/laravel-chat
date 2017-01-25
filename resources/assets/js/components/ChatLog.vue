<template>
	<div class="chat-log">
		<chat-message v-for="message in messages" :message="message"></chat-message>
	</div>
</template>
<script>
	export default {
		data() {
			return { 
				messages: [
					{
						message: 'Hey!',
						user : 'Jesus'
					},
					{
						message : 'Whats up!?',
						user : 'Jose'
					}
				]
			}
		}
	}
</script>
<style type="text/css">
	.chat-log .chat-message:nth-child(even){
		background-color: #ccc;
	}
</style>