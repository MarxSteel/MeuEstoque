<?php
$ChPlaca = "SELECT * FROM firmware WHERE Tipo='1'";
$Cpl = $PDO->prepare($ChPlaca);
$Cpl->execute();

echo '<table id="tabEstr" class="table table-hover table-responsive" cellspacing="0">';
echo '<thead>
       <tr>
        <th>#</th>
        <th>Versão</th>
        <th>Data de Cadastro</th>
        <th>Modelo</th>
        <th>Placa</th>
        <th width="5px"></th>
        <th width="5px"></th>
       </tr>
      </thead>
      <tbody>';

  while ($R = $Cpl->fetch(PDO::FETCH_ASSOC)): 
  echo '<tr>';
  echo '<td>' . $R["id"] . '</td>';
  echo '<td>' . $R["fw_nome"] . '</td>';
  echo '<td>' . $R["DataCadastro"] . '</td>';
  echo '<td>' . $R["Modelo"] . '</td>';
  echo '<td>' . $R["Placa"] . '</td>';
  ?>
  <td>
   <a class="btn btn-success btn-sm btn-flat btn-block" href="javascript:abrir('AtAtend.php?ID=<?php echo $R["id"]; ?>');">
    <i class="fa fa-search"> Detalhes</i>
   </a>
  </td>
  <td>
   <a class="btn bg-purple btn-sm btn-flat btn-block" href="javascript:abrir('AtAtend.php?ID=<?php echo $R["id"]; ?>');">
    <i class="fa fa-download"> Baixar</i>
   </a>
  </td>
  <?php  echo '</tr>';
  endwhile;
?>
  </tbody>
</table>