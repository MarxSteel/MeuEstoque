<?php
$ChPlaca = "SELECT * FROM suporte";
$Cpl = $PDO->prepare($ChPlaca);
$Cpl->execute();

echo '<table id="tabGeral" class="table table-hover table-responsive" cellspacing="0">';
echo '<thead>
       <tr>
        <th>#</th>
        <th>Atendente</th>
        <th>Revenda</th>
        <th>Descrição</th>
        <th width="5px">Status</th>
        <th width="5px"></th>
       </tr>
      </thead>
      <tbody>';

  while ($R = $Cpl->fetch(PDO::FETCH_ASSOC)): 
  echo '<tr>';
  echo '<td>' . $R["id"] . '</td>';
  echo '<td>' . $R["NomeTec"] . '</td>';
  echo '<td>' . $R["Revenda"] . '</td>';
  echo '<td>' . $R["Atendimento"] . '</td>';
  $Status = $R["Status"];
  if ($Status === "1") {
    echo '<td><button class="btn bg-green btn-sm btn-block btn-flat" href="#">SOLUCIONADO</button></td>';
  }
  elseif ($Status === "2") {
    echo '<td><button class="btn btn-primary btn-sm btn-block btn-flat" href="#">ENCAMINHADO À HENRY</button></td>';
  }
  elseif ($Status === "3") {
    echo '<td><button class="btn bg-orange btn-sm btn-block btn-flat" href="#">PENDENTE</button></td>';
  }
  elseif ($Status === "4") {
    echo '<td><button class="btn bg-red btn-sm btn-block btn-flat" href="#">NÃO SOLUCIONADO</button></td>';
  }
  else{
    echo '<td></td>';
  }
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