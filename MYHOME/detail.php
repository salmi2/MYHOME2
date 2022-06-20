<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ab021e0629.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="nav_footer/style_nav.css"> 
    <link rel="stylesheet" href="detail.css">
    <title>Document</title>
</head>
<body>
    <?php include "../MYHOME/nav_footer/navbar.php"?>
    <?php include "connexion.php"?>

    <?php
        if(isset($_REQUEST['id_house'])){
            $id = $_REQUEST['id_house'];
            $select = "SELECT * FROM house H INNER JOIN galary G ON H.ID_house = G.ID_house WHERE H.ID_house = $id";
            $data = mysqli_query($conn, $select);
        }
    ?>

    <main>
        <div id="border_div">
            <div id="container">
                    <?php
                    $rows = array();
                        while($row = mysqli_fetch_assoc($data)){
                            $rows [] = $row;
                        }
                            echo'
                            <div class="child_container">
                                <a href="home.php"><h1>MY<span>HOME</span></a>
                                <h3 class="title_detail">'.$rows[0]["title"].'</h3>
                                <p>'.$rows[0]["adress"].'</p>
                                <h3>Description of the property</h3>
                                <p class="para">'.$rows[0]["description"].'</p>
            
                                <button>home information</button>
                                <a href="Sellerdetail.php?id_house='.$rows[0]["ID_house"].'"><button class="btn_detail">Seller Information</button></a>
                            </div>
                            <div class="img_detail">
                                <img src="images/'.$rows[0]["image"].'">
                                <div id="img_aside">';
                                for($i=1; $i<count($rows); $i++){
                                    echo '<img src="images/'.$rows[$i]["image"].'">';
                                }

                            echo '</div>
                            </div>
                            <div id="icon_div">
                                <a href="houses.php#sales_houses"><i class="fa-solid fa-arrow-right-long"></i></a>
                                <a href="Sellerdetail.php"><i class="fa-solid fa-arrow-left-long"></i></a>
                            </div>
                            ';
                        
                    ?>

            </div>
        </div>
    </main>
</body>
</html>