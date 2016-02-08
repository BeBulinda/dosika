<?php
$rsexec = mssql_query("SELECT * FROM content_type where state=1 ORDER BY name ASC" , $dbhandle);
$row_rsexec = mssql_fetch_assoc($rsexec);
$totalRows_rsexec = mssql_num_rows($rsexec);

 ?>
<select name="content_type_id" id="select3">
    <option value="0" selected="selected">---Select Content Type---</option>   
	<?php do { ?>
	<?php echo "<option value=\"".$row_rsexec['id']."\">".$row_rsexec['name']."</option>"; ?>
<?php

}
while ($row_rsexec = mssql_fetch_assoc($rsexec)); 
mssql_free_result($rsexec);

?></select>
