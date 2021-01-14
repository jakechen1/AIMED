<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/hosm.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hommer: Human Organ-specific Molecular Marker Electrical Repository</title>
<meta name="keywords" content="organ-specific" />
<meta name="description" content="HOSM： Human Organ-Specific Biomarker" />
<meta name="author" content="Jake Y. Chen, Fan Zhang" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="outerwrapper">

    <div id="header">      
</div> <!---header--->
    
    <div id="navi">
    	<ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="browse.html">Browse</a></li>
            <li><a href="download.html">Download</a></li>            
            <li><a href="help.html">Help</a></li>
            <li><a href="statistics.html">Statistics</a></li>
            <li><a href="about.html">About Us</a></li>
        </ul>
    
    </div> <!---navi--->
    
	<div id="maincontent"><!-- InstanceBeginEditable name="EditRegion1" -->
    <?php
$unigeneid = $_GET['unigeneid'];
$organ = $_GET['organ'];

print "<IMG src='./images/$unigeneid".'_'. "$organ.png' width='850' height='450' usemap='#Map'/>";
?>

<script type="text/javascript">

	function filter (term, _id, cellNr){
		
	var suche = term;
	var table = document.getElementById(_id);	
	var ele;
	for (var r = 1; r < table.rows.length; r++){
		ele = table.rows[r].cells[cellNr].innerHTML.replace(/<[^>]+>/g,"");		
		if (ele == suche )
			table.rows[r].style.display = '';
		else table.rows[r].style.display = 'none';
	}
}
</script>

