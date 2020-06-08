<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Influencer page</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="influencer.css" rel="stylesheet" />

  </head>
    <body>
      <!-- THIS IS THE HEADER -->
      <div class="header">
          <img src="img/logo.png" style="height:50px">
        <div class="header-right">


        </div>
      </div>



      <!-- THIS IS THE USER STATS -->
      <div style="width: 500px; float:left; height:100px; background:gray; margin:10px">
          User Stats
          <table>
            <tr>
              <th>Name</th>
              <th>Rating</th>
              <th>Audience_Size</th>
              <th>Total_Views</th>
              <th>Change_Percent</th>
            </tr>
          <?php

          $user = 'root';
          $pass = '';
          $db = 'userdb';

          $database = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");


          $sqlquery = "SELECT * FROM `user` WHERE 1";

          $query = $database-> query($sqlquery);
          if($query -> num_rows > 0) {
            while ($row = $query-> fetch_assoc()) {
              echo "<tr><td>". $row["Name"] ."</td><td>" . $row["Rating"] . "</td><td>" . $row["Audience_Size"] . "</td><td>". $row["Total_Views"] . "</td><td>" . $row["Change_Percent"] . "</td></tr>";
            }
            echo "</table>";
          }
          else {
            echo "0 result";
          }
          ?>
          </table>








          <div style="width: 500px; float:left; height:300px; background:yellow; margin-top: 40px">
            Campaigns</br>

            <ul>
            <?php
            $user = 'root';
            $pass = '';
            $db = 'userdb';
            $database = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
            $sql = "SELECT * FROM `campaign`";
            foreach ($database->query($sql) as $row) {
                if($row['Assigned'] == 'Corey Burns'){
                  if($row['Name'] == 'Nike'){
                    $li  = '<img src="img/nike.png" style="height:50px"><li> Campaign Name=' .$row['Name']. '</li>';
                  }
                  else{
                    $li  = '<img src="img/blizzard.png" style="height:50px"><li> Campaign Name=' .$row['Name']. '</li>';
                  }
                  $li .= '<li> Status=' .$row['Status']. '</li>';
                  $li .= '<li> Requirement=' .$row['Requirement']. '</li>';
                  $li .= '<li> Assigned=' .$row['Assigned']. '</li>';
                  echo $li;
                }
            }
            $db = null;
            ?>
            </ul>

          </div>
      </div>
      <!-- THIS IS THE MESSAGES-->

























      <div style="width: 100px; float:right; height:100px; background:yellow; margin:10px">
        Messages
      </div>
    </body>
  </html>
