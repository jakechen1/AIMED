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
    <script type="text/javascript" src="jquery-1.6.1.js"></script>
    <script type="text/javascript" language="javascript" src="jquery.dataTables.js"></script>
    <script type="text/javascript">
        function fnFeaturesInit() {
            /* Not particularly modular this - but does nicely :-) */
            $('ul.limit_length>li').each(function (i) {
                if (i > 10) {
                    this.style.display = 'none';
                }
            });

            $('ul.limit_length').append('<li class="css_link">Show more<\/li>');
            $('ul.limit_length li.css_link').click(function () {
                $('ul.limit_length li').each(function (i) {
                    if (i > 5) {
                        this.style.display = 'list-item';
                    }
                });
                $('ul.limit_length li.css_link').css('display', 'none');
            });
        }

        $(document).ready(function () {
            fnFeaturesInit();
            $('#example').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".tabLink").each(function () {

                $(this).click(function () {
                    tabeId = $(this).attr('id');
                    $(".tabLink").removeClass("activeLink");
                    $(this).addClass("activeLink");
					
					oTable = $('#example').dataTable(); 
    
					if (tabeId =='cont-1')
					{
						
						var oSettings = oTable.fnSettings(); 
						/	* Show an example parameter from the settings */
						//alert( oSettings._iDisplayStart ); 
						alert( $(this).innerHTML); 
					}
					else{
						oTable = $('#example').dataTable();   
						/* Filter immediately */
    
						oTable.fnFilter( '', 1, false ); 

						}


                   
                    return false;
                });
            });



        });
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
$unigeneid = $_GET['unigeneid'];
$organ = $_GET['organ'];
print "<IMG src='./images/$unigeneid" . '_' .  "$organ.png' width='850' height='450' usemap='#Map'/>";
?>

<script type="text/javascript">

    function filter(term, _id, cellNr) {
        var suche = term;
        
		$(".tabLink").removeClass("activeLink");
        $("#cont-1").addClass("activeLink");
		
		$("#unique_tab_id").html(term);
		
		var oTable = $('#example').dataTable();
		oTable.fnFilter("^"+suche+"$",cellNr,true);	
		
		
		
    }
</script>

<map name="Map" id="Map">
<area shape="rect" coords="104,45,117.2,450" href="#" onclick="filter('adipose','example',1)" alt="adipose" />
<area shape="rect" coords="117.2,45,130.4,450" href="#" onclick="filter('adrenal gland','example',1)" alt="adrenal gland" />
<area shape="rect" coords="130.4,45,143.6,450" href="#" onclick="filter('amnion','example',1)" alt="amnion" />
<area shape="rect" coords="143.6,45,156.8,450" href="#" onclick="filter('bladder','example',1)" alt="bladder" />
<area shape="rect" coords="156.8,45,170,450" href="#" onclick="filter('blood','example',1)" alt="blood" />
<area shape="rect" coords="170,45,183.2,450" href="#" onclick="filter('blood vessel','example',1)" alt="blood vessel" />
<area shape="rect" coords="183.2,45,196.4,450" href="#" onclick="filter('bone','example',1)" alt="bone" />
<area shape="rect" coords="196.4,45,209.6,450" href="#" onclick="filter('bone marrow','example',1)" alt="bone marrow" />
<area shape="rect" coords="209.6,45,222.8,450" href="#" onclick="filter('brain','example',1)" alt="brain" />
<area shape="rect" coords="222.8,45,236,450" href="#" onclick="filter('breast','example',1)" alt="breast" />
<area shape="rect" coords="236,45,249.2,450" href="#" onclick="filter('cervix','example',1)" alt="cervix" />
<area shape="rect" coords="249.2,45,262.4,450" href="#" onclick="filter('colon','example',1)" alt="colon" />
<area shape="rect" coords="262.4,45,275.6,450" href="#" onclick="filter('ear','example',1)" alt="ear" />
<area shape="rect" coords="275.6,45,288.8,450" href="#" onclick="filter('embryo','example',1)" alt="embryo" />
<area shape="rect" coords="288.8,45,302,450" href="#" onclick="filter('esophagus','example',1)" alt="esophagus" />
<area shape="rect" coords="302,45,315.2,450" href="#" onclick="filter('eye','example',1)" alt="eye" />
<area shape="rect" coords="315.2,45,328.4,450" href="#" onclick="filter('gallbladder','example',1)" alt="gallbladder" />
<area shape="rect" coords="328.4,45,341.6,450" href="#" onclick="filter('ganglia','example',1)" alt="ganglia" />
<area shape="rect" coords="341.6,45,354.8,450" href="#" onclick="filter('heart','example',1)" alt="heart" />
<area shape="rect" coords="354.8,45,368,450" href="#" onclick="filter('kidney','example',1)" alt="kidney" />
<area shape="rect" coords="368,45,381.2,450" href="#" onclick="filter('larynx','example',1)" alt="larynx" />
<area shape="rect" coords="381.2,45,394.4,450" href="#" onclick="filter('leiomios','example',1)" alt="leiomios" />
<area shape="rect" coords="394.4,45,407.6,450" href="#" onclick="filter('liver','example',1)" alt="liver" />
<area shape="rect" coords="407.6,45,420.8,450" href="#" onclick="filter('lung','example',1)" alt="lung" />
<area shape="rect" coords="420.8,45,434,450" href="#" onclick="filter('lymph','example',1)" alt="lymph" />
<area shape="rect" coords="434,45,447.2,450" href="#" onclick="filter('lymph node','example',1)" alt="lymph node" />
<area shape="rect" coords="447.2,45,460.4,450" href="#" onclick="filter('mouth','example',1)" alt="mouth" />
<area shape="rect" coords="460.4,45,473.6,450" href="#" onclick="filter('muscle','example',1)" alt="muscle" />
<area shape="rect" coords="473.6,45,486.8,450" href="#" onclick="filter('nerve','example',1)" alt="nerve" />
<area shape="rect" coords="486.8,45,500,450" href="#" onclick="filter('ovary','example',1)" alt="ovary" />
<area shape="rect" coords="500,45,513.2,450" href="#" onclick="filter('pancreas','example',1)" alt="pancreas" />
<area shape="rect" coords="513.2,45,526.4,450" href="#" onclick="filter('parathyroid gland','example',1)"alt="parathyroid gland" />
<area shape="rect" coords="526.4,45,539.6,450" href="#" onclick="filter('peritoneum','example',1)" alt="peritoneum" />
<area shape="rect" coords="539.6,45,552.8,450" href="#" onclick="filter('pharynx','example',1)" alt="pharynx" />
<area shape="rect" coords="552.8,45,566,450" href="#" onclick="filter('pituitary','example',1)" alt="pituitary" />
<area shape="rect" coords="566,45,579.2,450" href="#" onclick="filter('placenta','example',1)" alt="placenta" />
<area shape="rect" coords="579.2,45,592.4,450" href="#" onclick="filter('prostate','example',1)" alt="prostate" />
<area shape="rect" coords="592.4,45,605.6,450" href="#" onclick="filter('rectum','example',1)" alt="rectum" />
<area shape="rect" coords="605.6,45,618.8,450" href="#" onclick="filter('salivary gland','example',1)" alt="salivary gland" />
<area shape="rect" coords="618.8,45,632,450" href="#" onclick="filter('skin','example',1)" alt="skin" />
<area shape="rect" coords="632,45,645.2,450" href="#" onclick="filter('small intestine','example',1)" alt="small intestine" />
<area shape="rect" coords="645.2,45,658.4,450" href="#" onclick="filter('spinal cord','example',1)" alt="spinal cord" />
<area shape="rect" coords="658.4,45,671.6,450" href="#" onclick="filter('spleen','example',1)" alt="spleen" />
<area shape="rect" coords="671.6,45,684.8,450" href="#" onclick="filter('stomach','example',1)" alt="stomach" />
<area shape="rect" coords="684.8,45,698,450" href="#" onclick="filter('testis','example',1)" alt="testis" />
<area shape="rect" coords="698,45,711.2,450" href="#" onclick="filter('thymus','example',1)" alt="thymus" />
<area shape="rect" coords="711.2,45,724.4,450" href="#" onclick="filter('thyroid','example',1)" alt="thyroid" />
<area shape="rect" coords="724.4,45,737.6,450" href="#" onclick="filter('tonsil','example',1)" alt="tonsil" />
<area shape="rect" coords="737.6,45,750.8,450" href="#" onclick="filter('trachea','example',1)" alt="trachea" />
<area shape="rect" coords="750.8,45,764,450" href="#" onclick="filter('umbilical cord','example',1)" alt="umbilical cord" />
<area shape="rect" coords="764,45,777.2,450" href="#" onclick="filter('ureter','example',1)" alt="ureter" />
<area shape="rect" coords="777.2,45,790.4,450" href="#" onclick="filter('uterus','example',1)" alt="uterus" />

