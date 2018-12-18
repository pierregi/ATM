


<?php echo form_open('artiste/recherche',array('class'=>'form-inline')); ?>

    <div class="form-group">
        <input type="date" id="date" class="form-control" placeholder="Date" style="margin : 0 5px;" name="date">
        <input type="text" id="ville" class="form-control" placeholder="Ville" style="margin : 0 5px;" name="ville">
        <input type="submit" value="Rechercher" class="btn btn-primary">
    </div>

<?php echo form_close(); ?>



<br>

<?php if(!$empty): ?>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Ville</th>
      <th scope="col">Salle</th>
    </tr>
  </thead>
  <tbody>
      
  
  <?php foreach($salle as $date): ?>
        <tr>
            <th><?php echo $date["ville"]?></th>
            <th><?php echo $date["salle"]?></th>
        </tr>
  <?php endforeach; ?>
      
  
  </tbody>
</table>


<?php endif; ?>




