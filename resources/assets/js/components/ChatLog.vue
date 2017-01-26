<template>
	<div class="chat-log">
		<chat-message v-for="message in messages" :message="message"></chat-message>
		<div class="empty" v-show="messages.length === 0">
			0 Mensagens
		</div>
	</div>
</template>
<script>
	export default {
		props: ['messages']
	}
</script>
<style type="text/css">
	.chat-log .chat-message:nth-child(even){
		background-color: #ccc;
	}
	.empty{
		padding: 1rem;
		text-align: center;
	}
</style>