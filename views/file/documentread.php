<?php
include("../config/db.php");

$value="";
foreach($argv as $value)
{
  echo "$value\n";
}


  $response = array();
 // if(isset($_GET['rfid']) && $_GET['rfid'])
	 {
    $files = mysql_query("SELECT file.* FROM user
    JOIN file ON iduser=user_id
    WHERE RFID_='$value' AND type=0 AND pages>0");
    $AllFiles  = array();
    while($file = mysql_fetch_array($files))
    {
      //mysql_query("UPDATE tbl_files SET fld_file_print_status=1 WHERE fld_file_id='$file[fld_file_id]'");

      //mysql_query("UPDATE tbl_users SET fld_user_recharge_amt=(fld_user_recharge_amt-1) WHERE fld_user_id='$file[fld_file_user_id]'");

      $AllFiles[] = "Project/web/uploads/$file[file]";
      echo "/var/www/html/Project/web/uploads/".$file[file];
      system ("/usr/bin/lp -d HP_DeskJet_2130_series /var/www/html/Project/web/uploads/$file[file]");
    }
    //if(count($AllFiles))
      //$response = array("status"=>"1", "data"=>$AllFiles);
    //else
      //$response = array("status"=>"0", "message"=>"No files available to print.");
//  }
//  else
//    $response = array("status"=>"0", "message"=>"rfid field is required");

//  echo json_encode($response);
?>
