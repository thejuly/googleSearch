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

<div class="container" style="padding-top:10px">

    <div class="col-md-4" style="background-color:#D6EAF8">
	<h3 align="center">Enter your keyword</h3>

      <form  name="form1" action="index.php" method="POST" id="login" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
           <input type="text" id="url" name="url" class="form-control" required placeholder="Keyword here" autocomplete="off"/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
           <input type="number" name="size" class="form-control" min="50" max="300"required placeholder="50-300" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" id="btn"> Search </button>
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
if ($_POST["MM_insert"] == "form1" && $_POST["url"] <> "" && $_POST["size"] <> "") {
	$url = $_POST["url"];
	$size = $_POST["size"];	
	
	//echo "Your data: ".$url."<br>";
	//echo "Your size: ".$size;
        
        /////////////////////////// Start curl ////////////////////////////
        $ch = curl_init(); 
  
        // set url 
        //curl_setopt($ch, CURLOPT_URL, "http://10.29.81.199/notify/chk_cogent.php"); 
        $APPS_SCRIPT_URL = 'https://script.google.com/macros/s/AKfycbzEzi8i6Vo5-Inq_0eFX25MSDx0ragPHgnRrZPOKr0Z0QRPMno/exec?search=AIR%20REQUIREMENT%20LIST';
        //$APPS_SCRIPT_URL = 'https://script.google.com/macros/s/AKfycbwhjwq4JhNcLqm-9gYeOKh3Glz8v-etLiuylfMHepI/dev?search=AIR%20REQUIREMENT%20LIST';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $APPS_SCRIPT_URL); 
  
        // Return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  
        // $output contains the output string 
        $output = curl_exec($ch); 
        echo $output; 
  
        // Close curl resource to free up system resource
        curl_close($ch);  
         /////////////////////////// End curl ////////////////////////////


/*
        ///////// Start Google search ///////////
        $myArray = ['testAppScript : Link = https://script.google.com/d/1n25Cu_wHLnCIjxvNttN4TF6MCb5lWTyF1fk0W6JfFMMOUXZwbfL4yfp1/edit?usp=drivesdk' ,'Turbo Sulzer .pdf : Link = https://drive.google.com/file/d/149viLe0Em9jCDiL-Di8GqhFe9BxCB5zq/view?usp=drivesdk', '01_AR9607091A-01.pdf : Link = https://drive.google.com/file/d/19Se6thvcNLp0UZEL2bFN_LgCS4V3pz_k/view?usp=drivesdk'];
        
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
  */

        
}
?>


</body>
</html>















































<?php 
        // Create curl resource 
 /*       
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

/*
        //         <td width="80" align="center" nowrap="NOWRAP"><div align="center" class="style5">Area</div></td>
        $myArray = ['testAppScript : Link = https://script.google.com/d/1n25Cu_wHLnCIjxvNttN4TF6MCb5lWTyF1fk0W6JfFMMOUXZwbfL4yfp1/edit?usp=drivesdk' ,'Turbo Sulzer .pdf : Link = https://drive.google.com/file/d/149viLe0Em9jCDiL-Di8GqhFe9BxCB5zq/view?usp=drivesdk', '01_AR9607091A-01.pdf : Link = https://drive.google.com/file/d/19Se6thvcNLp0UZEL2bFN_LgCS4V3pz_k/view?usp=drivesdk'];
        //$myArray = [];

        $i = 0;
        print "<table border=1>";
        print "<tr>";
        //print '<th bgcolor="#FFFF00" colspan=2>Your Result</th>';
        //print '<th bgcolor="pink" colspan=2>Your Result</th>';
        //print '<th bgcolor="#00BFFF" colspan=2>Your Result</th>';
        //print '<th bgcolor="#00BFFF" colspan=2 width="300">Your Result</th>';
        //print '<th bgcolor="#00BFFF" colspan=2 width="300">Your Result</th>';
        //print "</tr>";
        print "<tr bgcolor=#DB7093 colspan=2 > <td style=text-align:center width=70>No.</td> <td style=text-align:center>Document Name</td> </tr>";
        if(sizeof($myArray)){
        foreach( $myArray as $value ) {
                $i++;
                $txt_split = explode(" : Link = ",$value);
                //$link_url = '<a href="'. $txt_split[1] .'" target="_blank" >Open Document</a>';
                //print "<tr> <td>$txt_split[0]</td> <td style=text-align:center>$link_url</td></tr>";
                
                $link_url = ' - ' . '<a href="'. $txt_split[1] .'" target="_blank" >' . $txt_split[0] . '</a>';
                print "<tr> <td style=text-align:center>$i</td> <td>$link_url</td> </tr>";

        
        }
        }else{
                
                print "<tr> </tr>"; print "<tr> </tr>"; print "<tr> </tr>";
                print "<th bgcolor=#DCDCDC colspan=2 style=color:#8B0000;text-align:center>No Document Found!</th>";
        }

        $a = "testAppScript : Link = https://script.google.com/d/1n25Cu_wHLnCIjxvNttN4TF6MCb5lWTyF1fk0W6JfFMMOUXZwbfL4yfp1/edit?usp=drivesdk";
*/
?> 













