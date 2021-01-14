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

			<div style="border-bottom-style:solid; border-bottom-width:3px; border-bottom-color:#c3d1ec">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="browse.html">Browse</a></li>
                <li><a class="active" href="advsearch.html">Advanced Search</a></li>
                <li><a href="download.html">Download</a></li>
                <li><a href="help.html">Help</a></li>
                <li><a href="statistics.html">Statistics</a></li>
                <li><a href="about.html">About Us</a></li>
            </ul>
                    
            <div class="css_clear"></div>          
			</div>
            
            <ul class="submenu submenu_styling">
            	<li><a href="advsearch.html">Advanced Search</a>&raquo;</li>
            	<li><a href="#">Gene/Protein Organ Specificity</a></li>
			</ul>                 

            <div class="css_clear"></div>  
            <!-- InstanceEndEditable -->
        </div>
        <div id="fw_content">
          <!-- InstanceBeginEditable name="EditRegion1" -->
          
        <?php
include "dbconnect.php";
?>
        <?php
		
		$flag = array();

$term = trim($_POST['term0']);
$flag[0]= !empty($term);

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
$flag[1]= !empty($term1);


$term2 = trim($_POST['term2']); //disease
$flag[2]= !empty($term2);

$term3 = trim($_POST['term3']); //libid
$flag[3]= !empty($term3);

//$term4 = trim($_POST['term4']); //p-value
$term5 = trim($_POST['term5']); //p-value
$flag[4] = !($term5=="");

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
//$term7 = 10;//trim($_POST['term7']); //zscore
$flag[5] = !($term6=="");

if (is_numeric($term6))
{
	$term6 = (float) $term6;
	$term6 =  max($term6, 4 );
}
else
{
	$term6 = 4;
}


$term8 = trim($_POST['term8']); //AE
//$term9 = 18779;//trim($_POST['term9']); //AE
$flag[6] = !($term8=="");

if (is_numeric($term8))
{
	$term8 = (float) $term8;
	$term8 =  max($term8, 10 );
}
else
{
	$term8 = 10;
}

$term10 = trim($_POST['term10']); //RE
//$term11 = 10000;//trim($_POST['term11']); //RE
$flag[7] = !($term10=="");

if (is_numeric($term10))
{
	$term10 = (float) $term10;
	$term10 =  max($term10, 4 );
}
else
{
	$term10 = 4;
}


$sql_array = array();

$sql_array[0] = "select dbest_tisged_hpa_unigene.* from (select * from molecule_unigeneid where molecule in ('$term')) a inner join dbest_tisged_hpa_unigene on  a.unigeneid = dbest_tisged_hpa_unigene.unigeneid";
	
//term1 organ
//$sql_array[1] = "select dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where organ = :organ";
$sql_array[1] = "select dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where organ = '$term1'";


/////

//$sql_array[2] = "select dbest_tisged_hpa_unigene.* from (select unigeneiddiseaseid.diseaseid as molecule, unigeneiddiseaseid.unigeneid from unigeneiddiseaseid where diseaseid = :diseaseid) c inner join dbest_tisged_hpa_unigene on  c.unigeneid = dbest_tisged_hpa_unigene.unigeneid";

$sql_array[2] = "select dbest_tisged_hpa_unigene.* from (select unigeneiddiseaseid.diseaseid as molecule, unigeneiddiseaseid.unigeneid from unigeneiddiseaseid where diseaseid = '$term2') c inner join dbest_tisged_hpa_unigene on  c.unigeneid = dbest_tisged_hpa_unigene.unigeneid";


///term3
$sql_array[3] = "select dbest_tisged_hpa_unigene.* from (select unigeneorganlibidnamen.libid as molecule, unigeneorganlibidnamen.unigeneid from unigeneorganlibidnamen where libid = '$term3') b inner join dbest_tisged_hpa_unigene on  b.unigeneid = dbest_tisged_hpa_unigene.unigeneid";
 
////term4, 5



/////testing area


//$sql_array[4] = "select dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where pvalue >=:pmin and pvalue <=:pmax";
$sql_array[4] = "select dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where pvalue >=$term4 and pvalue <=$term5";


//$sql_array[5] = "select dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where zscore >=:zmin and zscore <=:zmax";
$sql_array[5] = "select dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where zscore >=$term6";

//$sql_array[6] = "select dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where l >=:aemin and l <=:aemax";
$sql_array[6] = "select dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where l >=$term8";

//$sql_array[7] = "select dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where re >=:remin and re <=:remax";
$sql_array[7] = "select dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where re >=$term10";

$sql = "";


