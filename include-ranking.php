
    <? date_default_timezone_set('America/Santiago'); ?>
    <?php $ahora = date("Y-m-d"); ?>
   
 
    <div class="row" data-fecha="<?php echo $ahora; ?>" data-ahora="<?php echo date("Y-m-d H:i:s"); ?>">
    	<img id="tit-sonadores" class="img-responsive center-block" src="https://s219687.gridserver.com/clientes/modo/mckay/tit-ranking.png" alt="ranking de soñadores" title="ranking de soñadores">
		<div class="box_ganador2 center-block <?php if($invisible == 0){ ?>invisible<?php } ?>">
			<!-- tabla participantes -->
            <div class="table-responsive">
				<table id="tabla-ranking" class="table">
					<thead>
						<tr>
							<th class="text-center">Códigos Ingresados</th>
							<th>Participantes</th>
						</tr>
					</thead>
				<tbody>
              <?php
			  		//echo $ahora;
                    $resultado = $db->rawQuery("SELECT COUNT( * ) AS total,codUS,codRTS FROM mckay125_codigos where codRTS >= '$ahora' GROUP BY  codUS ORDER BY total DESC LIMIT 10");
                    if($resultado){
                    foreach ($resultado as $r) {
                    $total   = $r["total"];
                    $codUS  = $r["codUS"];
                    $fecha=$r['codRTS'];
                    $participante = $db->rawQuery("SELECT * FROM mckay125_participantes WHERE mk125_ID = $codUS" );
                    if($participante){
                    foreach ($participante as $p) {
                    $mk125_nom  = $p["mk125_nom"];
                    }
                }
                /*$participante=$db->rawQuery("SELECT * from mckay125_codigos where codRTS between now() and now() + interval 12 hour");  
*/						
                 	   ?>	
                         <tr>
                           <td class="texto-amarillo text-center">
						   <?php echo $total; ?><?php echo $mk125_Codigo; ?>
                           </td>
                           <td><?php echo $mk125_nom; ?></td>
                         </tr>
                    <?php }
                    } ?>
                        	</tbody>
                        </table>
                    </div>
            <span class="small" style="
    color: #fff;
    bottom: 10px;
    position: absolute;
    display: block;
    text-align: center;
    width: 100%;
    left: 0;
"></span>
        </div>

    </div>