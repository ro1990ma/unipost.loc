<?php
if(isset($_POST['contactFrmSubmit']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['city']) && !empty($_POST['adress'])
    && !empty($_POST['phone']) && !empty($_POST['mail']) && !empty($_POST['sklad'])){
    
    // Submitted form data
    $name   = $_POST['name'];
    $surname  = $_POST['surname'];
    $city= $_POST['city'];
    $adress= $_POST['adress'];
    $phone= $_POST['phone'];
    $mail= $_POST['mail'];
    $sklad= $_POST['sklad'];
    $iniq= $_POST['iniq'];
    $country= $_POST['country'];

    /*
     * Send email to admin 
     */
    $to     = 'upe@unipost.md';
    $subject= 'Forwarding mail Unipost.md';
    
    $htmlContent = '
    <h4>Контактные данные</h4>
    <table cellspacing="0" style="width: 400px; text-align:left;">
        <tr>
            <th>Имя:</th><td>'.$name.'</td>
        </tr>
        <tr style="background-color: #e0e0e0;">
            <th>Фамилия:</th><td>'.$surname.'</td>
        </tr>
       <tr>
            <th>Страна:</th><td>'.$country.'</td>
        </tr>
        <tr>
            <th>Город:</th><td>'.$city.'</td>
        </tr>
        <tr style="background-color: #e0e0e0;">
            <th>Адрес:</th><td>'.$adress.'</td>
        </tr>
        <tr>
           <tr style="background-color: #e0e0e0;">
            <th>ID номер:</th><td>MDL 00'.$iniq.'</td>
        </tr>
            <th>Телефон:</th><td>'.$phone.'</td>
        </tr>
          <tr style="background-color: #e0e0e0;">
            <th>Email:</th><td>'.$mail.'</td>
        </tr>
        <tr>
            <th>Склад:</th><td>'.$sklad.'</td>
        </tr>
     </table>';
    
    // Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // Additional headers
    $headers .= 'From: Unipost<info@unipost.md>' . "\r\n";
    
    // Send email 
    if(mail($to,$subject,$htmlContent,$headers)){
        $status = 'ok';
    }else{
        $status = 'err';
    }
    


//mail to costumer
 
    $to_costumer     = $mail;
    $subject_costumer= 'Ваш адрес в Германии от SHIPOTEKA';
    
    $htmlContent_costumer = '
    <h4>Ваш персональный адрес</h4>
       <table cellspacing="0" style="width: 400px; text-align:left;">
         <tr>
            <th>1. Address 1:  10 Jeerhof str.</th>
        </tr>
        <tr style="background-color: #e0e0e0;">
            <th>2. Address 2:  Kts Transportservice Gmbh / ID: MDL 00'.$iniq.'</th>
        </tr></th>
        </tr>
        <tr>
            <th>3. City: Boetersen / Ot Jeerhof</th>
        </tr>
        <tr style="background-color: #e0e0e0;">
            <th>4. Country: Germany</th>
        </tr>
        <tr>
            <th>5. Zip: D-27367</th>
        </tr>
        <tr  style="background-color: #e0e0e0;">
            <th>6. Номер телефона склада: +494268931015</th>
        </tr>
           
      </table>';
    
    // Set content-type header for sending HTML email
    $headers_costumer = "MIME-Version: 1.0" . "\r\n";
    $headers_costumer .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // Additional headers
    $headers_costumer .= 'From: Unipost<info@unipost.md>' . "\r\n";
    
    // Send email 
    if(mail($to_costumer,$subject_costumer,$htmlContent_costumer,$headers_costumer)){
        $status = 'ok';
    }else{
        $status = 'err';
    }

    // Output status
    echo $status;die;
}