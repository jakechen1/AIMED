<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
	human organ specific marker 1.0 by Fan Zhang and Hrishikesh Lokhande
-->
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Human Organ Specific Marker</title>
<meta name="Jake Y. Chen, " content="" />
<link rel="stylesheet" type="text/css" href="default.css" />
</head>
<body>


<html>
<body>
<script type="text/javascript">


	function filter (term, _id, cellNr){
		
	var suche = term;
	var table = document.getElementById(_id);	
	var ele;
	for (var r = 1; r < table.rows.length; r++){
		ele = table.rows[r].cells[cellNr].innerHTML.replace(/<[^>]+>/g,"");
		if (ele.toLowerCase().indexOf(suche)>=0 )
			table.rows[r].style.display = '';
		else table.rows[r].style.display = 'none';
	}
}

function adipose(_id,cellNr){
document.getElementById(_id).rows[1].cells[cellNr].innerHTML=Date();

}

</script>

<?php
$unigeneid = 'Hs.118127';
?>



<img src="Hs.139322_pharynx.png" width="850" height="450" usemap="#Map" />
<map name="Map" id="Map">
<area shape="rect" coords="89,45,102.5,450" href="#" onclick="filter('adipose','unigeneorgan',1)" alt="adipose" />
<area shape="rect" coords="102.5,45,116,450" href="#" onclick="filter('adrenal gland','unigeneorgan',1)" alt="adrenal gland" />
<area shape="rect" coords="116,45,129.5,450" href="#" onclick="filter('amnion','unigeneorgan',1)" alt="amnion" />
<area shape="rect" coords="129.5,45,143,450" href="#" onclick="filter('bladder','unigeneorgan',1)" alt="bladder" />
<area shape="rect" coords="143,45,156.5,450" href="#" onclick="filter('blood','unigeneorgan',1)" alt="blood" />
<area shape="rect" coords="156.5,45,170,450" href="#" onclick="filter('blood vessel','unigeneorgan',1)" alt="blood vessel" />
<area shape="rect" coords="170,45,183.5,450" href="#" onclick="filter('bone','unigeneorgan',1)" alt="bone" />
<area shape="rect" coords="183.5,45,197,450" href="#" onclick="filter('bone marrow','unigeneorgan',1)" alt="bone marrow" />
<area shape="rect" coords="197,45,210.5,450" href="#" onclick="filter('brain','unigeneorgan',1)" alt="brain" />
<area shape="rect" coords="210.5,45,224,450" href="#" onclick="filter('breast','unigeneorgan',1)" alt="breast" />
<area shape="rect" coords="224,45,237.5,450" href="#" onclick="filter('cervix','unigeneorgan',1)" alt="cervix" />
<area shape="rect" coords="237.5,45,251,450" href="#" onclick="filter('colon','unigeneorgan',1)" alt="colon" />
<area shape="rect" coords="251,45,264.5,450" href="#" onclick="filter('ear','unigeneorgan',1)" alt="ear" />
<area shape="rect" coords="264.5,45,278,450" href="#" onclick="filter('embryo','unigeneorgan',1)" alt="embryo" />
<area shape="rect" coords="278,45,291.5,450" href="#" onclick="filter('esophagus','unigeneorgan',1)" alt="esophagus" />
<area shape="rect" coords="291.5,45,305,450" href="#" onclick="filter('eye','unigeneorgan',1)" alt="eye" />
<area shape="rect" coords="305,45,318.5,450" href="#" onclick="filter('gallbladder','unigeneorgan',1)" alt="gallbladder" />
<area shape="rect" coords="318.5,45,332,450" href="#" onclick="filter('ganglia','unigeneorgan',1)" alt="ganglia" />
<area shape="rect" coords="332,45,345.5,450" href="#" onclick="filter('heart','unigeneorgan',1)" alt="heart" />
<area shape="rect" coords="345.5,45,359,450" href="#" onclick="filter('kidney','unigeneorgan',1)" alt="kidney" />
<area shape="rect" coords="359,45,372.5,450" href="#" onclick="filter('larynx','unigeneorgan',1)" alt="larynx" />
<area shape="rect" coords="372.5,45,386,450" href="#" onclick="filter('leiomios','unigeneorgan',1)" alt="leiomios" />
<area shape="rect" coords="386,45,399.5,450" href="#" onclick="filter('liver','unigeneorgan',1)" alt="liver" />
<area shape="rect" coords="399.5,45,413,450" href="#" onclick="filter('lung','unigeneorgan',1)" alt="lung" />
<area shape="rect" coords="413,45,426.5,450" href="#" onclick="filter('lymph','unigeneorgan',1)" alt="lymph" />
<area shape="rect" coords="426.5,45,440,450" href="#" onclick="filter('lymph node','unigeneorgan',1)" alt="lymph node" />
<area shape="rect" coords="440,45,453.5,450" href="#" onclick="filter('mouth','unigeneorgan',1)" alt="mouth" />
<area shape="rect" coords="453.5,45,467,450" href="#" onclick="filter('muscle','unigeneorgan',1)" alt="muscle" />
<area shape="rect" coords="467,45,480.5,450" href="#" onclick="filter('nerve','unigeneorgan',1)" alt="nerve" />
<area shape="rect" coords="480.5,45,494,450" href="#" onclick="filter('ovary','unigeneorgan',1)" alt="ovary" />
<area shape="rect" coords="494,45,507.5,450" href="#" onclick="filter('pancreas','unigeneorgan',1)" alt="pancreas" />
<area shape="rect" coords="507.5,45,521,450" href="#" onclick="filter('parathyroid gland','unigeneorgan',1)"alt="parathyroid gland" />
<area shape="rect" coords="521,45,534.5,450" href="#" onclick="filter('peritoneum','unigeneorgan',1)" alt="peritoneum" />
<area shape="rect" coords="534.5,45,548,450" href="#" onclick="filter('pharynx','unigeneorgan',1)" alt="pharynx" />
<area shape="rect" coords="548,45,561.5,450" href="#" onclick="filter('pituitary','unigeneorgan',1)" alt="pituitary" />
<area shape="rect" coords="561.5,45,575,450" href="#" onclick="filter('placenta','unigeneorgan',1)" alt="placenta" />
<area shape="rect" coords="575,45,588.5,450" href="#" onclick="filter('prostate','unigeneorgan',1)" alt="prostate" />
<area shape="rect" coords="588.5,45,602,450" href="#" onclick="filter('rectum','unigeneorgan',1)" alt="rectum" />
<area shape="rect" coords="602,45,615.5,450" href="#" onclick="filter('salivary gland','unigeneorgan',1)" alt="salivary gland" />
<area shape="rect" coords="615.5,45,629,450" href="#" onclick="filter('skin','unigeneorgan',1)" alt="skin" />
<area shape="rect" coords="629,45,642.5,450" href="#" onclick="filter('small intestine','unigeneorgan',1)" alt="small intestine" />
<area shape="rect" coords="642.5,45,656,450" href="#" onclick="filter('spinal cord','unigeneorgan',1)" alt="spinal cord" />
<area shape="rect" coords="656,45,669.5,450" href="#" onclick="filter('spleen','unigeneorgan',1)" alt="spleen" />
<area shape="rect" coords="669.5,45,683,450" href="#" onclick="filter('stomach','unigeneorgan',1)" alt="stomach" />
<area shape="rect" coords="683,45,696.5,450" href="#" onclick="filter('testis','unigeneorgan',1)" alt="testis" />
<area shape="rect" coords="696.5,45,710,450" href="#" onclick="filter('thymus','unigeneorgan',1)" alt="thymus" />
<area shape="rect" coords="710,45,723.5,450" href="#" onclick="filter('thyroid','unigeneorgan',1)" alt="thyroid" />
<area shape="rect" coords="723.5,45,737,450" href="#" onclick="filter('tonsil','unigeneorgan',1)" alt="tonsil" />
<area shape="rect" coords="737,45,750.5,450" href="#" onclick="filter('trachea','unigeneorgan',1)" alt="trachea" />
<area shape="rect" coords="750.5,45,764,450" href="#" onclick="filter('umbilical cord','unigeneorgan',1)" alt="umbilical cord" />
<area shape="rect" coords="764,45,777.5,450" href="#" onclick="filter('ureter','unigeneorgan',1)" alt="ureter" />
<area shape="rect" coords="777.5,45,791,450" href="#" onclick="filter('uterus','unigeneorgan',1)" alt="uterus" />
<area shape="rect" coords="774,307,791,409" href="#" alt="" />
</map>

