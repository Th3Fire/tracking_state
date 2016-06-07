​<!DOCTYPE html>
<html lang="en">
<head>

    <title>เช็คสถานะการดำเนินการ</title>
    <meta charset="UTF-8"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/layout.css">

    <link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="iconic.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="js/prefix-free.js"></script>
    <link href="css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" media="screen" rel="stylesheet" type="text/css" />

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.10/clipboard.min.js"></script>-->
    <?php session_start(); require_once("connect_db.php") ?>
</head>
<body>
    <header>
        <?php include '_header.php'; ?>
    </header>
    <div id='main'>
      <article><!-- Content -->
        <table class="table-fill" >
            <thead>
                <tr>
                    <th class="text-left" width="5%">No.</th>
                    <th class="text-center" width="15%">Name</th>
                    <th class="text-center" width="20%">Email</th>
                    <th class="text-center" width="15%">Status</th>
                    <th class="text-center" width="25%">Detail</th>
                </tr>
            </thead>

            <tbody class="table-hover">
                <tr>
                    <?php
                    $sql = "SELECT ID,Name,Email,Status,Detail FROM member";
                    $result = mysqli_query($con,$sql);
                    if($result->num_rows > 0){
                            while ($rows = $result->fetch_array(MYSQL_BOTH)) {
                                $checkProcess = $rows['Status'];
                                $senEmail = substr_replace($rows['Email'], '****', 4 , 4);
                                echo "<tr>";
                                echo '<td class="text-center">'.$rows['ID'].'</td>';
                                echo '<td class="text-center">'.$rows['Name'].'</td>';
                                echo '<td class="text-center">'.$senEmail.'</td>';
                                if($checkProcess == "Processing"){
                                    echo '<td class="text-center">
                                        <a class="btEdit" id='.$rows['ID'].'><button type="button" class="btn btn-warning">
                                        <i class="icon-refresh icon-spin"></i>&nbsp'.$rows['Status'].'</button></a></td>';
                                }else if($checkProcess == "Success"){
                                    echo '<td class="text-center">
                                        <a class="btEdit" id='.$rows['ID'].'><button type="button" class="btn btn-success">
                                        <i class="icon-ok"></i>&nbsp'.$rows['Status'].'</button></a></td>';
                                }else if($checkProcess == "Fail"){
                                    echo '<td class="text-center">
                                        <a class="btEdit" id='.$rows['ID'].' ><button type="button" class="btn btn-danger">
                                        <i class="icon-remove"></i>&nbsp'.$rows['Status'].'</button></a></td>';
                                }
                                echo '<td class="text-center">
                                        <font size="3" style="float: left; padding: 12px;">'.$rows['Detail'].'&nbsp&nbsp</font>';
                                        if($rows['Detail'] != null || $rows['Detail'] != ""){
                                            echo '<a class="btChat" id='.$rows['ID'].' href="https://fb.com/messages/wuttinunt.ch" target="_blank" style="float: right; padding: 4px;"><button type="button" class="btn btn-info">
                                       <i class="icon-comment-alt"></i>&nbsp ติดต่อแอดมิน</button></a></td>';
                                        }
                                        echo '</td>';
                            echo "</tr>";
                            }
                        }
                
                ?>
            </tr>
        </tbody>

    </table>
</article><!-- Content -->
<div class="navside"></div><!-- Left side -->
<aside><!-- Right side -->
</aside><!-- Right side -->
</div>
<footer>
    <?php include 'footer.php'; ?>
</footer>

</body>
</html>
