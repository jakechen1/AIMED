<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/homer.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta name="keywords" content="organ-specific" />
    <meta name="description" content="Homer£º Human Organ-specific Molecular Electrical Repository" />
    <meta name="author" content="Jake Y. Chen, Fan Zhang" />
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Homer: Human Organ-specific Molecular Electrical Repository</title>
    <!-- InstanceEndEditable -->
    
    <!-- InstanceBeginEditable name="head" -->
    <style type="text/css" media="screen">
        @import "site_jui.css";
    </style>
	<style type="text/css" media="screen">
        @import "demo_table_jui.css";
    </style>
    <style type="text/css" media="screen">
        @import "jquery-ui-1.7.2.custom.css";
    </style>
    <style type="text/css" media="screen">
        /*
			 * Override styles needed due to the mix of three different CSS sources! For proper examples
			 * please see the themes example in the 'Examples' section of this site
			 */
        .dataTables_info
        {
            padding-top: 0;
        }
        .dataTables_paginate
        {
            padding-top: 0;
        }
        .css_right
        {
            float: right;
        }
        #example_wrapper .fg-toolbar
        {
            font-size: 0.8em;
        }
        #theme_links span
        {
            float: left;
            padding: 2px 10px;
        }
    </style>
    
    

     	<script type="text/javascript" language="javascript" src="jquery-1.6.1.js"></script>
		<script type="text/javascript" language="javascript" src="jquery.dataTables.js"></script>
		
		<script type="text/javascript">
			function fnFeaturesInit ()
			{
				/* Not particularly modular this - but does nicely :-) */
				$('ul.limit_length>li').each( function(i) {
					if ( i > 10 ) {
						this.style.display = 'none';
					}
				} );
				
				$('ul.limit_length').append( '<li class="css_link">Show more<\/li>' );
				$('ul.limit_length li.css_link').click( function () {
					$('ul.limit_length li').each( function(i) {
						if ( i > 5 ) {
							this.style.display = 'list-item';
						}
					} );
					$('ul.limit_length li.css_link').css( 'display', 'none' );
				} );
			}
			
			$(document).ready( function() {
				fnFeaturesInit();
				$('#example').dataTable( {
					"bJQueryUI": true,
					"sPaginationType": "full_numbers"
				} );				
			
			} );
		</script>
    
    
    
    <!-- InstanceEndEditable -->
</head>
<body id="index" class="grid_2_3">
    <div id="fw_container">
        <div id="fw_header">
            <h1>
                <a href="index.html">
                    <img src="homer.jpg" alt="Homer logo" width="77px" height="75px">Homer</a>
          </h1>
            <!-- InstanceBeginEditable name="headeditregion" -->

            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="browse.html">Browse</a></li>
                <li><a href="advsearch.html">Advanced Search</a></li>
                <li><a href="download.html">Download</a></li>
                <li><a href="help.html">Help</a></li>
                <li><a href="statistics.html">Statistics</a></li>
                <li><a href="about.html">About Us</a></li>
            </ul>
                    
            <div class="css_clear">
            </div>
            <!-- InstanceEndEditable -->
        </div>
        <div id="fw_content">
          <!-- InstanceBeginEditable name="EditRegion1" -->
          
        <?php
include "dbconnect.php";
?>
        <?php
$term = trim($_POST['term0']);


$term = str_replace(' ', ',', $term);
$term = str_replace(';', ',', $term);


while (strpos($term, ",,")!==false)
{
	$term = str_replace(',,', ',', $term);
}


$term = trim($term, ",");
	$term = str_replace(',', "','", $term);
//	$term = '\''. $term .'\'';



$term1 = trim($_POST['term1']);  // 1 organ ; 0gene/protein
$term2 = trim($_POST['term2']); //disease
$term3 = trim($_POST['term3']); //libid

$term4 = trim($_POST['term4']); //p-value


if (is_numeric($term4))
{
	$term4 = (float) $term4;
	$term4 =  max($term4, 0 );
}
else
{
	$term4 = 0;
}


$term5 = trim($_POST['term5']); //p-value

if (is_numeric($term5))
{
	$term5 = (float) $term5;
	$term5 =  min($term5, 1 );
}
else
{
	$term5 = 1;
}




$term6 = trim($_POST['term6']); //zscore
if (is_numeric($term6))
{
	$term6 = (float) $term6;
	$term6 =  max($term6, 4 );
}
else
{
	$term6 = 4;
}
$term7 = trim($_POST['term7']); //zscore
if (is_numeric($term7))
{
	$term7 = (float) $term7;
	$term7 =  min($term7, 10);
}
else
{
	$term7 = 10;
}


$term8 = trim($_POST['term8']); //AE
if (is_numeric($term8))
{
	$term8 = (float) $term8;
	$term8 =  max($term8, 10 );
}
else
{
	$term8 = 10;
}

$term9 = trim($_POST['term9']); //AE
if (is_numeric($term9))
{
	$term9 = (float) $term9;
	$term9 =  min($term9, 18779 );
}
else
{
	$term9 = 18779;
}


$term10 = trim($_POST['term10']); //RE
if (is_numeric($term10))
{
	$term10 = (float) $term10;
	$term10 =  max($term10, 4 );
}
else
{
	$term10 = 4;
}

$term11 = trim($_POST['term11']); //RE
if (is_numeric($term11))
{
	$term11 = (float) $term11;
	$term11 =  min($term11, 10000 );
}
else
{
	$term11 = 10000;
}


