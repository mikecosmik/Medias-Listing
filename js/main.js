$(document).ready(function(){
	
	
	
	
	$('.btn-primary').on('click', function(){
		
		console.log('Click');
		//sérialiser le form
		$.ajax({
			type: 'POST',
			url: 'includes/post.php',
			data: $("#formData").serialize()
		})		
		.done(function(data){;
			if(data=="1"){
				console.log("Ajout effectué!");
				
				//efface le form
				$("#formData").trigger('reset');
			}
		});
	})
});




Vue.component('customers', {
	template: '#customer-table',
	data: function(){
		return{
			customers: []
		}
	},
	created: function(){
		this.getCustomers();
	},
	methods:{
		getCustomers(){
			$.getJSON('includes/json.php',function(customers){
				this.customers = customers;
			}.bind(this));
			
			setTimeout(this.getCustomers,1000);
		}
	}
});

new Vue({
	el: '#app'
})




