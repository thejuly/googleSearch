
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<head>
        <title>Cross-Browser QRCode generator for Javascript</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="qrcode.js"></script>
  
        <style type="text/css">
                #btn{
                width:100%;
                }
                #btn_start{
                width:100%;
                }
                #btn_close{
                width:100%;
                }
        </style>

        <style>
                table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                }

                td, th {
                border: 1px solid #000000;
                text-align: left;
                padding: 8px;
                }

                tr:nth-child(even) {
                background-color: #dddddd;
                }
        </style>
</head>
<body>

<?php 
  //https://script.google.com/macros/s/AKfycbyKAKaGkYQkVJaM2YIa_wQus6IsjA8ufL20r5r1Vp-BGMRVeok/exec?uuid=d149fb78&method=do_nothing
  //https://script.google.com/macros/s/AKfycbx81Xeq-lM0paTzwcR8meENAUWUojF5JKjm7DCCFIQ/dev?uuid=d149fb78&method=do_nothing
  $url_app_script = 'https://script.google.com/macros/s/AKfycbyKAKaGkYQkVJaM2YIa_wQus6IsjA8ufL20r5r1Vp-BGMRVeok/exec';
  

  $post_uuid = $_GET['uuid'];
  //echo $post_uuid . "<br>";
  


  // not click any button
  if ($_POST["MM_insert"] == "" && $_POST["btn_start"] == "" && $_POST["btn_close"] == "") {
        $post_btn_start = $_POST["btn_start"];
        $post_btn_close = $_POST["btn_close"];
        $method = 'do_nothing';
        
        echo $_SESSION['uuid'] . "<br>";

        //echo $post_btn_start . "<br>";
        //echo $post_btn_close . "<br>";

        //(url, uuid, method)
        //$rnt_data = c_url($url_app_script,'d149fb78','do_nothing');
        $rnt_data = c_url($url_app_script,$post_uuid,$method);



  }

  // click btn_start
  if ($_POST["MM_insert"] == "form1" && $_POST["btn_start"] == "wo_start" && $_POST["btn_close"] == "") {
        $post_btn_start = $_POST["btn_start"];
        $post_btn_close = $_POST["btn_close"];
        $method = 'start_work';

        echo $_SESSION['uuid'] . "<br>";
        //echo $post_btn_start . "<br>";
        //echo $post_btn_close . "<br>";
        

        //(url, uuid, method)
        $rnt_data = c_url($url_app_script,$post_uuid,$method);
  }

    // click btn_close
    if ($_POST["MM_insert"] == "form1" && $_POST["btn_start"] == "" && $_POST["btn_close"] == "wo_close") {
        $post_btn_start = $_POST["btn_start"];
        $post_btn_close = $_POST["btn_close"];
        $method = 'close_work';

        echo $_SESSION['uuid'] . "<br>";
        //echo $post_btn_start . "<br>";
        //echo $post_btn_close . "<br>";
        

        //(url, uuid, method)
        $rnt_data = c_url($url_app_script,$post_uuid,$method);
  }


  function c_url($url_app_script, $uuid, $method) {
        //$url = 'https://script.google.com/macros/s/AKfycbyKAKaGkYQkVJaM2YIa_wQus6IsjA8ufL20r5r1Vp-BGMRVeok/exec'.'?uuid='.$uuid.'&method='.$method;
        //$url = 'https://script.google.com/macros/s/AKfycbyKAKaGkYQkVJaM2YIa_wQus6IsjA8ufL20r5r1Vp-BGMRVeok/exec?uuid=d149fb78&method=do_nothing';
        $url = $url_app_script.'?uuid='.$uuid.'&method='.$method;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        $header = ['Content-Type: application/json'];
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);
        //echo $response . "<br>";
        curl_close($curl);

        $txt_split = explode(",",$response);


        $data = json_decode($response);
        //$uuid = $data->wo;
        //echo $data->uuid . "<br>";
        //echo $uuid. "<br>";
        
        return $data;
      }
?>






