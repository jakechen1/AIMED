   <!--<b>Using OCI Extension Module to connect PHP to Oracle.<b>-->
  <?php
    $db="(DESCRIPTION =
		(ADDRESS = (PROTOCOL = TCP)(HOST = rdc02.uits.iu.edu)(PORT = 1521))
		(CONNECT_DATA =
			(SERVER = DEDICATED)
			(SERVICE_NAME = BIODB.IU.EDU)
		)
	)";
    if ($conn=oci_connect("curation9","biokdd",$db)){
      	   //echo "<B>SUCCESS ! Connected to BIO10G database<B>\n";
    }
    else{
	   $err = oci_error();
  	   var_dump($err);
           print "\nError code = "     . $err[code];
  	   print "\nError message = "  . $err[message];
  	   print "\nError position = " . $err[offset];
       	   print "\nSQL Statement = "  . $err[sqltext];
    	   echo "<B>Failed :-( Could not connect to BIO10G database:<B>\n";
    	   die();
    }?>

