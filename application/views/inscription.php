<?php echo form_open('Artiste/Inscription'); ?>

    <div class="form-group">
    
    <label for="nom">Nom de l'artiste :</label>
<<<<<<< HEAD

    <input type="text" class="form-control" id="nom" name="nom">
    
=======
    <input type="text" class="form-control" id="nom" name="nom" value="<?php if(null==form_error("nom")){ echo( set_value('nom',"",TRUE));}?>"  <?php echo $nom ;?>/>
        
>>>>>>> e63d5e0239985e16a21d93792f1b38ac180a4dc6
    
    </div>
    <div class="form-group">
    
    <label for="email">E-mail :</label>
    <input type="text" class="form-control" id="email" name ="email"
           value="<?php if(null==form_error("email")){ echo(set_value('email',"",TRUE));}?>"  <?php echo $email ;?>/>
    
    
    </div>


    <div class="form-group">
    
<<<<<<< HEAD
    <label for="date">Année de formation :</label>
    <input type="month" class="form-control" id="annee" name ="annee" pattern="[0-9]{4}" >
=======
    <label for="annee">Année de formation :</label>
    <input type="text" class="form-control" id="annee" name ="annee" value="<?php if(null==form_error("annee")){ echo( set_value('annee',"",TRUE));}?>"  <?php echo $annee ;?>/>
>>>>>>> e63d5e0239985e16a21d93792f1b38ac180a4dc6
    
    
    </div>


    <div class="form-group">
    
    <label for="password">Mot de passe :</label>
    <input type="password" class="form-control" id="password" name ="password" <?php echo $password ;?>/>
    
    
    </div>
    
    
    <div class="form-group">
    
    <label for="password2">Confirmer le mot de passe :</label>
    <input type="password" class="form-control" id="password2" name ="password2" <?php echo $password2 ;?> />
    
    </div>
    
    <input type="submit" class="btn btn-primary btn-lg" value="Inscription">
    <button type="button" class="btn btn-danger right btn-lg">Annuler</button>

<?php echo form_close(); ?>