for ($i = 0; $i < count($flag); $i++) {

	if ($flag[$i])
	{
		if ($sql=="")
			$sql =  $sql_array[$i];
		else
			$sql =  $sql . " intersect " . $sql_array[$i];
	}
}
//print $sql;
$s= oci_parse($conn,$sql);
/*
oci_bind_by_name($s, ":organ", $term1);
oci_bind_by_name($s, ":diseaseid", $term2);
oci_bind_by_name($s, ":libid", $term3);
oci_bind_by_name($s, ":pmin", $term4);
oci_bind_by_name($s, ":pmax", $term5);
ci_bind_by_name($s, ":zmin", $term6);
oci_bind_by_name($s, ":zmax", $term7);
oci_bind_by_name($s, ":aemin", $term8);
oci_bind_by_name($s, ":aemax", $term9);
oci_bind_by_name($s, ":remin", $term10);
oci_bind_by_name($s, ":remax", $term11);
*/
oci_execute($s);


?>	




				<div style="border:1px solid #E6EEF7;">

<table  border="0" cellpadding="0" cellspacing="0" class="display" id="example">

<thead>
  <tr>
    <th>Gene HMID</th>
     <th>GeneSymbol</th>
     
   
     <th>Organ Specificity</th>
			<!--<th>Histogram</th>-->
        
        <th>Source</th>
     <th>Significance</th>   
			<!-- <th>Pvalue</th>-->
    		<!--<th>Zscore</th>-->
   
     <th>Disease Relevance</th>
  </tr>
</thead>
<tbody>


 <?php 

$fp=fopen("osg_list.txt","w");

fwrite($fp,"Gene HMID\tGene Symbol\tOrgan Specificity\tsource\tSignificance\r\n");

 
while($row = oci_fetch_array($s))
{

$homerid = $row["HOMERID"];

	$unigeneid = $row["UNIGENEID"]; $genename = $row["GENENAME"];
	
	$pvalue = sprintf('%.2e', $row["PVALUE"]);
	$spm = $row["PVALUE2"];
	$zscore = $row["ZSCORE"];
	
	//HISTOGRAM
	$source = $row["SOURCE"];
	$source2 = $row["SOURCE2"];
	$source3 = $row["SOURCE3"];
	
	$organ = $row["ORGAN"];
	//$diseaseid = $row["DISEASEID"];
	//$ot_organ = $row["OT_ORGAN"];
	
	print '<tr>';
	


	print '<td>';	
	if ($source == "dbEST")
	{
		print "<a href='HMID.php?hmid=$homerid&organ=$organ' target='_blank'>$homerid</a>" ;
	}
	else
		print $homerid;
	print '</td>';


	//$cid = substr($unigeneid, 3);
	print '<td>';
	//print "<a href='http://www.ncbi.nlm.nih.gov/UniGene/clust.cgi?ORG=Hs&CID=$cid' target='_blank'>$unigeneid</a>"; 
	$cid=$row["GENEID"];
	print "<a href='http://www.ncbi.nlm.nih.gov/gene/$cid' target='_blank'>$genename</a>"; 
	print '</td>';
	

	
	print '<td>';	
	if ($source == "dbEST")
	{
		print "<a href='Histogram.php?hmid=$homerid&organ=$organ' target='_blank'> <img src='hist.gif' width=24 height=18> </a>" ;
	}
	print $organ; 
	print '</td>';

	print '<td>';
	$x= $source .";". $source2 .";". $source3;
	$x=trim($x,";");
	print $x . '</td>';



	print '<td>';
	if($zscore>0)
	{
		
		$y = "P-value = ".$pvalue."; Zscore = " . $row["ZSCORE"];
		if($spm>0)	
			$y = $y. "<br/>SPM = " . $spm;	
	}
	else
	{
		if($spm>0)
			$y = "SPM = " . $spm;	
		
		}		
	print $y;
	print '</td>';
		
	    
	
    
    //print '<td>' . $diseaseid.'</td>';
	
    //print '<td>' . $ot_organ.'</td>';
	
	print '<td>'; 
	print "<a href='Disease.php?hmid=$homerid&organ=$organ' target='_blank'> <img src='h3.jpg' width=24 height=18> </a>" ;
	print '</td>';
		
 	print '</tr>';
	
	$y=str_replace("<br/>","; ",$y);
	fwrite($fp,"$homerid\t$genename\t$organ\t$x\t$y\r\n");
}


?>



</tbody>
</table>
            <div class="css_small" align="right">
            <p><a href="osg_list.txt" target=\"_blank\">download table</a></p>
            </div>

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
