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
                <?php
                $homerid = $_GET['hmid'];
				print 	"<li><a href='#'>Organ-specific Expressions of Gene $homerid</a></li>";
				?>
			</ul>                 

            <div class="css_clear"></div>  
            
            <!-- InstanceEndEditable -->
        </div>
        <div id="fw_content">
          <!-- InstanceBeginEditable name="EditRegion1" -->         
        
        <?php

$organ = $_GET['organ'];
//print "<h1>Organ-specific Expressions of Gene &lt;".$homerid."&gt;</h1>";

print "<IMG src='./images/$homerid" . '_' .  "$organ.png' width='850' height='450' usemap='#Map' border = 0/>";
?>

<map name="Map" id="Map">
<area shape="rect" coords="104,45,117.2,450" class="tooltip" alt="adipose" />
<area shape="rect" coords="117.2,45,130.4,450" class="tooltip" alt="adrenal gland" />
<area shape="rect" coords="130.4,45,143.6,450" class="tooltip" alt="amnion" />
<area shape="rect" coords="143.6,45,156.8,450" class="tooltip" alt="bladder" />
<area shape="rect" coords="156.8,45,170,450" class="tooltip" alt="blood" />
<area shape="rect" coords="170,45,183.2,450" class="tooltip" alt="blood vessel" />
<area shape="rect" coords="183.2,45,196.4,450" class="tooltip" alt="bone" />
<area shape="rect" coords="196.4,45,209.6,450" class="tooltip" alt="bone marrow" />
<area shape="rect" coords="209.6,45,222.8,450" class="tooltip" alt="brain" />
<area shape="rect" coords="222.8,45,236,450" class="tooltip" alt="breast" />
<area shape="rect" coords="236,45,249.2,450" class="tooltip" alt="cervix" />
<area shape="rect" coords="249.2,45,262.4,450" class="tooltip" alt="colon" />
<area shape="rect" coords="262.4,45,275.6,450" class="tooltip" alt="ear" />
<area shape="rect" coords="275.6,45,288.8,450" class="tooltip" alt="embryo" />
<area shape="rect" coords="288.8,45,302,450" class="tooltip" alt="esophagus" />
<area shape="rect" coords="302,45,315.2,450" class="tooltip" alt="eye" />
<area shape="rect" coords="315.2,45,328.4,450" class="tooltip" alt="gallbladder" />
<area shape="rect" coords="328.4,45,341.6,450" class="tooltip" alt="ganglia" />
<area shape="rect" coords="341.6,45,354.8,450" class="tooltip" alt="heart" />
<area shape="rect" coords="354.8,45,368,450" class="tooltip" alt="kidney" />
<area shape="rect" coords="368,45,381.2,450" class="tooltip" alt="larynx" />
<area shape="rect" coords="381.2,45,394.4,450" class="tooltip" alt="leiomios" />
<area shape="rect" coords="394.4,45,407.6,450" class="tooltip" alt="liver" />
<area shape="rect" coords="407.6,45,420.8,450" class="tooltip" alt="lung" />
<area shape="rect" coords="420.8,45,434,450" class="tooltip" alt="lymph" />
<area shape="rect" coords="434,45,447.2,450" class="tooltip" alt="lymph node" />
<area shape="rect" coords="447.2,45,460.4,450" class="tooltip" alt="mouth" />
<area shape="rect" coords="460.4,45,473.6,450" class="tooltip" alt="muscle" />
<area shape="rect" coords="473.6,45,486.8,450" class="tooltip" alt="nerve" />
<area shape="rect" coords="486.8,45,500,450" class="tooltip" alt="ovary" />
<area shape="rect" coords="500,45,513.2,450" class="tooltip" alt="pancreas" />
<area shape="rect" coords="513.2,45,526.4,450" class="tooltip" alt="parathyroid gland" />
<area shape="rect" coords="526.4,45,539.6,450" class="tooltip" alt="peritoneum" />
<area shape="rect" coords="539.6,45,552.8,450" class="tooltip" alt="pharynx" />
<area shape="rect" coords="552.8,45,566,450" class="tooltip" alt="pituitary" />
<area shape="rect" coords="566,45,579.2,450" class="tooltip" alt="placenta" />
<area shape="rect" coords="579.2,45,592.4,450" class="tooltip" alt="prostate" />
<area shape="rect" coords="592.4,45,605.6,450" class="tooltip" alt="rectum" />
<area shape="rect" coords="605.6,45,618.8,450" class="tooltip" alt="salivary gland" />
<area shape="rect" coords="618.8,45,632,450" class="tooltip" alt="skin" />
<area shape="rect" coords="632,45,645.2,450" class="tooltip" alt="small intestine" />
<area shape="rect" coords="645.2,45,658.4,450" class="tooltip" alt="spinal cord" />
<area shape="rect" coords="658.4,45,671.6,450" class="tooltip" alt="spleen" />
<area shape="rect" coords="671.6,45,684.8,450" class="tooltip" alt="stomach" />
<area shape="rect" coords="684.8,45,698,450" class="tooltip" alt="testis" />
<area shape="rect" coords="698,45,711.2,450" class="tooltip" alt="thymus" />
<area shape="rect" coords="711.2,45,724.4,450" class="tooltip" alt="thyroid" />
<area shape="rect" coords="724.4,45,737.6,450" class="tooltip" alt="tonsil" />
<area shape="rect" coords="737.6,45,750.8,450" class="tooltip" alt="trachea" />
<area shape="rect" coords="750.8,45,764,450" class="tooltip" alt="umbilical cord" />
<area shape="rect" coords="764,45,777.2,450" class="tooltip" alt="ureter" />
<area shape="rect" coords="777.2,45,790.4,450" class="tooltip" alt="uterus" />

</map>


            
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
