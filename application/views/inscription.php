<?php echo form_open('Artiste/Inscription'); ?>
    <div class="form-group">
    
    <label for="nom">Nom de l'artiste :</label>
    <input type="text" class="form-control" id="nom">
    
    
    </div>
    <div class="form-group">
    
    <label for="email">E-mail :</label>
    <input type="email" class="form-control" id="email">
    
    
    </div>
    <div class="form-group">
    
    <label for="password">Mot de passe :</label>
    <input type="password" class="form-control" id="password">
    
    
    </div>
    
    
    <div class="form-group">
    
    <label for="password2">Confirmer le mot de passe :</label>
    <input type="password" class="form-control" id="password2">
    
    
    </div>
    
    
    <input type="submit" class="btn btn-primary btn-lg" value="Inscription"></button>
    <button type="button" class="btn btn-danger right btn-lg">Annuler</button>
</form>