<?php
include "dbconnect.php";
?> 

<?php
$s= oci_parse($conn,"select unigeneorganlibidnamen.* from unigeneorganlibidnamen where unigeneid = :unigeneid");
oci_bind_by_name($s, ":unigeneid", $unigeneid);
oci_execute($s);
?> 




<table width="95%" class="sortable" id="unigeneorgan">
  <tr>
    <th>UnigeneID
    <th>Organ
    <th>LibID
    <th>Name
    <th>#EST
  </tr>

 <?php 
while($row = oci_fetch_array($s))
{
	$unigeneid = $row["UNIGENEID"];
	$organ = $row["ORGAN"];
	$libid = $row["LIBID"];	

	print '<tr>';
	print '<td>' . $unigeneid;
	print '<td>' . $organ;
    print '<td>';
		print "<a href='http://www.ncbi.nlm.nih.gov/biosample/$libid' target='_blank'>$libid</a>"; 
    print '<td>' . $row["NAME"];
    print '<td>' . $row["N"];
 	print '</tr>';

}
?>

</table>





</body>
</html>



  
  
  <p>&nbsp;</p>
  <p>&copy; <a href="http://bio.informatics.iupui.edu/">Discovery Informatics and Computing Group</a>. All rights reserved.</p>
  </p>


</body>
</html>
