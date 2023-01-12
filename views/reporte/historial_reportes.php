
<table class="table">
<thead>
  <tr>
    <th scope="col">Id Usuario</th>
    <th scope="col">Comentario</th>
    <th scope="col">Usuario</th>
  </tr>
</thead>
<?php while ($his = $historial->fetch_object()):?>
  <tbody>
    <tr>
      <th scope="row"><?=$his->Usuario_id?></th>
      <td><?=$his->Comentario?></td>
      <td><?=$his->usuario?></td>
    </tr>
  </tbody>
<?php endwhile;?>

</table>