<?php 

        /*
        //$APPS_SCRIPT_URL = 'https://script.google.com/macros/s/AKfycbzEzi8i6Vo5-Inq_0eFX25MSDx0ragPHgnRrZPOKr0Z0QRPMno/exec?search=AIR';
        $APPS_SCRIPT_URL = 'https://script.google.com/macros/s/AKfycbwhjwq4JhNcLqm-9gYeOKh3Glz8v-etLiuylfMHepI/dev?search=AIR%20REQUIREMENT%20LIST';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $APPS_SCRIPT_URL); 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $content = trim(curl_exec($ch));
        curl_close($ch);    
        echo $content;      
        */

  /*      
        $myArray = ['testAppScript : Link = https://script.google.com/d/1n25Cu_wHLnCIjxvNttN4TF6MCb5lWTyF1fk0W6JfFMMOUXZwbfL4yfp1/edit?usp=drivesdk' ,'Turbo Sulzer .pdf : Link = https://drive.google.com/file/d/149viLe0Em9jCDiL-Di8GqhFe9BxCB5zq/view?usp=drivesdk', '01_AR9607091A-01.pdf : Link = https://drive.google.com/file/d/19Se6thvcNLp0UZEL2bFN_LgCS4V3pz_k/view?usp=drivesdk'];
        echo $myArray[0] . "<br>";
        echo count($myArray)
        echo sizeof($myArray);

        $array = array(6,7,8,9,10);
        $i = 0;
        
        foreach( $myArray as $value ) {
                echo "Array Index [$i] : ".$value."<br/>";
                $i++;
                echo "<br>"; 

                $str = $value;
                print_r (explode(" : Link = ",$str));
                echo "<br>";    
        }
*/

/*
        $familtytan =array("fater"=>"Sarid" , "mater"=>"Pakawadee" , "me"=>"tan" , "grilfrind" =>"Beauty");
        print "<table border=1>";
        print "<tr>";
        print "<th colspan=2>my famirly tan</th>";
        print "</tr>";
        foreach ($familtytan as $key => $name){
        print "<tr> <td>$familtytan[$key]</td><td>$key</td></tr>";
        }
        print "</table>";
*/
        
/*
        $familtytan =array("fater"=>"Sarid" , "mater"=>"Pakawadee" , "me"=>"tan" , "grilfrind" =>"Beauty");
        print "<table border=1>";
        print "<tr>";
        print "<th colspan=2>my famirly tan</th>";
        print "</tr>";
        foreach ($familtytan as $key => $name){
        print "<tr> <td>$familtytan[$key]</td><td>$key</td></tr>";
        }
        print "</table>";
*/
?>