<?php include 'includes/config.php'?>

<?php
//daily php code goes here
if(isset($_GET['day']))
{//show selected day
    $day = $_GET['day'];
}else{//show current day
    $day = date('l');  
}


switch($day){
    case 'Monday':
        $location = 'Ballard';  
        $pic = 'bee-flower-small.jpg';
        $alt = 'Bumble Bee';
    break; 
    case 'Tuesday':
        $location = 'Woodland Park Zoo';  
        $pic = 'eagle-portait-small.jpg';
        $alt = 'Eagle';
    break; 
    case 'Wednesday':
        $location = 'London';  
        $pic = 'buckingham-light-small.jpg';
        $alt = 'Crown';
    break; 
    case 'Thursday':
        $location = 'London';  
        $pic = 'buckingham-light-small.jpg';
        $alt = 'Crown';
    break; 
    case 'Friday':
        $location = 'London';  
        $pic = 'buckingham-light-small.jpg';
        $alt = 'Crown';
    break; 
    case 'Saturday':
        $location = 'London';  
        $pic = 'buckingham-light-small.jpg';
        $alt = 'Crown';
    break; 
    case 'Sunday':
        $location = 'Hood Canal';  
        $pic = 'heron-portrait-small.jpg';
        $alt = 'Blue Heron';
    break; 


}
/*
<p>
<img src="img/<?=$pic?>" alt="<?=$alt?>" id="Daily Photo" />
</p>
img/buckingham-light-small.jpg
img/<?=$pic?>
*/
?>

<?php get_header()?>





<h3>Daily Photo</h3>
<p>Today's Photo: <?=$location?></p><br>
<img src="img/<?=$pic?>" alt="<?=$alt?>" id="Daily Photo" /><br>
<p><a href="?day=Monday">Monday</a></p>
<p><a href="?day=Tuesday">Tuesday</a></p>
<p><a href="?day=Wednesday">Wednesday</a></p>
<p><a href="?day=Thursday">Thursday</a></p>
<p><a href="?day=Friday">Friday</a></p>
<p><a href="?day=Saturday">Saturday</a></p>
<p><a href="?day=Sunday">Sunday</a></p>


<?php get_footer()?>