<div class="container" style="padding-top:10px">

    <div class="col-md-4" style="background-color:#D6EAF8">
	<h3 align="center">Work order infomation</h3>
        <br>

      <form  name="form1" action="index.php?uuid=<?php echo ($_GET['uuid']);?>" method="POST" id="login" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
           <label for="u_uid">UUID</label>
           <input type="text" id="uuid" name="uuid" class="form-control" autocomplete="off" value = "<?php echo ($rnt_data->uuid);?>" />
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
           <label for="w_o">Work order</label>
           <input type="text" id="wo" name="wo" class="form-control" autocomplete="off" value = "<?php echo ($rnt_data->wo);?>" />
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
           <label for="s_tatus">Status</label>
           <input type="text" id="status" name="status" class="form-control" autocomplete="off" value = "<?php echo ($rnt_data->status);?>" />
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
           <label for="row_no">Row No.</label>
           <input type="text" id="rowNo" name="rowNo" class="form-control" autocomplete="off" value = "<?php echo ($rnt_data->rowNo);?>" />
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
           <!--<input type="number" name="size" class="form-control" min="50" max="300" placeholder="Spare (Not use)" value="50" />-->
           <label for="u_uid">Description</label>
           <textarea name="message" rows="3" cols="30" class="form-control" autocomplete="off"><?php echo ($rnt_data->desc);?></textarea>
          </div>
        </div>


        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" id="btn_start" name="btn_start" value="wo_start"> Start work </button>
          </div>
        </div>
		
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success"id="btn_close" name="btn_close" value="wo_close"> Close work </button>
          </div>
        </div>

	<div class="form-group">
          <div class="col-sm-12">
	    <input type="hidden" name="MM_insert" value="form1">
          </div>
        </div>
      </form>
</div>


<form  name="form2" class="form-horizontal">
        <div class="form-group">
        </div>
</form>



