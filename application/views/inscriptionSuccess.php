<?php

$image_properties = array(
        'src'   => '/static/img/hapy_face.png',
        'width' => '20',
        'height'=> '20',
        'style' => 'margin-right : 8px;');

?>


<div class="card">
  <div class="card-header">
    La demande d'inscription a été envoyé ! <?php echo img($image_properties); ?>
  </div>
  <div class="card-body">
    <p class="card-text">Un administrateur va maintenant la traiter très prochainement, le résultat vous sera notifié par mail.</p>
    <a href="<?php echo base_url(); ?>" class="btn btn-primary">Retour à l'accueil</a>
  </div>
</div>