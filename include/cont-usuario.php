<?php
if(!isset($db)) {
    die;
}
?>

<?php

echo "<div class=\"panel panel-success\">
					 	<div class=\"panel-heading\">
					 		<h3 class=\"panel-title\">Panel Noticias | Bienvenido ".$_SESSION["user"]."</h3>
					 	</div>
					 	<div class=\"panel-body\">";
				$query = $db->query("SELECT * FROM noticias ORDER BY id_noticia DESC");
				foreach ($query as $noticia) {
					echo "<div class=\"row noticia\">
							<h2 class=\"titulo-noticia\">".$noticia["titulo"]." <span class=\"fecha\">".$noticia["fecha"]."</span></h2>
							<p class=\"cuerpo-noticia\">".$noticia["texto"]."</p>
						</div>";
				}
				echo "	 	</div>
                     </div>";
                     