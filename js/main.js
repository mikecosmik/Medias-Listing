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
			//efface le form
			$("#formData").trigger('reset');
			
			if(data=="1"){
				console.log("Ajout effectué!");
			}
		});
	})
	
	$('.fa-edit').on('click', function(){	
		var id = $(this).children('span').text();
		console.log(id);
		//edit(id);
		//sérialiser le form
		/*
		$.ajax({
			type: 'POST',
			url: 'includes/post.php',
			data: $("#formData").serialize()
		})		
		.done(function(data){;
			//efface le form
			$("#formData").trigger('reset');
			
			if(data=="1"){
				console.log("Ajout effectué!");
			}
		});*/
	})
	
	$('.fa-trash').on('click', function(){	
		var id = $(this).children('span').text();
		console.log(id);
		//delete(id);
		//sérialiser le form
		/*
		$.ajax({
			type: 'POST',
			url: 'includes/post.php',
			data: $("#formData").serialize()
		})		
		.done(function(data){;
			//efface le form
			$("#formData").trigger('reset');
			
			if(data=="1"){
				console.log("Ajout effectué!");
			}
		});*/
	})
});


/***
 * Les variables url, res, param et url_order_by servent à "ordonner" le résultat sql.
 * Bien sûr puisque ce n'est qu'une application d'exemple le traîtement n'est pas complet
 * car il pourrait y avoir plusieurs paramètres.  Dans le cas qui nous intéresse, seul
 * le order_by est traité car c'est suffisant pour la démo mais normalement une url 
 * comme celle-ci ?order_by=titre&tri=asc&p=4 par exemple pourrait
 * et devrait éviemment être entièrement traitée
 */

var url = window.location.href;
var res = url.split("?");

if( res.length > 1 ){
	res = res[1].split("&");
}

var param = "";
var url_order_by = "";

if(res[1]){
	url_order_by = "?order_by=" + res[1];
}


$( res ).each(function( index ) {
	param = res[index];  
	console.log( param );
	  
	  if( param.indexOf("order_by=") != -1 ){
		  param = param.replace("order_by=", "");
		  console.log(param);
		  url_order_by = "?order_by=" + param;
	  }
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
			$.getJSON('includes/json.php' + url_order_by,function(full_list){
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