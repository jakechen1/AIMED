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
    <style type="text/css">    
    #tooltip{
	position:absolute;
	border:1px solid #333;
	background:#f7f5d1;
	padding:2px 5px;
	color:#333;
	display:none;
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
			xOffset = 10;
			yOffset = 20;

			var parts = window.location.search.substr(1).split("&");
			var $_GET = {};
			for (var i = 0; i < parts.length; i++) {
				var temp = parts[i].split("=");
				$_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
			}
			
			//loadfile(unigene);
			var homerid = $_GET['hmid'];
	
			var content;
			var organ = [];
			var annotation = [];
			$.get('./tooltiptext/' + homerid + '.txt', function(data)
			{
				content= data;
				
				parts = data.split("\n");
				for (var j = 0; j < parts.length; j++) {
					temp = parts[j].split("\t");
					organ[j] = temp[0];					
					annotation[j] = temp[1];				
				}
				
			});// Do something with content:

			
			//var myCars=new Array(); // regular array (add an optional integer
			//myCars[0]="Saab";       // argument to control array's size)
			//myCars[1]="Volvo";
			//var index = [12, 5, 8, 130, 44].indexOf(8);
			if (!Array.indexOf) {
				Array.prototype.indexOf = function (obj, start) {
					for (var i = (start || 0); i < this.length; i++) {
						if (this[i] == obj) {
							return i;
						}
					}
					return -1;
				}
			}
			
			$("area.tooltip").hover(function(e){	
				
				
				//alert($_GET['unigeneid']); // 1
				//alert($_GET.bar);    // 2
				
				
		
				this.t = this.alt;
				var index = organ.indexOf(this.t);
			
				if (index>=0)
				{

					$("body").append("<p id='tooltip'>"+ annotation[index] + "</p>");
				}
				$("#tooltip")
				.css("top",(e.pageY - xOffset) + "px")
				.css("left",(e.pageX + yOffset) + "px")
				.fadeIn("fast");		
				},
				function(){
				//this.title = this.t;		
				$("#tooltip").remove();
				}
			);
			
			$("area.tooltip").mousemove(function(e){
				$("#tooltip")
				.css("top",(e.pageY - xOffset) + "px")
				.css("left",(e.pageX + yOffset) + "px");
			});							
									
									
            fnFeaturesInit();
            $('#example').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
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
                <?php
                $homerid = $_GET['hmid'];
				print 	"<li><a href='#'>Disease Relevance of Gene $homerid</a></li>";
				?>
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
$organ = $_GET['organ'];

$s= oci_parse($conn,"select a.*, unigeneiddiseaseidnameorgan.diseaseid, unigeneiddiseaseidnameorgan.diseasename, unigeneiddiseaseidnameorgan.organ from (select unigeneidtohomerid.* from unigeneidtohomerid where homerid = :homerid) a inner join  unigeneiddiseaseidnameorgan on a.unigeneid = unigeneiddiseaseidnameorgan.unigeneid");
oci_bind_by_name($s, ":homerid", $homerid);
oci_execute($s);
	
		
?>	







				<!--<div class="full_width" style="border:1px solid #E6EEF7;">-->
                <div style="border:1px solid #E6EEF7;">
            




<table  border="0" cellpadding="0" cellspacing="0" class="display" id="example">

<thead>
  <tr>
    <th>Gene HMID</th>
    <th>Gene Symbol</th>
    <th>Organ Specificity</th>
    <th>DiseaseID</th>
	<th>Disease Name</th>
    <th>Related Organ</th>
  </tr>
</thead>
<tbody>

 <?php 
 
 
while($row = oci_fetch_array($s))
{
	//$organ
	$homerid = $row["HOMERID"];
	$genename = $row["GENENAME"];		
	$diseaseid = $row["DISEASEID"];	
	$diseasename = $row["DISEASENAME"];	
	$ot_organ = $row["ORGAN"];
	
	print '<tr>';
	
	print '<td>';
	print $homerid; 
	print '</td>' ;
    
	print '<td>';
	//print "<a href='http://www.ncbi.nlm.nih.gov/UniGene/clust.cgi?ORG=Hs&CID=$cid' target='_blank'>$unigeneid</a>"; 
	$cid=$row["GENEID"];
	print "<a href='http://www.ncbi.nlm.nih.gov/gene/$cid' target='_blank'>$genename</a>"; 
	print '</td>';

	print '<td>' . $organ  . '</td>';

    print '<td>';
	$cid2 = substr($diseaseid, 5);
	print "<a href='http://www.nlm.nih.gov/cgi/mesh/2011/MB_cgi?field=uid&term=$cid2' target='_blank'>$diseaseid</a>";   
    print  '</td>';





	print '<td>' . $diseasename. '</td>';
    
    print '<td>' .$ot_organ. '</td>';
    
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