$s= oci_parse($conn,"select a.molecule, dbest_tisged_hpa_unigene.* from (select * from molecule_unigeneid where molecule in ('$term')) a inner join dbest_tisged_hpa_unigene on  a.unigeneid = dbest_tisged_hpa_unigene.unigeneid");
//oci_bind_by_name($s, ":molecule", $term);
oci_execute($s);
	
//term1 organ



$s= oci_parse($conn,"select dbest_tisged_hpa_unigene.organ as molecule, dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where organ = :organ");
oci_bind_by_name($s, ":organ", $term1);
oci_execute($s);
/////

$s= oci_parse($conn,"select c.molecule, dbest_tisged_hpa_unigene.* from (select unigeneiddiseaseid.diseaseid as molecule, unigeneiddiseaseid.unigeneid from unigeneiddiseaseid where diseaseid = :diseaseid) c inner join dbest_tisged_hpa_unigene on  c.unigeneid = dbest_tisged_hpa_unigene.unigeneid");
oci_bind_by_name($s, ":diseaseid", $term2);
oci_execute($s);


///term3
$s= oci_parse($conn,"select b.molecule, dbest_tisged_hpa_unigene.* from (select unigeneorganlibidnamen.libid as molecule, unigeneorganlibidnamen.unigeneid from unigeneorganlibidnamen where libid = :libid) b inner join dbest_tisged_hpa_unigene on  b.unigeneid = dbest_tisged_hpa_unigene.unigeneid");
oci_bind_by_name($s, ":libid", $term3);
oci_execute($s);
 
////term4, 5



/////testing area


$s= oci_parse($conn,"select '$term4<=pvalue<=$term5' as molecule, dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where pvalue >=:pmin and pvalue <=:pmax");
oci_bind_by_name($s, ":pmin", $term4);
oci_bind_by_name($s, ":pmax", $term5);

oci_execute($s);

$s= oci_parse($conn,"select '$term6<=zscore<=$term7' as molecule, dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where zscore >=:zmin and zscore <=:zmax");
oci_bind_by_name($s, ":zmin", $term6);
oci_bind_by_name($s, ":zmax", $term7);

oci_execute($s);

$s= oci_parse($conn,"select '$term8<=ae<=$term9' as molecule, dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where l >=:aemin and l <=:aemax");
oci_bind_by_name($s, ":aemin", $term8);
oci_bind_by_name($s, ":aemax", $term9);

oci_execute($s);

$s= oci_parse($conn,"select '$term10<=re<=$term11' as molecule, dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where re >=:remin and re <=:remax");
oci_bind_by_name($s, ":remin", $term10);
oci_bind_by_name($s, ":remax", $term11);

oci_execute($s);






?>	




				<div style="border:1px solid #E6EEF7;">
            
<br />
<h1>Gene/Protein Organ Specificity</h1>



<table  border="0" cellpadding="0" cellspacing="0" class="display" id="example">

<thead>
  <tr>
      <th>Query</th>
    <th>HomerID</th>
     <th>GeneName</th>
     <th>Pvalue</th>
    <th>Zscore</th>
    <th>Histogram</th>
        <th>Source</th>
     <th>Organ Specificity</th>
  </tr>
</thead>
<tbody>

 <?php 
 
 
while($row = oci_fetch_array($s))
{
	$molecule = $row["MOLECULE"];
	$homerid = $row["HOMERID"];

	$unigeneid = $row["UNIGENEID"]; $genename = $row["GENENAME"];
	
	$pvalue = sprintf('%.2e', $row["PVALUE"]);
	$zscore = $row["ZSCORE"];
	
	//HISTOGRAM
	$source = $row["SOURCE"];
	
	$organ = $row["ORGAN"];
	//$diseaseid = $row["DISEASEID"];
	//$ot_organ = $row["OT_ORGAN"];
	
	print '<tr>';
	
	print '<td>' . $molecule . '</td>';

	print '<td>' . $homerid. '</td>';


	//$cid = substr($unigeneid, 3);
	print '<td>';
	//print "<a href='http://www.ncbi.nlm.nih.gov/UniGene/clust.cgi?ORG=Hs&CID=$cid' target='_blank'>$unigeneid</a>"; 
	$cid=$row["GENEID"];
	print "<a href='http://www.ncbi.nlm.nih.gov/gene/$cid' target='_blank'>$genename</a>"; 
	print '</td>';
	
	
	print '<td>';
		print $pvalue; 
	print '</td>';
		
    print '<td>' . $row["ZSCORE"].'</td>';
	
	print '<td>' . "<a href='Histogram.php?unigeneid=$unigeneid&organ=$organ' target='_blank'> <img src='hist.gif' width=24 height=18> </a>" . '</td>';

	    
	print '<td>' . $source . '</td>';
	
	print '<td>' . $organ . '</td>';
    
    //print '<td>' . $diseaseid.'</td>';
	
    //print '<td>' . $ot_organ.'</td>';
		
 	print '</tr>';
}
?>



</tbody>
</table>

</div>

		<!-- InstanceEndEditable -->
        
        </div>
        
        <div class="css_clear">
        </div>       
        
        <div class="css_spacing">
        </div>
        <div class="css_clear">
        </div>
        <div id="fw_footer">
            <div class="css_center">
                Copyright 2011 - <a href="http://bio.informatics.iupui.edu/index.stm">Discovery Informatics
                    and Computing Group</a>
            </div>
        </div>
    </div>
</body>
<!-- InstanceEnd --></html>
