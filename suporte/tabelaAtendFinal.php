<?php
$ChPlaca = "SELECT * FROM suporte WHERE Status='1'";
$Cpl = $PDO->prepare($ChPlaca);
$Cpl->execute();

echo '<table id="tabFinal" class="table table-hover table-responsive" cellspacing="0">';
echo '<thead>
       <tr>
        <th>#</th>
        <th>Atendente</th>
        <th>Revenda</th>
        <th>Descrição</th>
        <th width="5px">Status</th>
       </tr>
      </thead>
      <tbody>';

  while ($R = $Cpl->fetch(PDO::FETCH_ASSOC)): 
  echo '<tr>';
  echo '<td>' . $R["id"] . '</td>';
  echo '<td>' . $R["NomeTec"] . '</td>';
  echo '<td>' . $R["Revenda"] . '</td>';
  echo '<td>' . $R["Atendimento"] . '</td>';
  ?>
  <td>
   <a class="btn btn-info btn-sm" href="javascript:abrir('vAtend.php?ID=<?php echo $R["id"]; ?>');">
    <i class="fa fa-search"> Visualizar</i>
   </a>
  </td>
  <?php  echo '</tr>';
  endwhile;
?>
  </tbody>
</table>