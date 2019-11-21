$(document).ready(function(){
	$('.btn-primary.send').on('click', function(){
		if($('#titre').val()==""){
			alert("Héo!!! Le titre est requis!");
		}else if($('#description').val()==""){
			alert("Allez allez!  Un petit effort! Remplis la description, franchement! Non mais ça se peut-tu!");
		}else{
			//sérialiser le form
			$.ajax({
				type: 'POST',
				url: 'includes/post.php',
				data: $("#formData").serialize()
			})
			.done(function(data){;
				//efface le form
				$("#formData").trigger('reset');
				$('#update').val(0);
				$('#id').val("");

				if(data=="1"){
					console.log("Ajout effectué!");
				}
			});
		}
	})


	$('.btn-primary.reset').bind('click', function(){
		//efface le form
		$("#formData").trigger('reset');
	})

	$(document).on('click','.fa-edit', function(event){
		var id = $(this).children('span').text();
		url = "includes/getMedia.php";

	    $.ajax({
	        type: "GET",
	        dataType: "json",
	        url: url,
	        data: {id: id},
	        success: function(data) {
				$('#update').val(1);
				$('#id').val(id);
				$('#titre').val(data["titre"]);
				$("#description").val(data["description"]);
				$('#note option[value="'+data["note"]+'"]').prop('selected', true);
				$('#fk_format option[value="'+data["fk_format"]+'"]').prop('selected', true);
				$('#fk_type option[value="'+data["fk_type"]+'"]').prop('selected', true);
	        },
	        error : function(){
	        	alert('Some error occurred!');

	        }
	    });
	})

	$(document).on('click','.fa-trash', function(event){
		var id = $(this).children('span').text();
		if (confirm('Supprimer? Vraiment? Certain certain? T\'est vraiment sûr toi-là?')) {
			$.ajax({
		        type: "GET",
		        dataType: "json",
		        url: "includes/delete.php",
		        data: {id: id},
		        success: function(data) {
					$('#update').val(0);
					$('#id').val("");
					alert('Tu risque de regretter mais le précieux enregistrement a été kické de la DB!');
		        },
		        error : function(){
		           console.log('Erreur!!!');
		        }
		    });
		} else {
		    alert('Boooooooooon!!! Bonne idée de ne pas kicker le précieux contenu de la DB!');
		}

		$("#formData").trigger('reset');
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

	  if( param.indexOf("order_by=") != -1 ){
		  param = param.replace("order_by=", "");
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

			setTimeout(this.getFullList,5000);
			//très mauvais, solution trouvée, assigning keys to children après une modification/ajout/supress
			//Les solutions ici me semblent bonnes soit Better way: You can use forceUpdate et The best way: key-changing,
			//https://michaelnthiessen.com/force-re-render/
			//en temps normal il est évident que je n'aurais pas laissé un disgracieux setTimeout lol mais dimanche, 21h, je crois
			//que c'en est assez du démo :)
		}
	},
});

new Vue({
	el: '#app'
})
