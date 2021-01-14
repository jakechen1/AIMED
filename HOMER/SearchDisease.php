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
include "dbconnect.php";
?>
<?php

$term = trim($_POST['term']);

$type = 'disease';
$s= oci_parse($conn, "select a.genename, a.diseaseid, a.diseasename, DiseaseOrganFinal3.organ from (SELECT genename, diseaseid, diseasename FROM CTD_gene_disease_relations WHERE CONTAINS(diseasename, :disease, 1) > 0) a inner join DiseaseOrganFinal3 on a.diseaseid = DiseaseOrganFinal3.mshid");
oci_bind_by_name($s, ":disease", $term);
oci_execute($s);

print $type . " = $term<br>";
?>

<table width="95%" class="sortable">
  <tr>
    <th>GeneName
    <th>DiseaseID
    <th>DiseaseName
    <th>organ
  </tr>

 <?php 
 
while($row = oci_fetch_array($s))
{
	$genename = $row["GENENAME"];
	$diseaseid = $row["DISEASEID"];
	$diseasename = $row["DISEASENAME"];
	$organ = $row["ORGAN"];
	
  print '<tr>';
	print '<td>' . $genename;
	print '<td>' . $diseaseid;
    print '<td>' . $diseasename;
    print '<td>' . $organ;
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
