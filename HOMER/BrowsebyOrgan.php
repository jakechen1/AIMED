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
<!--<style type="text/css" media="screen"> @import "site_jui.css"; </style>-->
<!--    <style type="text/css" media="screen"> @import "demo_table_jui.css";</style>-->
<!--    <style type="text/css" media="screen">  @import "jquery-ui-1.7.2.custom.css";  </style>-->
	
    <style type="text/css">
        body
        {
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }
        .tab-box
        {
            border-bottom: 1px solid #DDD;
            padding-bottom: 5px;
        }
        .tab-box a
        {
            border: 1px solid #DDD;
            color: #666666;
            padding: 5px 15px;
            text-decoration: none;
            background-color: #eee;
        }
        .tab-box a.activeLink
        {
            background-color: #fff;
            border-bottom: 0;
            padding: 6px 15px;
        }
        .tabcontent
        {
            border: 1px solid #ddd;
            border-top: 0;
            padding: 5px;
        }
        .hide
        {
            display: none;
        }
    </style>  
    
    
    
    
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
                <li><a class="active" href="browse.html">Browse</a></li>
                <li><a href="advsearch.html">Advanced Search</a></li>
                <li><a href="download.html">Download</a></li>
                <li><a href="help.html">Help</a></li>
                <li><a href="statistics.html">Statistics</a></li>
                <li><a href="about.html">About Us</a></li>
            </ul>
                    
            <div class="css_clear"></div>          
			</div>
            <ul class="submenu submenu_styling">
            	<li><a href="browse.html">Browse</a>&raquo;</li>
            	<li><a href="browse.html">by Organ</a>&raquo;</li>
                <?php
                $term = $_GET['organ'];
				print 	"<li><a href='#'>$term</a></li>";
				?>
			</ul>                 

            <div class="css_clear"></div>  
            
            
            
            <!-- InstanceEndEditable -->
        </div>
        <div id="fw_content">
          <!-- InstanceBeginEditable name="EditRegion1" -->
            <div class="tab-box">
                <a href="browse.html" class="tabLink activeLink" id="cont-1">by Organ</a>
                <a href="browsedisease.html" class="tabLink " id="cont-2">by Disease</a>
            </div>          
            
            <div class="tabcontent" id="cont-1-1">                         
      
       <?php
include "dbconnect.php";
?>
        

<?php
$s= oci_parse($conn,"select dbest_tisged_hpa_unigene.organ as molecule, dbest_tisged_hpa_unigene.* from dbest_tisged_hpa_unigene where organ = :organ");
oci_bind_by_name($s, ":organ", $term);
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
            
            <div class="css_vsmall">
            <p>Note: It might take a while to load the disease tree after you click the 'by Disease' tab. You might also receive a popup box that says: "Stop running this script?" if your use Internet Explorer 7 or lower. If so, please click the button 'No' to allow a script on this page to continue to run, or use IE8, IE9 or the latest version of Firefox.</p>
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
