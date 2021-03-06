<?php
//whisky_list.php - shows a list of whisky data
?>
<?php 
require 'includes/config.php';
require 'includes/Pager.php'; #allows pagination

$sql = "select * from ScottishWhisky";
#Fills <title> tag  
$title = 'Whisky List/View/Pager';
$config->loadhead .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';

# END OF CONFIG------------------------------

get_header()?>
<h1><?=$pageID;?></h1>
<?php


$prev = '<i class="fa fa-chevron-circle-left"></i>';
$next = '<i class="fa fa-chevron-circle-right"></i>'; //font awesome arrows 

//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

# Create instance of new 'pager' class
$myPager = new Pager(5,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql,$iConn);  #load SQL, pass in existing connection, add offset

//we extract the data here
$result = mysqli_query($iConn,$sql) or 
    die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));;

if(mysqli_num_rows($result) > 0)
{//show records
        echo $myPager->showNAV();//show pager if enough records 
	if($myPager->showTotal()==1){$itemz = "whisky";}else{$itemz = "whiskies";}  //deal with plural
    echo '<p align="center">We have ' . $myPager->showTotal() . ' ' . $itemz . '!</p>';

    while($row = mysqli_fetch_assoc($result))
    {# process each row
         echo '<p align="center">
            <a href="' . $config->virtual_path . '/whisky_view.php?id=' . (int)$row['ScottishWhiskyID'] . '">' . dbOut($row['Name']) . '</a>'
            
            . '<img src="' . $config->virtual_path . '/uploads/whisky' . dbOut($row['ScottishWhiskyID']) . '_thumb.jpg" />'. '</p>'; 
    }    
	//the showNAV() method defaults to a div, which blows up in our design
    echo $myPager->showNAV();//show pager if enough records 
    
}else{//inform there are no records
    echo '<p alignt="center">There is currently no whisky. Sad.</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);
get_footer();
?>