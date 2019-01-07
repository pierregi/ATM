<?php echo form_open('Artiste/Inscription'); ?>

    <div class="form-group">
    <?php echo $nom ;?> 
    <label for="nom">Nom de l'artiste :</label>

    <input type="text" class="form-control" id="nom" name="nom" value="<?php if(null==form_error("nom")){ echo( set_value('nom',"",TRUE));}?>"   required/>

    
    </div>
    <div class="form-group">
    <?php echo $email ;?>
    <label for="email">E-mail :</label>
    <input type="email" class="form-control" id="email" name ="email"
           value="<?php if(null==form_error("email")){ echo(set_value('email',"",TRUE));}?>" required/>
    
    
    </div>


    <div class="form-group">
    
 <?php echo $annee ;?> 
    <label for="annee">Année de formation :</label>
    <input type="month" class="form-control" id="annee" name ="annee" pattern="[0-9]{4}" value="<?php if(null==form_error("annee")){ echo( set_value('annee',"",TRUE));}?>" required/>
    
    
    </div>


    <div class="form-group">
    <?php echo $password ;?>
    <label for="password">Mot de passe :</label>
<<<<<<< HEAD
    <input type="password" class="form-control" id="password" name ="password" pattern=".{4,}" required/>
=======
    <input type="password" class="form-control" id="password" name ="password" pattern="{4,}" required/>
>>>>>>> 6920c77981de2feda50c950e953c1ac0ca7957c1
    
    
    </div>
    
    
    <div class="form-group">
    <?php echo $password2 ;?>
    <label for="password2">Confirmer le mot de passe :</label>
<<<<<<< HEAD
    <input type="password" class="form-control" id="password2" name ="password2" pattern=".{4,}" required/>
=======
    <input type="password" class="form-control" id="password2" name ="password2" pattern="{4,}" required/>
>>>>>>> 6920c77981de2feda50c950e953c1ac0ca7957c1
    
    </div>
    <div class="" id="passwordStrength"></div>

    <input type="submit" class="btn btn-primary btn-lg" value="Inscription">
    <button type="button" class="btn btn-danger right btn-lg">Annuler</button>

<?php echo form_close(); ?>

