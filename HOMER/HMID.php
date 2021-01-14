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
                "sPaginationType": "full_numbers",
				"aaSorting": [[ 2, "desc" ]]
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
            	<li><a href="#">Browse</a>&raquo;</li>
                <li><a href="#">by HMID</a>&raquo;</li>
                <?php
                $homerid = $_GET['hmid'];
				print 	"<li><a href='#'>$homerid</a></li>";
				?>
			</ul>                 

            <div class="css_clear"></div>  
            
            <!-- InstanceEndEditable -->
        </div>
        <div id="fw_content">
          <!-- InstanceBeginEditable name="EditRegion1" -->         
        
        <?php

$organ = $_GET['organ'];

?>
            
                    <?php
include "dbconnect.php";
?>
        <?php

$s= oci_parse($conn,"select unigeneorganlibidnamen_hmid.* from unigeneorganlibidnamen_hmid where homerid = :homerid");
oci_bind_by_name($s, ":homerid", $homerid);
oci_execute($s);
	
		
?>	







				<!--<div class="full_width" style="border:1px solid #E6EEF7;">-->
                <div style="border:1px solid #E6EEF7;">
            




<table  border="0" cellpadding="0" cellspacing="0" class="display" id="example">

<thead>
  <tr>
    <th>HMID</th>
    <th>Organ</th>
    <th>#EST</th>
    <th>dbEST LibID</th>
	<th>dbEST Library Name</th>
    <th>References</th>
    <th>Flag</th>
  </tr>
</thead>
<tbody>

 <?php 
 
 
while($row = oci_fetch_array($s))
{
	$homerid = $row["HOMERID"];
	$organ = $row["ORGAN"];
	$libid = $row["LIBID"];	
	$pubmedid = $row["PUBMEDID"];	
	$flag = $row["FLAG"];

	print '<tr>';
	
	print '<td>';
	print $homerid; 
	print '</td>' ;
    
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
	if($pubmedid!="")
		print 'PMID:'. rtrim($str, ';'); 
	
	print  '</td>';
	
	print '<td>' . $flag  . '</td>';
    
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
