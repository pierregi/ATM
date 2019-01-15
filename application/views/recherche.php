<h1>Recherche de salles disponibles : </h1>

<hr>

<?php echo form_open('artiste/recherche',array('class'=>'form-inline')); ?>

    <div class="form-group">
    <?php echo $errorDate;?>

        <input type="date" id="date" class="form-control" placeholder="Date" style="margin : 0 5px;" name="date" min="2017-12-07" max="2017-12-30" value="<?php echo( set_value('date',"",TRUE));?>"required><span style="color:grey;">*&nbsp;</span>
        <div type=""  class="btn btn-primary" style="margin : 0 8px;" id="more">Critères suplémentaires</div>
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
      
  
  <?php foreach($salle as $s): ?>
        <tr id="coucou" onclick="document.getElementById('bouton').click();document.getElementById('salle').value='<?php echo $s["salle"]?>';">
            <th><?php echo $s["ville"]?></th>
            <th><?php echo $s["salle"]?></th>
            <th><?php if($s['accessible'] == "f"){echo "Non"; }else{echo "Oui";}?></th>
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


<button id="bouton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" hidden>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('artiste/reserver',array('class'=>'form-inline','id'=>'reserver')); ?>

    <div class="form-group">
        
        <input type="date" id="date" class="form-control" placeholder="Date" style="margin : 0 5px;" name="date" value="<?php echo(str_replace('_','/',$date));?>"required><span style="color:grey;">*&nbsp;</span>
        <select id="salle" class="form-control" placeholder="Salle" style="margin : 0 5px;" name="salle">
            <?php foreach($salle as $s): ?>
                <option value="<?php echo $s['salle'];?>" ><?php echo $s['salle']." - ".$s["ville"]." ";if($s['accessible'] != "f"){echo "&#9855;";}?></option>
            <?php endforeach; ?>
        </select>
        
        <select id="projet" class="form-control" placeholder="projet" style="margin : 0 5px;" name="projet">
            <option value="" ></option>
            <?php foreach($projet as $p): ?>
                <option value="<?php echo $p['nom'];?>" ><?php echo $p['nom'];?></option>
            <?php endforeach; ?>
        </select>
        <!--<input type="submit" value="Valider" class="btn btn-primary">-->
    </div>
    <span style="color:grey;margin-top:5px;"><small>&nbsp;&nbsp;* obligatoire</small></span>
<?php echo form_close(); ?>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" onclick="document.getElementById('reserver').submit()">Valider</button>
      </div>
    </div>
  </div>
</div>

