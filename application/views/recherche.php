<h1>Recherche de salles disponibles : </h1>

<hr>

<?php echo form_open('artiste/recherche',array('class'=>'form-inline')); ?>

    <div class="form-group">
        <input type="date" id="date" class="form-control" placeholder="Date" style="margin : 0 5px;" name="date">
        <button id="bouton"><i>add</i>Plus de critères</button>
        <input type="text" id="ville" class="form-control" placeholder="Ville" style="margin : 0 5px;" name="ville">
        <input type="submit" value="Rechercher" class="btn btn-primary">


<?php echo form_close(); ?>

<hr>
<br>
<?php if(!$empty): ?>

<small><?php echo count($salle); ?> salle(s) trouvée(s)</small>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Ville</th>
      <th scope="col">Salle</th>
      <th scope="col">Accessible 	&#9855;</th>
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
    $texte = "Désolé, votre recherche n'a rien retournée";
    $emoji = "crying_face";
  }
  $image_properties = array(
        'src'   => "/static/img/$emoji.png",
        'width' => '20',
        'height'=> '20',
        'style' => 'margin-right : 8px;');

  
  echo $texte." ".img($image_properties); ?></p>

<?php endif; ?>




<script type="text/javascript">
    $("#ville").hide();
    
    $( function() {
      $( "#date" ).datepicker();
      $( "#date" ).datepicker("hide");
    } );
    

    $("#bouton").click(function(e){
      e.preventDefault();
        if($("#ville").is(":hidden")){
            $("#ville").show();
            $('#bouton').html('Moin de critères');
        }else{
            $("#ville").hide();
            $('#bouton').html('Plus de critères');
        }
    });

</script>