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

Vue.component('full_list', {
	template: '#tbl',
	data: function(){
		return{
			full_list: []
		}
	},
	created: function(){
		this.getFullList();
	},
	methods:{
		getFullList(){
			$.getJSON('includes/json.php',function(full_list){
				this.full_list = full_list;
			}.bind(this));
			
			//réexécuter après 5000 millisecondes
			setTimeout(this.getFullList,5000);
		}
	}
});

new Vue({
	el: '#app'
})