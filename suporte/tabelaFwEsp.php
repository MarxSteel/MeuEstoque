<?php
$ChPlaca = "SELECT * FROM cad_estoque WHERE es_cat='est'";
$Cpl = $PDO->prepare($ChPlaca);
$Cpl->execute();

echo '<table id="tabEstr" class="table table-hover" cellspacing="0">';
echo '<thead>
       <tr>
        <th width="10px">#</th>
        <th width="250px">Nome</th>
        <th width="250px">Descrição</th>
        <th></th>
       </tr>
      </thead>
      <tbody>';

  while ($R = $Cpl->fetch(PDO::FETCH_ASSOC)): 
  echo '<tr>';
  echo '<td>' . $R["id"] . '</td>';
  echo '<td>' . $R["es_nome"] . '</td>';
  echo '<td>' . $R["id"] . '</td>';
  ?>
  <td>
   <a class="btn btn-info btn-sm" href="javascript:abrir('VEst.php?ID=<?php echo $R["id"]; ?>');">
    <i class="fa fa-search"> Visualizar</i>
   </a>
  </td>
  <?php  echo '</tr>';
  endwhile;
?>
  </tbody>
</table>