<h1>Recherche de salles disponibles : </h1>

<hr>

<?php echo form_open('artiste/recherche',array('class'=>'form-inline')); ?>

    <div class="form-group">

        <input type="date" id="date" class="form-control" placeholder="Date" style="margin : 0 5px;" name="date" required><span style="color:grey;">*&nbsp;</span>
        <input type="" value="Critères suplémentaires" class="btn btn-primary" style="margin : 0 8px;" id="more">
        <select id="ville" class="form-control" placeholder="Ville" style="margin : 0 5px;" name="ville">
            <option value="">Choisissez une ville</option>
            <option value="fake">Fausse ville</option>
            <?php foreach($villes as $v): ?>
                <option value="<?php echo $v['ville'];?>"><?php echo $v['ville'];?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Rechercher" class="btn btn-primary">
    </div>
<?php echo form_close(); ?>
<span style="color:grey;margin-top:5px;"><small>&nbsp;&nbsp;* obligatoire</small></span>
<hr>
<?php if(!$empty && (count($salle)>0)): ?>

<small><?php echo count($salle); ?> salle(s) trouvée(s)</small>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Ville</th>
      <th scope="col">Salle</th>

      <th scope="col">Accessible &#9855;</th>
    </tr>
  </thead>
  <tbody>
      
  
  <?php foreach($salle as $date): ?>
        <tr>
            <th><?php echo $date["ville"]?></th>
            <th><?php echo $date["salle"]?></th>
            <th><?php if($date['accessible'] == "f"){echo "Non"; }else{echo "Oui";}?></th>
        </tr>
  <?php endforeach; ?>
      
  
  </tbody>
</table>

<?php else:?>

<?php
  if($empty == -1){
    $texte = "Pour rechercher une salle, utilisez l'outil de recherche en haut de la page";
    $emoji = "top";
  }else{
    $texte = "Désolé, aucune salle n'est disponible";
    $emoji = "crying_face";
  }
  $image_properties = array(
        'src'   => "/static/img/$emoji.png",
        'width' => '20',
        'height'=> '20',
        'style' => 'margin-right : 8px;');

  
  echo $texte." ".img($image_properties); ?>

<?php endif; ?>




<script type="text/javascript">
    
    $("#ville").hide();
    
    $( function() {
      $( "#date" ).datepicker();
      $( "#date" ).datepicker("hide");
    } );
        
    $('#more').on('click',(e)=>{
        $("#more").hide();
        $('#ville').show();
    })

</script>