<?php 
$size = "300";
//echo $_POST["url"]."<br>";
//echo $_POST["size"]."<br>";
//ST["size"] = "xx";
//if ($_POST["MM_insert"] == "form1" && $_POST["url"] <> "" && $_POST["size"] <> "") {
  if ($_POST["MM_insert"] == "form1" && $_POST["url"] == "alway not use") {
	      $post_url = $_POST["url"];
        $post_size = $_POST["size"];
        
        echo "Your Keyword is: ".$post_url."<br>";
        //$post_url = str_replace(" ","%20",$post_url);
        $post_url = rawurlencode($post_url); 
	
        echo "Document type is: ".$post_size."<br>";
        $post_size = rawurlencode($post_size); 



        echo "<br>";

        //////////////////////////////////////////////////////////////////////////////////////
        /*$str = 'Welcome to Mindphp.com '; 

        // Encode the given string 
        $encode_str = rawurlencode($str); 
        echo "Encoded string: " . $encode_str . "<br>"; 

        // Decode the encoded string 
        $decode_str = rawurldecode($encode_str); 
        echo "Decodec string: " . $decode_str; */
        //////////////////////////////////////////////////////////////////////////////////////



    


        /////////////////////////// Start curl ////////////////////////////

        //The URL we are connecting to.
        //$url = 'https://script.google.com/macros/s/AKfycbzEzi8i6Vo5-Inq_0eFX25MSDx0ragPHgnRrZPOKr0Z0QRPMno/exec?search=AIR%20REQUIREMENT%20LIST';
        //$url = 'https://script.google.com/macros/s/AKfycbwhjwq4JhNcLqm-9gYeOKh3Glz8v-etLiuylfMHepI/dev?search=AIR%20REQUIREMENT%20LIST';

        //Document center by:weera => 'https://script.google.com/macros/s/AKfycbz7MbwUuozEpwhlq14pd63RwSS_TYbQ__miUgEYkvo2ZT8XtwDX/exec?search=' . $post_url;
        //myLogbook by:thongpoon => $url = 'https://script.google.com/macros/s/AKfycbzEzi8i6Vo5-Inq_0eFX25MSDx0ragPHgnRrZPOKr0Z0QRPMno/exec?search=' . $post_url;
        
        
        /////////$url = 'https://script.google.com/macros/s/AKfycbwPn8wirdu9PDpSn1E5rC-Odrlj0FX2z9YjhNKO6AUxv8JyZ3E/exec?search=' . $post_url . "&search2=" . $post_size;
        $url = 'https://script.googleusercontent.com/macros/echo?user_content_key=PQ8c-96HsOgpt3lY4OaxdkuWDIxKyK2Qq-9RCH0fmIQPndEPyFLwktzw3CVtkjn8AzqT9s9QkOWnbqwlEei5k7AxPeJqVL4lm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnCBQvrfnn8Do_MhknkfGz8FQzOE9ni3Nb2ipJC5omwgEyQPZUTAlF3GFkvBFUvfxOxdIug5zkO6q&lib=MDypjEhUyxvnVcogGZZALmLjeSYaOUt_f?work=' . '2021' . "&uuid=" . 'd149fb78';
                //https://script.google.com/macros/s/AKfycbxaBrY6CSCvFg6fbax1AK0L-EiyEFaqo-MVgSr7lNg/dev?work=56789&uuid=d149fb78x
        //echo $url . "<br>";
        $url = 'https://script.google.com/macros/s/AKfycbyKAKaGkYQkVJaM2YIa_wQus6IsjA8ufL20r5r1Vp-BGMRVeok/exec';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        $header = ['Content-Type: application/json'];
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
        $response = curl_exec($curl);
        echo $response;
        curl_close($curl);

        $txt_split = explode(",",$response);

        
        //print_r($txt_split);
        //echo $txt_split[0];
        //echo "<br>";
        //echo sizeof($txt_split);
         /////////////////////////// End curl ////////////////////////////



        ///////// Start Google search ///////////
        //$myArray = ['testAppScript : Link = https://script.google.com/d/1n25Cu_wHLnCIjxvNttN4TF6MCb5lWTyF1fk0W6JfFMMOUXZwbfL4yfp1/edit?usp=drivesdk' ,'Turbo Sulzer .pdf : Link = https://drive.google.com/file/d/149viLe0Em9jCDiL-Di8GqhFe9BxCB5zq/view?usp=drivesdk', '01_AR9607091A-01.pdf : Link = https://drive.google.com/file/d/19Se6thvcNLp0UZEL2bFN_LgCS4V3pz_k/view?usp=drivesdk'];
        
        
        $myArray = $txt_split;


        $i = 0;
        echo "<div class=col-md-4>";
        print "<table border=1>" . "<tr>";
        //print "<tr bgcolor=#DB7093 colspan=2 > <td style=text-align:center width=70>No.</td> <td style=text-align:center>Document Name</td> </tr>";
        print "<tr bgcolor=#DB7093 colspan=2> <td style=text-align:center>No.</td> <td style=text-align:center>Document Name</td> </tr>";
        if(sizeof($myArray)){
        foreach( $myArray as $value ) {
                $i++;
                $txt_split = explode(" : Link = ",$value);
                
                $link_url = ' - ' . '<a href="'. $txt_split[1] .'" target="_blank" >' . $txt_split[0] . '</a>';
                print "<tr> <td style=text-align:center>$i</td> <td>$link_url</td> </tr>";

        
        }
        }else{
                
                print "<tr> </tr>"; print "<tr> </tr>"; print "<tr> </tr>";
                print "<th bgcolor=#DCDCDC colspan=2 style=color:#8B0000;text-align:center>No Document Found!</th>";
        }


        echo "</div>";
        
        ///////// End Google search ///////////
  

        
}
?>


</body>
</html>


































<?php 
      /*
      // Create curl resource 
      $ch = curl_init(); 
  
        // set url 
        //curl_setopt($ch, CURLOPT_URL, "http://10.29.81.199/notify/chk_cogent.php"); 
        curl_setopt($ch, CURLOPT_URL, "https://script.google.com/macros/s/AKfycbwhjwq4JhNcLqm-9gYeOKh3Glz8v-etLiuylfMHepI/dev?search=AIR"); 
  
        // Return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  
        // $output contains the output string 
        $output = curl_exec($ch); 
  
        echo $output; 
  
        // Close curl resource to free up system resources 
        curl_close($ch);      
      */
?> 


