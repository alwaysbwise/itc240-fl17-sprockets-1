<?php
//whisky_view.php - shows details of a single whisky expression
?>
<?php include 'includes/config.php';?>
<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:whisky_list.php');
}


$sql = "select * from ScottishWhisky where ScottishWhiskyID = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $Name = stripslashes($row['Name']);
        $Region = stripslashes($row['Region']);
        $ABV = stripslashes($row['ABV']);
        $Description = stripslashes($row['Description']);
        $title = "Title Page for " . $Name;
        $pageID = $Name;
        $Feedback = '';//no feedback necessary
    }    

}else{//inform there are no records
    $Feedback = '<p>This whisky does not exist</p>';
}

?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
    
    
if($Feedback == '')
{//data exists, show it

    echo '<p>';
    echo 'Name: <b>' . $Name . '</b> ';
    
    echo '<br>';
    echo '<img src="uploads/whisky' . $id . '.jpg" />';
    echo '<br>';
    echo 'Region: <b>' . $Region . '</b> ';
    echo 'ABV: <b>' . $ABV . '</b> ';
    echo '<br>';
    echo 'Description: <b>' . $Description . '</b> ';
    
    
    
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

echo '<p><a href="whisky_list.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php include 'includes/footer.php';?>