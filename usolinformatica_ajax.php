<?php

include("dmconexion.php");
include("urecursos.php");

if(isset($_POST['cbestatuschange']))
{
   if(Derechos('Cerrar Solicitudes de Informatica') == false && $_POST['estatus'] == 111)
   {
      $sql = 'select idestatus from solinformatica where idsolicitud='.$_POST['idsolicitud'];
      $rs = mysql_query($sql) or die('Error de Consulta SQL: '.$sql);
      $row = mysql_fetch_array($rs);
      echo "vcl.$('cbestatus').value='".$row['idestatus']."';
            alert('No Tienes Derechos para Cerrar esta Solicitud');
             ";
   }
}
?>