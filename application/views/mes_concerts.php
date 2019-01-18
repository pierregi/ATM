<style>

    .dataTables_filter {
        float: left !important;
    }
    
    table.dataTable thead th {
          border-bottom: 0;
    }
    table.dataTable tfoot th {
          border-top: 0;
    }
    #concerts{
        margin-top: 4em;
    }
    
    table.dataTable.no-footer {
  border-bottom: 0;
}

</style>
<h1>Mes concerts</h1>

<hr>    
<small><?php echo count($concerts); ?> concert(s) trouvé(s)</small>
<br><br>

<table class="table" id="concerts">
  <thead>
    <tr>
      <th>Date</th>
      <th>Salle</th>
      <th>Ville</th>
      <th>Accessible</th>
      <th>Projet</th>
    </tr>
  </thead>
  <tbody>
        <?php foreach($concerts as $concert): ?>
        <tr>
          <td><?php echo $concert['date']; ?></td>
          <td><?php echo $concert['salle']; ?></td>
          <td><?php echo $concert['ville']; ?></td>
          <td><?php if($concert['est_accessible'] == 'f'){echo "Non";}else{echo "Oui";}?></td>
          <?php if (isset($concert['projet'])): ?>
            <td><?php echo $concert['projet']; ?></td>
          <?php else: ?>
            <td></td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
  </tbody>
</table>

<script>
    $(document).ready( function () {
        $('#concerts').DataTable({
            paging: false,
            processing: false,
            bInfo: false,
            "oLanguage": {
                "sSearch": "Rechercher un concert:"
             }
        });
    } );
</script>