</map>




			<div class="tab-box">
                <a href="javascript:;" class="tabLink activeLink" id="cont-1"><SPAN id='unique_tab_id'>Organ-Selected</SPAN></a>
                <a href="javascript:;" class="tabLink " id="cont-2">All Organs</a>
            </div>


			<div class="tabcontent" id="cont-1-1"> 
            
                    <?php
include "dbconnect.php";
?>
        <?php

print $unigeneid;
print $organ;

$s= oci_parse($conn,"select unigeneorganlibidnamen.* from unigeneorganlibidnamen where unigeneid = :unigeneid");
oci_bind_by_name($s, ":unigeneid", $unigeneid);
oci_execute($s);
	
		
?>	






<br />
<p>Gene/Protein Organ Specificity</p>


				<!--<div class="full_width" style="border:1px solid #E6EEF7;">-->
                <div style="border:1px solid #E6EEF7;">
            




<table  border="0" cellpadding="0" cellspacing="0" class="display" id="example">

<thead>
  <tr>
    <th>UnigeneID</th>
    <th>Organ</th>
    <th>#EST</th>
    <th>LibID</th>
	<th>Name</th>
    <th>PubmedID</th>
  </tr>
</thead>
<tbody>

 <?php 
 
 
while($row = oci_fetch_array($s))
{
	$unigeneid = $row["UNIGENEID"];
	$organ = $row["ORGAN"];
	$libid = $row["LIBID"];	
	$pubmedid = $row["PUBMEDID"];	

	print '<tr>';
    
	print '<td>' . $unigeneid . '</td>' ;
    
	print '<td>' . $organ  . '</td>';
    
	print '<td>' . $row["N"]  . '</td>';
    
    print '<td>';
	print "<a href='http://www.ncbi.nlm.nih.gov/biosample/$libid' target='_blank'>$libid</a>";   
    print  '</td>';

	print '<td>' . $row["NAME"];
	$pubmedid_array = split(";", $pubmedid);
	print  '</td>';
    
    print '<td>';

	$str = "";
	foreach($pubmedid_array as $values)
	{
		$str = $str . "<a href='http://www.ncbi.nlm.nih.gov/pubmed/$values' target='_blank'>$values</a>;";   
	}
	print 'PMID:'. rtrim($str, ';'); 
	
	print  '</td>';
    
 	print '</tr>';    
    
    
}
?>



</tbody>
</table>
            
            
            
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