<?php 
        // Create curl resource 
 /*       $ch = curl_init(); 
  
        // set url 
        //curl_setopt($ch, CURLOPT_URL, "http://10.29.81.199/notify/chk_cogent.php"); 
        curl_setopt($ch, CURLOPT_URL, "https://script.google.com/macros/s/AKfycbwhjwq4JhNcLqm-9gYeOKh3Glz8v-etLiuylfMHepI/dev?search=AIR"); 
  
        // Return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  
        // $output contains the output string 
        $output = curl_exec($ch); 
  
        echo $output; 
  
        // Close curl resource to free up system resources 
        curl_close($ch);      
*/
        //$APPS_SCRIPT_URL = "http://10.29.81.199/notify/chk_cogent.php";
        //$APPS_SCRIPT_URL = 'https://script.google.com/macros/s/AKfycbzEzi8i6Vo5-Inq_0eFX25MSDx0ragPHgnRrZPOKr0Z0QRPMno/exec?search=AIR%20REQUIREMENT%20LIST';
        /*$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $APPS_SCRIPT_URL); 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $content = trim(curl_exec($ch));
        curl_close($ch);    
        echo $content;      
        echo "a";*/

/*
///////////////////////////////////////can print error//////////////////
        $APPS_SCRIPT_URL = 'https://script.google.com/macros/s/AKfycbwhjwq4JhNcLqm-9gYeOKh3Glz8v-etLiuylfMHepI/dev';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $APPS_SCRIPT_URL); 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);

        $result=curl_exec($ch);
        
        if(curl_error($ch))
        {
                echo 'error: ' . curl_error($ch);
        }
        else
        {
                echo $result;
        }


        $content = trim(curl_exec($ch));
        curl_close($ch);       
*/
/*
/////////////////////////////////////////////////////////////// work ////////////////////////////////////////////////////
        //The URL we are connecting to.
        $url = 'https://script.google.com/macros/s/AKfycbzEzi8i6Vo5-Inq_0eFX25MSDx0ragPHgnRrZPOKr0Z0QRPMno/exec?search=AIR%20REQUIREMENT%20LIST';
        //$url = 'https://script.google.com/macros/s/AKfycbwhjwq4JhNcLqm-9gYeOKh3Glz8v-etLiuylfMHepI/dev?search=AIR%20REQUIREMENT%20LIST';

        //Initiate cURL.
        $ch = curl_init($url);

        //Disable CURLOPT_SSL_VERIFYHOST and CURLOPT_SSL_VERIFYPEER by
        //setting them to false.
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Execute the request.
        curl_exec($ch);

        //Check for errors.
        if(curl_errno($ch)){
                throw new Exception(curl_error($ch));
        }
/////////////////////////////////////////////////////////////// work ////////////////////////////////////////////////////        
*/        
?> 









<?php
/*
////////////////////////////// Work ///////////////////////
//The URL we are connecting to.
$url = 'https://script.google.com/macros/s/AKfycbzEzi8i6Vo5-Inq_0eFX25MSDx0ragPHgnRrZPOKr0Z0QRPMno/exec?search=AIR%20REQUIREMENT%20LIST';

//Initiate cURL.
$ch = curl_init($url);

//Disable CURLOPT_SSL_VERIFYHOST and CURLOPT_SSL_VERIFYPEER by
//setting them to false.
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

//Execute the request.
curl_exec($ch);

//Check for errors.
if(curl_errno($ch)){
    throw new Exception(curl_error($ch));
}
*/
?>














<?php

/*
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://script.google.com/macros/s/AKfycbzEzi8i6Vo5-Inq_0eFX25MSDx0ragPHgnRrZPOKr0Z0QRPMno/exec'); 
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);

    $result=curl_exec($ch);

    if(curl_error($ch))
    {
        echo 'error: ' . curl_error($ch);
    }
    else
    {
        echo $result;
    }

    curl_close($ch);
    */
?>













<?php
/*
// Initiate curl session in a variable (resource)
$curl_handle = curl_init();

$url = "https://script.google.com/macros/s/AKfycbzEzi8i6Vo5-Inq_0eFX25MSDx0ragPHgnRrZPOKr0Z0QRPMno/exec";



// Set the curl URL option
curl_setopt($curl_handle, CURLOPT_URL, $url);

// was an update from my stack overflow question.
curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, true); //https://stackoverflow.com/questions/59780986/trouble-using-curl-with-google-apps-script-web-app-in-a-php-file/59781600#59781600

// This option will return data as a string instead of direct output
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

// Execute curl & store data in a variable
$curl_data = curl_exec($curl_handle);

curl_close($curl_handle);

// Decode JSON into PHP array
$user_data = json_decode($curl_data);

// Print all data if needed
print_r($user_data);
*/
?>