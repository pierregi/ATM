<div class="recherche">
<?php 
    echo form_open('artiste/recherche');
?>
    <input id="date" type="date" placeholder="Date">
    <input class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect " value="Rechercher" type="submit"/>
    <a id="option">plus d'option</a>
    
    <input class="mdl-textfield__input" type="text" id="ville" name="ville" placeholder="Ville"/>
    
    
<?php
    echo form_close();
?>
    </div>