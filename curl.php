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

/*        $APPS_SCRIPT_URL = 'https://script.google.com/macros/s/AKfycbzEzi8i6Vo5-Inq_0eFX25MSDx0ragPHgnRrZPOKr0Z0QRPMno/exec';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $APPS_SCRIPT_URL); 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $content = trim(curl_exec($ch));
        curl_close($ch);    
        echo $content;      
        echo "a";
*/

        //$url = 'https://script.google.com/macros/s/AKfycbwPn8wirdu9PDpSn1E5rC-Odrlj0FX2z9YjhNKO6AUxv8JyZ3E/exec?search=' . $post_url . "$search2=" . $post_size;
        //$rul = 'https://script.google.com/macros/s/AKfycbwPn8wirdu9PDpSn1E5rC-Odrlj0FX2z9YjhNKO6AUxv8JyZ3E/exec?search=เรื่อง&search2=pdf';
        $rul = 'https://script.google.com/macros/s/AKfycbwPn8wirdu9PDpSn1E5rC-Odrlj0FX2z9YjhNKO6AUxv8JyZ3E/exec';

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
        //echo $response;
        curl_close($curl);

        $txt_split = explode(",",$response);
        
        echo "end";
?> 


