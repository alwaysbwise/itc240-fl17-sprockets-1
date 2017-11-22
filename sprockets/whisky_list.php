<?php
//whisky_list.php - shows a list of whisky data
?>
<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
$sql = "select * from ScottishWhisky";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        echo '<p>';
        echo 'Name: <b>' . '<a href="whisky_view.php?id=' . $row['ScottishWhiskyID'] . '">' . $row['Name'] . '</a>' .'</b> ';
        echo 'Region: <b>' . $row['Region'] . '</b> ';
        echo 'ABV: <b>' . $row['ABV'] . '</b> ';
        
        // withhold description until view
        // echo 'Description: <b>' . $row['Description'] . '</b> '; 
        // remove extra link
        // echo '<a href="whisky_view.php?id=' . $row['ScottishWhiskyID'] . '">' . $row['Name'] . '</a>';
        
        echo '</p>';
    }    

}else{//inform there are no records
    echo '<p>There is currently no whisky. Sad.</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php include 'includes/footer.php';?>