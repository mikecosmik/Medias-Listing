<!doctype html>
<html class="no-js" lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <title>Petite application de base</title>
    <meta name="description" content="Application de listing avec opérations de base sur la DB.  Utilisation de vue.js demandée" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/custom_mh.css" />
    
    <link href="css/fontawesome-5.11.2-web/css/all.css" rel="stylesheet">
    
    <meta name="theme-color" content="#fafafa">
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    
    ******************
    note MH: j'ai bien des doutes que quiconque lise ce code utilise un browser passé date mais bon, je laisse quand même ce code de Boilerplate pour des fins théoriques
    ******************
    <![endif]-->
    
    
	<div class="container">
		<div class="row">
    		<div class="col-sm-12"><h1>Petite application de base 'Liste de médias'</h1></div></div>
    	</div>
		
		<div class="row">
    		<div class="col-sm-3">
    			<form method="POST" action="" id="formData">
    				<input type="hidden" id="update" name="update" value="0" />
    				<input type="hidden" id="id" name="id" value="" />
    				
    				<label for="firstname">Titre</label>
    				<input type="text" class="form-control" id="titre" name="titre" required />
    				
    				<label for="lastname">Descriptions</label>
    				<input type="text" class="form-control" id="description" name="description" required />
    				
    				<label for="contact">Note/Appréciation</label>
    				<select class="form-control" id="note" name="note" required>
    					<option value="5">5</option>
    					<option value="4.5">4.5</option>
    					<option value="4">4</option>
    					<option value="3.5">3.5</option>
    					<option value="3">3</option>
    					<option value="2.5">2.5</option>
    					<option value="2">2</option>
    					<option value="1.5">1.5</option>
    					<option value="1">1</option>
    				</select>

    				
    				<label for="fk_format">Format</label>
    				<select class="form-control" id="fk_format" name="fk_format" required />
    				<?php include_once 'includes/select_format.php';?>
    				</select>
    				
    				<label for="type">Type</label>
    				<select class="form-control" id="fk_type" name="fk_type" required />
    				<?php include_once 'includes/select_type.php';?>
    				</select>
    				
    				<button type="button" class="btn form-control btn-primary send">Envoyer</button>
    				<button type="button" class="btn form-control btn-primary reset">Reset formulaire</button>
    			</form>
    		</div>
    		<div class="col-sm-9">
    			<div id="app">
    				<full_list></full_list>
    			</div>
    			<template id="tbl">      
        			<table class="table table-bordered">
        				<thead>
        					<tr>
            					<th><a href="?order_by=titre">Titre</a></th>
            					<th><a href="?order_by=description">Description</a></th>
            					<th><a href="?order_by=note">Note</a></th>
            					<th><a href="?order_by=fk_format">Format</a></th>
            					<th><a href="?order_by=fk_type">Type</a></th>
							</tr>					
        				</thead>
        				<tbody>
        					<tr v-for="list_element in full_list" :key="list_element.media_id">
        						<td>{{list_element.titre}}</td>
        						<td>{{list_element.description}}</td>
        						<td class="wsnr">{{list_element.note}}</td>
        						<td class="wsnr">{{list_element.format_nom}}</td>
        						<td class="wsnr">{{list_element.type_nom}}</td>
        						<td><a href="javascript:void(0);"><i class="fas fa-edit"><span>{{list_element.media_id}}</span></i></a></td>
        						<td><a href="javascript:void(0);"><i class="fas fa-trash"><span>{{list_element.media_id}}</span></i></a></td>
        					</tr>
        				</tbody>
        			</table>
    			</template>
    		</div>
		</div>
	</div>    


    <script src="js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
    
    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!--         
        ******************
        note MH: j'ai choisi celui-là, les warning consoles me semblent intéressants...
        ******************
    -->
    <?php 
        $randomNumber = rand(0, 1000000); 
    ?>
    <script src="js/plugins.js"></script>
    <script src="js/main.js?v=<?php echo $randomNumber; ?>"></script>
    
    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. 
    <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
    
    ******************
    note MH: même si inclus dans Boilerplate, tout à fait inutile en ce qui nous int�resse
    ******************
    -->
    
    
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/45191f2ac6.js"></script>
    
</body>

</html>
