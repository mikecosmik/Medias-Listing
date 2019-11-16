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
    		<div class="col-sm-3">
    			<form method="POST" action="" id="formData">
    				<label for="firstname">Titre</label>
    				<input type="text" class="form-control" id="titre" name="titre" required />
    				
    				<label for="lastname">Descriptions</label>
    				<input type="text" class="form-control" id="description" name="description" required />
    				
    				<label for="contact">Note</label>
    				<input type="text" class="form-control" id="note" name="note" required />
    				
    				<label for="email">Format</label>
    				<input type="text" class="form-control" id="format" name="format" required />
    				
    				<label for="type">Type</label>
    				<input type="text" class="form-control" id="type" name="type" required />
    				
    				<button type="button" class="btn form-control btn-primary">Envoyer</button>
    			</form>
    		</div>
    		<div class="col-sm-9">
    			<h1>Data table</h1>
    		
    			<div id="app">
    				<full_list></full_list>
    			</div>
    			<template id="tbl">      
        			<table class="table table-bordered">
        				<thead>
        					<tr>
            					<th>Titre</th>
            					<th>Description</th>
            					<th>Note</th>
            					<th>Format</th>
            					<th>Type</th>
							</tr>					
        				</thead>
        				<tbody>
        					<tr v-for="list_element in full_list">
        						<td>{{list_element.titre}}</td>
        						<td>{{list_element.description}}</td>
        						<td>{{list_element.note}}</td>
        						<td>{{list_element.format}}</td>
        						<td>{{list_element.type}}</td>
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
</body>

</html>