<map name="Map" id="Map">
<area shape="rect" coords="104,45,117.2,450" href="#" onclick="filter('adipose','unigeneorgan',1)" alt="adipose" />
<area shape="rect" coords="117.2,45,130.4,450" href="#" onclick="filter('adrenal gland','unigeneorgan',1)" alt="adrenal gland" />
<area shape="rect" coords="130.4,45,143.6,450" href="#" onclick="filter('amnion','unigeneorgan',1)" alt="amnion" />
<area shape="rect" coords="143.6,45,156.8,450" href="#" onclick="filter('bladder','unigeneorgan',1)" alt="bladder" />
<area shape="rect" coords="156.8,45,170,450" href="#" onclick="filter('blood','unigeneorgan',1)" alt="blood" />
<area shape="rect" coords="170,45,183.2,450" href="#" onclick="filter('blood vessel','unigeneorgan',1)" alt="blood vessel" />
<area shape="rect" coords="183.2,45,196.4,450" href="#" onclick="filter('bone','unigeneorgan',1)" alt="bone" />
<area shape="rect" coords="196.4,45,209.6,450" href="#" onclick="filter('bone marrow','unigeneorgan',1)" alt="bone marrow" />
<area shape="rect" coords="209.6,45,222.8,450" href="#" onclick="filter('brain','unigeneorgan',1)" alt="brain" />
<area shape="rect" coords="222.8,45,236,450" href="#" onclick="filter('breast','unigeneorgan',1)" alt="breast" />
<area shape="rect" coords="236,45,249.2,450" href="#" onclick="filter('cervix','unigeneorgan',1)" alt="cervix" />
<area shape="rect" coords="249.2,45,262.4,450" href="#" onclick="filter('colon','unigeneorgan',1)" alt="colon" />
<area shape="rect" coords="262.4,45,275.6,450" href="#" onclick="filter('ear','unigeneorgan',1)" alt="ear" />
<area shape="rect" coords="275.6,45,288.8,450" href="#" onclick="filter('embryo','unigeneorgan',1)" alt="embryo" />
<area shape="rect" coords="288.8,45,302,450" href="#" onclick="filter('esophagus','unigeneorgan',1)" alt="esophagus" />
<area shape="rect" coords="302,45,315.2,450" href="#" onclick="filter('eye','unigeneorgan',1)" alt="eye" />
<area shape="rect" coords="315.2,45,328.4,450" href="#" onclick="filter('gallbladder','unigeneorgan',1)" alt="gallbladder" />
<area shape="rect" coords="328.4,45,341.6,450" href="#" onclick="filter('ganglia','unigeneorgan',1)" alt="ganglia" />
<area shape="rect" coords="341.6,45,354.8,450" href="#" onclick="filter('heart','unigeneorgan',1)" alt="heart" />
<area shape="rect" coords="354.8,45,368,450" href="#" onclick="filter('kidney','unigeneorgan',1)" alt="kidney" />
<area shape="rect" coords="368,45,381.2,450" href="#" onclick="filter('larynx','unigeneorgan',1)" alt="larynx" />
<area shape="rect" coords="381.2,45,394.4,450" href="#" onclick="filter('leiomios','unigeneorgan',1)" alt="leiomios" />
<area shape="rect" coords="394.4,45,407.6,450" href="#" onclick="filter('liver','unigeneorgan',1)" alt="liver" />
<area shape="rect" coords="407.6,45,420.8,450" href="#" onclick="filter('lung','unigeneorgan',1)" alt="lung" />
<area shape="rect" coords="420.8,45,434,450" href="#" onclick="filter('lymph','unigeneorgan',1)" alt="lymph" />
<area shape="rect" coords="434,45,447.2,450" href="#" onclick="filter('lymph node','unigeneorgan',1)" alt="lymph node" />
<area shape="rect" coords="447.2,45,460.4,450" href="#" onclick="filter('mouth','unigeneorgan',1)" alt="mouth" />
<area shape="rect" coords="460.4,45,473.6,450" href="#" onclick="filter('muscle','unigeneorgan',1)" alt="muscle" />
<area shape="rect" coords="473.6,45,486.8,450" href="#" onclick="filter('nerve','unigeneorgan',1)" alt="nerve" />
<area shape="rect" coords="486.8,45,500,450" href="#" onclick="filter('ovary','unigeneorgan',1)" alt="ovary" />
<area shape="rect" coords="500,45,513.2,450" href="#" onclick="filter('pancreas','unigeneorgan',1)" alt="pancreas" />
<area shape="rect" coords="513.2,45,526.4,450" href="#" onclick="filter('parathyroid gland','unigeneorgan',1)"alt="parathyroid gland" />
<area shape="rect" coords="526.4,45,539.6,450" href="#" onclick="filter('peritoneum','unigeneorgan',1)" alt="peritoneum" />
<area shape="rect" coords="539.6,45,552.8,450" href="#" onclick="filter('pharynx','unigeneorgan',1)" alt="pharynx" />
<area shape="rect" coords="552.8,45,566,450" href="#" onclick="filter('pituitary','unigeneorgan',1)" alt="pituitary" />
<area shape="rect" coords="566,45,579.2,450" href="#" onclick="filter('placenta','unigeneorgan',1)" alt="placenta" />
<area shape="rect" coords="579.2,45,592.4,450" href="#" onclick="filter('prostate','unigeneorgan',1)" alt="prostate" />
<area shape="rect" coords="592.4,45,605.6,450" href="#" onclick="filter('rectum','unigeneorgan',1)" alt="rectum" />
<area shape="rect" coords="605.6,45,618.8,450" href="#" onclick="filter('salivary gland','unigeneorgan',1)" alt="salivary gland" />
<area shape="rect" coords="618.8,45,632,450" href="#" onclick="filter('skin','unigeneorgan',1)" alt="skin" />
<area shape="rect" coords="632,45,645.2,450" href="#" onclick="filter('small intestine','unigeneorgan',1)" alt="small intestine" />
<area shape="rect" coords="645.2,45,658.4,450" href="#" onclick="filter('spinal cord','unigeneorgan',1)" alt="spinal cord" />
<area shape="rect" coords="658.4,45,671.6,450" href="#" onclick="filter('spleen','unigeneorgan',1)" alt="spleen" />
<area shape="rect" coords="671.6,45,684.8,450" href="#" onclick="filter('stomach','unigeneorgan',1)" alt="stomach" />
<area shape="rect" coords="684.8,45,698,450" href="#" onclick="filter('testis','unigeneorgan',1)" alt="testis" />
<area shape="rect" coords="698,45,711.2,450" href="#" onclick="filter('thymus','unigeneorgan',1)" alt="thymus" />
<area shape="rect" coords="711.2,45,724.4,450" href="#" onclick="filter('thyroid','unigeneorgan',1)" alt="thyroid" />
<area shape="rect" coords="724.4,45,737.6,450" href="#" onclick="filter('tonsil','unigeneorgan',1)" alt="tonsil" />
<area shape="rect" coords="737.6,45,750.8,450" href="#" onclick="filter('trachea','unigeneorgan',1)" alt="trachea" />
<area shape="rect" coords="750.8,45,764,450" href="#" onclick="filter('umbilical cord','unigeneorgan',1)" alt="umbilical cord" />
<area shape="rect" coords="764,45,777.2,450" href="#" onclick="filter('ureter','unigeneorgan',1)" alt="ureter" />
<area shape="rect" coords="777.2,45,790.4,450" href="#" onclick="filter('uterus','unigeneorgan',1)" alt="uterus" />

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
    <th>#EST
    <th>LibID
	<th>Name
    <th>PubmedID
    
  </tr>

 <?php 
while($row = oci_fetch_array($s))
{
	$unigeneid = $row["UNIGENEID"];
	$organ = $row["ORGAN"];
	$libid = $row["LIBID"];	
	$pubmedid = $row["PUBMEDID"];	

	print '<tr>';
	print '<td>' . $unigeneid;
	print '<td>' . $organ;
	print '<td>' . $row["N"];
    print '<td>';
		print "<a href='http://www.ncbi.nlm.nih.gov/biosample/$libid' target='_blank'>$libid</a>";   
	print '<td>' . $row["NAME"];
	$pubmedid_array = split(";", $pubmedid);
	print '<td>';

	$str = "";
	foreach($pubmedid_array as $values)
	{
		$str = $str . "<a href='http://www.ncbi.nlm.nih.gov/pubmed/$values' target='_blank'>$values</a>;";   
	}
	print rtrim($str, ';'); 
	
 	print '</tr>';

}
?>

</table>






<!-- InstanceEndEditable -->
        
        
  </div> 
	<!---maincontent--->
        
	<div id="footer">
	  <p>Copyright 2011 - Discovery Informatics and Computing Group</p>
       
	</div> <!---footer--->
      
</div> <!---outerwrapper--->
	 
</body>
<!-- InstanceEnd --></html>
