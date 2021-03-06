<?php include 'includes/config.php'?>
<?php
$heros[] = '<img src="images/coulson.png" />';
$heros[] = '<img src="images/fury.png" />';
$heros[] = '<img src="images/hulk.png" />';
$heros[] = '<img src="images/thor.png" />';
$heros[] = '<img src="images/black-widow.png" />';
$heros[] = '<img src="images/captain-america.png" />';
$heros[] = '<img src="images/machine.png" />';
$heros[] = '<img src="images/iron-man.png" />';
$heros[] = '<img src="images/loki.png" />';
$heros[] = '<img src="images/giant.png" />';
$heros[] = '<img src="images/hawkeye.png" />';
$config->hero .= randomize($heros);
?>

<?php get_header()?>
<hr class="divider">
<h2 class="text-center text-lg text-uppercase my-0">Appointment
  <strong>Form</strong>
</h2>
<hr class="divider">
<?php 
  
//Point this to the client's email when done:
$to      =  'briandwise7@gmail.com';
    
if(isset($_POST["FirstName"]))
{// if data, show it
    $FirstName = clean_post('FirstName');
    $LastName = clean_post('LastName');
    $Email = clean_post('Email');
    //$Comments = clean_post('Comments');
    
    $myText = process_post();
    
    /*
    $myText = "User's name and email:" . PHP_EOL . PHP_EOL; //double newlines
    $myText .= $FirstName . " " . $LastName . " " . $Email .PHP_EOL .PHP_EOL;
    $myText .= "Message: " . PHP_EOL . $Comments . PHP_EOL;

*/
    $subject = 'ITC 240 contact from ' . $FirstName . " " . $LastName . " " . date("m/d/y - G:i:s");

    
    $headers = 'From: noreply@brian.wise.xyz' . PHP_EOL .
        'Reply-To: '. $Email . PHP_EOL .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $myText, $headers);

    
    
    echo '
    <h4>Your message was successfully sent</h4>
    <p>We\'ll get back to you within 48 hours</p>
    <p><a href="">Exit</a></p>
    ';
    
}else{//show form
    /*
    
    Radio buttons - Appointment Type
    
    Intake
    Degree audit
    Registration


    Checkboxes - Special Requests
    Online meeting 
    Early morning
    Official Transcript

    Appointment Date
    
    
    
    */
    echo '
        <form action="" method="post">
          <div class="row">
            <div class="form-group col-lg-4">
              <label class="text-heading">First Name</label>
              <input type="text" name="FirstName" autofocus required class="form-control">
            </div>

            <div class="form-group col-lg-4">
              <label class="text-heading">Last Name</label>
              <input type="text" name="LastName" required class="form-control">
            </div>
            <div class="form-group col-lg-4">
              <label class="text-heading">Email Address</label>
              <input type="email" name="Email" required class="form-control">
            </div>
            
            <div class="clearfix"></div>
            <div class="form-group col-lg-4">
              <label class="text-heading">Appointment Type</label><br/>
              <input type="radio" name="Appointment_Type" value="Intake" /> Intake <br />
              <input type="radio" name="Appointment_Type" value="Degree Audit" /> Degree Audit <br />
              <input type="radio" name="Appointment_Type" value="Registration" /> Registration <br />
            </div>
            
            <div class="form-group col-lg-4">
              <label class="text-heading">Special Requests</label><br/>
              <input type="checkbox" name="Special Requests[]" value="Online Meeting" /> Online Meeting <br />
              <input type="checkbox" name="Special Requests[]" value="Early Morning" /> Earling Morning <br />
              <input type="checkbox" name="Special Requests[]" value="Official Transcript" /> Official Transcript <br />
            </div>
            
            
            
            <div class="form-group col-lg-4">
              <label class="text-heading">Appointment Date/Time</label>
              <input type="date" name="Appointment_Time" required class="form-control">
            </div>  
         <div class="clearfix"></div>      
            
            <div class="form-group col-lg-12">
              <label class="text-heading">Comments</label>
              <textarea class="form-control" name="Comments" rows="6"></textarea>
            </div>
            <div class="form-group col-lg-12">
              <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
          </div>
        </form>
    ';  
}


?>
<?php get_footer()?>
<?php 



function clean_post($key){
    
    if(isset($_POST[$key])){
        return strip_tags(trim($_POST[$key]));
    }else{
        return '';}
}

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
}