<?php
<object class="umanuales_derechos" name="umanuales_derechos" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Manuales Derechos</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">umanuales_derechos</property>
  <property name="Width">800</property>
  <property name="OnShow">umanuales_derechosShow</property>
  <object class="Label" name="Label1" >
    <property name="Caption">Derecho X Archivo:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">128</property>
    <property name="Width">139</property>
  </object>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Cached"></property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="HiddenField" name="hfestatus" >
      <property name="Height">18</property>
      <property name="Left">516</property>
      <property name="Name">hfestatus</property>
      <property name="Top">16</property>
      <property name="Value">0</property>
      <property name="Width">74</property>
    </object>
    <object class="HiddenField" name="hfcount" >
      <property name="Height">18</property>
      <property name="Left">597</property>
      <property name="Name">hfcount</property>
      <property name="Top">16</property>
      <property name="Width">52</property>
    </object>
    <object class="HiddenField" name="hfidpuesto" >
      <property name="Height">18</property>
      <property name="Left">656</property>
      <property name="Name">hfidpuesto</property>
      <property name="Top">16</property>
      <property name="Width">78</property>
    </object>
    <object class="HiddenField" name="hfvalor" >
      <property name="Height">18</property>
      <property name="Left">739</property>
      <property name="Name">hfvalor</property>
      <property name="Top">16</property>
      <property name="Width">53</property>
    </object>
    <object class="Button" name="btnguardar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">140</property>
      <property name="Name">btnguardar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Button" name="btngcerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">224</property>
      <property name="Name">btngcerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btngcerrarClick</property>
    </object>
    <object class="Button" name="btnliberar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Liberar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">344</property>
      <property name="Name">btnliberar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnliberarClick</property>
    </object>
    <object class="Button" name="btnbloquear" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Bloquear</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">432</property>
      <property name="Name">btnbloquear</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnbloquearClick</property>
    </object>
    <object class="Label" name="lbtitulo" >
      <property name="Caption"><![CDATA[&lt;FONT color=#004080&gt;&lt;STRONG&gt;lbtitulo &lt;/STRONG&gt;&lt;/FONT&gt;]]></property>
      <property name="Font">
            <property name="Color">#004080</property>
            <property name="Size">12</property>
            <property name="Weight">bolder</property>
      </property>
      <property name="Height">19</property>
      <property name="Left">5</property>
      <property name="Name">lbtitulo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">15</property>
      <property name="Width">123</property>
    </object>
  </object>
  <object class="Label" name="lblderechos" >
    <property name="Caption">lblderechos</property>
    <property name="Height">13</property>
    <property name="Left">21</property>
    <property name="Name">lblderechos</property>
    <property name="Top">152</property>
    <property name="Width">611</property>
  </object>
  <object class="ComboBox" name="cbareas" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">87</property>
    <property name="Name">cbareas</property>
    <property name="ParentColor">0</property>
    <property name="Top">70</property>
    <property name="Width">439</property>
    <property name="OnChange">cbareasChange</property>
  </object>
  <object class="ComboBox" name="cbcontenido" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">87</property>
    <property name="Name">cbcontenido</property>
    <property name="ParentColor">0</property>
    <property name="Top">98</property>
    <property name="Width">440</property>
    <property name="OnChange">cbcontenidoChange</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Area:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">73</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Titulo:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">101</property>
    <property name="Width">75</property>
  </object>
  <object class="MySQLQuery" name="sqlderechos" >
        <property name="Left">129</property>
        <property name="Top">273</property>
    <property name="Active"></property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlderechos</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
