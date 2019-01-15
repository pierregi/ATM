    <h1>Confirmation des comptes</h1>
    <small><?php echo count($users); ?> compte(s) à confirmer</small>
    <hr>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">Email</th>
          <th scope="col">Année de formation</th>
          <th scope="col">Valider</th>
          <th scope="col">Supprimer</th>
        </tr>
      </thead>
      <tbody>


      <?php foreach($users as $user): ?>
            <tr>
                <th><?php echo $user["nom"]?></th>
                <th><?php echo $user["email"]?></th>
                <th><?php echo $user['anneedeformation'];?></th>
                <th><button class="btn btn-primary">Valider</button></th>
                <th><button class="btn btn-primary">Supprimer</button></th>
            </tr>
      <?php endforeach; ?>


      </tbody>
    </table>