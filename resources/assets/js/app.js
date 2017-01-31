require('./bootstrap');
Vue.component('example', require('./components/Example.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));

const app = new Vue({
	el: '#app',
	data : {
		messages: []
	},
	methods: {
		addMessage(message){
			this.messages.push(message);
			axios.post('/messages', message);
		}
	},
	created(){
		axios.get('/messages').then(response => {
			this.messages = response.data;
		});
		Echo.private('chatroom')
			.listen('MessagePosted', (e) => {
				console.log(e);
			});
	}
});
