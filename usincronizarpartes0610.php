<?php
include("dmconexion.php");
include("urecursos.php");
	session_start();
	if(!isset($_SESSION["login"]))
   {
   	redirect("login.php");
   }
require_once("vcl/vcl.inc.php");
use_unit("mysql.inc.php");

ini_set("memory_limit", "50M");
ini_set("max_execution_time", "500");

if(Derechos('Sincronizar Partes') == false)
{
   echo '<script language="javascript" type="text/javascript">
         alert(\' No tienes Derechos para Sincronizar Partes\');
			document.location.href("menu.php");
			</script>';
}
else
{
   // Connect to MSSQL
   $mslink = mssql_pconnect(GetConfiguraciones('serverSQL'), 'sa', 'sa');

   if(!$mslink)
   {
      echo '<script language="javascript" type="text/javascript">
            alert(\'No se conecto a MSSQL\');
            </script>';
   }
   else
   {
      //conectar con gedas
      mssql_select_db('gedas', $mslink);
      //conexion mysql
      $mylink = mysql_connect(GetConfiguraciones('serverMySQL'), 'root', 'freedom');
      if(!$mylink)
      {
         echo '<script language="javascript" type="text/javascript">
               alert(\'No se pudo conectar a MySQL\');
               </script>';
      }
      else
      {
         mysql_select_db('crm', $mylink);

         //#######################	partes	###################################
         //vaciar la tabla repartes mysql
         $myrs = mysql_query('Delete from repartesgds')or die('Error en SQL: Delete from repartesgds');
         //select repartes mssql
         $sql = "select rtrim(AlmCve) as idalmacen, rtrim(Pstatus) as estatus,
                  rtrim(PUnidMed) as unidad, rtrim(PLinea) as linea,
                  case when rtrim(PAtipMon) like '%MXP%' then '1'
                  when rtrim(PAtipMon) like '%USD%' then '2' else '0' end as moneda,
                  rtrim(Pparte) as clave,
                  rtrim(Pdescrip) as descripcion, rtrim(Pexis) as exis,
                  rtrim(PDis) as dis,	rtrim(PCosAnt) as costoant,
                  rtrim(Pcosto) as costo, rtrim(PPromedio) as prom,
                  rtrim(Ppublic) as precio, rtrim(Pespecial) as esp,
                  case when rtrim(Ppasillo)='' then '0' else rtrim(Ppasillo) end as pas,
                  case when rtrim(Pubica)='' then '0' else rtrim(Pubica) end as ubicacion,
                  case when Puti is null then '0' else rtrim(Puti) end as utilidad,
                  rtrim(Pstockmin) as smin, rtrim(Pstockmax) as smax,
                  rtrim(pfecEnt) as fentrada, rtrim(Pfecsal) as fsalida
                  from repartes where pparte!=''";
         $rs = mssql_query($sql)or die('Error en la consulta SQL '.$sql);
         $c=1;
         while($row = mssql_fetch_array($rs))
         {
            $mysql = 'insert into repartesgds (idparte,idalmacen,cveparte,estatus,unidadmedida,linea,
                     moneda,descripcion,existencia,disponible,costoanterior,costo,costoprom,
                     precio,precioesp,fecultentrada,fecultsalida,pasillo,ubicacion,putilidad,stockmin,stockmax)
                     values ('.$c.', ' . $row['idalmacen'] . ',"' . $row['clave'] . '","' . $row['estatus'] . '","' . $row['unidad'] .
                     '","' . $row['linea'] . '","' . $row['moneda'] . '","' . str_replace('"', "", $row['descripcion']) . '",' .
                      $row['exis'] . ',' . $row['dis'] . ',' . $row['costoant'] . ',' . $row['costo'] . ',' . $row['prom'] . ',
						   ' . $row['precio'] . ',' . $row['esp'] . ',"' . $row['fentrada'] . '","' . $row['fsalida'] . '",
						   "' . $row['pasillo'] . '","' . $row['ubicacion'] . '",' . $row['utilidad'] . ',' . $row['smin'] . ',' .
                     $row['smax'] . ')';
            $myrs = mysql_query($mysql)or die('Error en el SQL: ' . $mysql);
            $c++;
         }
         $myrs = mysql_query('Delete from repartes')or die('Error en SQL: Delete from repartesgds');
         $myrs = mysql_query('ALTER TABLE repartes AUTO_INCREMENT = 1') or die('Error en SQL: Alter Table');
         for($i=1;$i<=3;$i++)
         {
               $s = 'insert into repartes (idalmacen,cveparte,estatus,unidadmedida,linea,moneda,descripcion,existencia,
                     disponible,backorder,ordenadas,costoanterior, costo,costoprom,precio,precioesp,fecultentrada,fecultsalida,origen,pasillo,ubicacion,putilidad,stockmin,stockmax)
                       SELECT '.$i.' as idalmacen,r.cveparte,r.estatus,r.unidadmedida,r.linea,r.moneda,r.descripcion,r.existencia,r.disponible,r.backorder,r.ordenadas,r.costoanterior,
                       r.costo,r.costoprom,r.precio,r.precioesp,r.fecultentrada,r.fecultsalida,r.origen,r.pasillo,r.ubicacion,r.putilidad,r.stockmin,r.stockmax
                       FROM repartesgds AS r GROUP BY cveparte';
               $r = mysql_query($s)or die('Error en el SQL: ' . $s);
         }
      }
   }
   echo '<script language="javascript" type="text/javascript">
         alert(\'Finalizo la Sincronizacion \');
			document.location.href("menu.php");
       </script>';
   mssql_close($mslink);
   mysql_close($mylink);
}
?>