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
$organ52 = array("adipose", "adrenal gland", "amnion", "bladder", "blood", "blood vessel", "bone", "bone marrow", "brain", "breast", "cervix", "colon", "ear", "embryo", "esophagus", "eye", "gallbladder", "ganglia", "heart", "kidney", "larynx", "leiomios", "liver", "lung", "lymph", "lymph node", "mouth", "muscle", "nerve", "ovary", "pancreas", "parathyroid gland", "peritoneum", "pharynx", "pituitary", "placenta", "prostate", "rectum", "salivary gland", "skin", "small intestine", "spinal cord", "spleen", "stomach", "testis", "thymus", "thyroid", "tonsil", "trachea", "umbilical cord", "ureter", "uterus");

$term = trim($_POST['term']);
$type = 'organ';

$s= oci_parse($conn,"select b.unigeneid, b.ipiid, b.organ, b.pvalue,b.zscore,b.source, HIP2IPIPeptide.hits from (select ipiHUMANxrefsoutput.ipiid, a.* from (select * from dbest_tisged_hpa_unigene where organ = :organ) a inner join ipiHUMANxrefsoutput on a.unigeneid = ipiHUMANxrefsoutput.unigeneid) b left join HIP2IPIPeptide on b.ipiid = HIP2IPIPeptide.ipiid");
oci_bind_by_name($s, ":organ", $term);
oci_execute($s);

print $type . " = $term<br>";

?>



<table width="95%" class="sortable">
  <tr>
    <th>UnigeneID
    <th>IPIID
    <th>Organ
    <th>Pvalue
    <th>Zscore
    <th>Source
    <th>Hits
  </tr>

 <?php 
 
 
while($row = oci_fetch_array($s))
{
	$unigeneid = $row["UNIGENEID"];
	$ipiid = $row["IPIID"];
	$organ = $row["ORGAN"];
    $source = $row["SOURCE"];
	$pvalue = sprintf('%.2e', $row["PVALUE"]);
	
  print '<tr>';
	print '<td>' . $unigeneid;
	print '<td>' . $ipiid;
	print '<td>' . $organ;
    print '<td>';
	if ($source == "dbEST")
	{
		print "<a href='PvalueImage.php?unigeneid=$unigeneid&organ=$organ' target='_blank'>$pvalue</a>"; 
	}
    
	print '<td>' . $row["ZSCORE"];
    print '<td>' . $row["SOURCE"];
	print '<td>' . $row["HITS"];
 	print '</tr>';
}
?>
</table><!-- InstanceEndEditable -->
        
        
  </div> 
	<!---maincontent--->
        
	<div id="footer">
	  <p>Copyright 2011 - Discovery Informatics and Computing Group</p>
       
	</div> <!---footer--->
      
</div> <!---outerwrapper--->
	 
</body>
<!-- InstanceEnd --></html>
