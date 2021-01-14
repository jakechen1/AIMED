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
if (preg_match('/^Hs./', $term))
{
$type = 'unigene';

$s= oci_parse($conn,"select * from dbest_tisged_hpa_unigene where unigeneid = :unigeneid");
oci_bind_by_name($s, ":unigeneid", $term);
oci_execute($s);

$cid = substr($term, 3);
print $type." = ". "<a href='http://www.ncbi.nlm.nih.gov/UniGene/clust.cgi?ORG=Hs&CID=$cid' target='_blank'>$term</a>"; 

}
elseif (preg_match('/^IPI[0-9]*$/', $term))
{
$type = 'IPI';

$s= oci_parse($conn,"select a.ipiid, dbest_tisged_hpa_unigene.* from ((select unigeneid, ipiid from ipiHUMANxrefsoutput where ipiid = :ipiid) a) inner join dbest_tisged_hpa_unigene on  a.unigeneid = dbest_tisged_hpa_unigene.unigeneid");
oci_bind_by_name($s, ":ipiid", $term);
oci_execute($s);
print $type." = $term<br>";

$p= oci_parse($conn, "select * from HIP2IPIPeptide where ipiid = :ipiid");
oci_bind_by_name($p, ":ipiid", $term);
oci_execute($p);
}
elseif (preg_match('/_HUMAN/', $term))
{
$type = 'Uniprot_ID';
$s= oci_parse($conn,"select a.uniprotid, dbest_tisged_hpa_unigene.* from ((select unigeneid, uniprotid from idmappingselectedoutput3 where uniprotid = :uniprotid) a) inner join dbest_tisged_hpa_unigene on  a.unigeneid = dbest_tisged_hpa_unigene.unigeneid");
oci_bind_by_name($s, ":uniprotid", $term);
oci_execute($s);
print $type." = $term<br>";

$p= oci_parse($conn, "select a.uniprotid, HIP2IPIPeptide.* from ((select uniprotid, ipiid from uniprot2ipi where uniprotid = :uniprotid) a) inner join HIP2IPIPeptide on  a.ipiid = HIP2IPIPeptide.ipiid");
oci_bind_by_name($p, ":uniprotid", $term);
oci_execute($p);

}
elseif (preg_match('/^[1-9][0-9]*$/', $term))
{
$type = 'gene_id';

$s= oci_parse($conn,"select a.geneid, dbest_tisged_hpa_unigene.* from ((select unigeneid, geneid from hsoutput where geneid = :geneid) a) inner join dbest_tisged_hpa_unigene on  a.unigeneid = dbest_tisged_hpa_unigene.unigeneid");
oci_bind_by_name($s, ":geneid", $term);
oci_execute($s);
print $type." = $term<br>";
}
else
{
	$type = 'genename';
	$term = strtoupper($term);
	$s= oci_parse($conn,"select a.genename, dbest_tisged_hpa_unigene.* from ((select unigeneid, genename from hsoutput where genename = :genename) a) inner join dbest_tisged_hpa_unigene on  a.unigeneid = dbest_tisged_hpa_unigene.unigeneid");
oci_bind_by_name($s, ":genename", $term);
oci_execute($s);
print $type . " = $term<br>";
	
}
?>

<br />
<p><b>Gene/Protein Organ Specificity</b></p>
<table width="95%" class="sortable">
  <tr>
    <th>UnigeneID
    <th>Organ
    <th>Pvalue
    <th>Zscore
    <th>Source
  </tr>

 <?php 
 
 
while($row = oci_fetch_array($s))
{
	$unigeneid = $row["UNIGENEID"];
	$organ = $row["ORGAN"];
	$pvalue = sprintf('%.2e', $row["PVALUE"]);
		$source = $row["SOURCE"];

  print '<tr>';	
	$cid = substr($unigeneid, 3);
	print '<td>';
	print "<a href='http://www.ncbi.nlm.nih.gov/UniGene/clust.cgi?ORG=Hs&CID=$cid' target='_blank'>$unigeneid</a>"; 
	print '<td>' . $organ;
    print '<td>';
	if ($source == "dbEST")
	{
		print "<a href='PvalueImage.php?unigeneid=$unigeneid&organ=$organ' target='_blank'>$pvalue</a>"; 
	}
		
    print '<td>' . $row["ZSCORE"];
    print '<td>' . $row["SOURCE"];
 	print '</tr>';
}
?>
</table>
<br />
<p><b>Gene/Protein Detectability in Plasma</b></p>
<table width="95%" class="sortable">
  <tr>
    <th>IPIID
    <th>#Peptide
  </tr>

 <?php 
 
 
while($row = oci_fetch_array($p))
{
	$ipiid = $row["IPIID"];
	$hits = $row["HITS"];
	
  print '<tr>';
	print '<td>';
	print "<a href='http://discern.uits.iu.edu:8340/HIP2/hip_protein_evidence.php?catno=$ipiid' target='_blank'>$ipiid</a>";	
	print '<td>' . $hits;
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
