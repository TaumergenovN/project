<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Spare Store</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    
    
</head>

<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require_once "connect.php";

?>
 
<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="welcome.php">Spare Store</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="welcome.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link">Search</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page lanidng-page">
        <h2 class="text-center">Welcome, <b><?php echo htmlspecialchars($_SESSION["username_w"]); ?></b>&nbsp;</h2>
        
        <!-- </table>
            <script type="text/javascript">
            function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
            }
        </script>
        
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

        
        
        
        -->

        <section style="padding-top: 50px;padding-bottom: 50px;">

        <div style="margin-right: 105px;margin-left: 45px; padding-bottom: 30px">
            <div class="row padMar">
                <div class="col padMar">
                    <div class="input-group">
                        
                        <form method="POST" class="input-group">
                            <div class="input-group-prepend" ></div><input class="form-control autocomplete" type="text" placeholder="Search" name="search_value" />
                            <div class="input-group-append" style="width: 0px;"><input class="btn btn-warning" type="submit" value="Search" name="search_submit"></input></div>
                    
                        </form>     
                   
                    </div>
                </div>
            </div>
        </div>
            <?php
                require_once "connect.php";
                
                $results = mysqli_query($link,"SELECT * FROM items");
                if(!empty($_REQUEST['search_submit'])){
                    $search_value=$_POST['search_value'];
                }

                $data = array(
                    array()
                );
                $int = 0;
                while( $row = mysqli_fetch_array($results) ){  
                    for ($x=0; $x<8; $x++){
                        $data[$int][$x]=$row[$x];
                    }
                    $int++;
                }
                echo $search_value;
                echo '<br>';

                echo $data[2][2];
                //for ($q=0;q<$int;$q++){}

                
 
 
                //echo '<img src="data:image/jpeg;base64,'.base64_encode($data[][7]).'" height="200" width="200"/>';

                $results = mysqli_query($link,"SELECT * FROM items");
       
                while( $row = mysqli_fetch_array($results) ){
            
            ?>
                
                <div>
                    <div class="row no-gutters" style="height: 200px;margin-bottom: 20px;">
                        <div class="col-2" style="text-align: center;">

                            <?php
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200"/>';
                            ?>

                        </div>
                        <div class="col-9">
                        <table class="table" style="font-size: 20px;">
                            <thead>
                                <tr>
                                    <th>Item name</th>
                                    <th>Car model</th>
                                    <th>Item Condition</th>
                                    <th>Number</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php
                                            echo $row['name'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $row['mark'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $row['item_condition'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $row['number'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $row['price'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $row['description'];
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                            <br>
                        </div>
                    </div>
                </div>
            
            <?php
                }

            ?>
            
            
            
            
            
            
        
        </section>
        
    </main>
    
    <footer class="page-footer">
        <div class="container">
            <div class="links"><a href="welcome.php">Home</a></div>
            <div class="social-icons"><a href="https://github.com/TaumergenovN" target="_blank"><i class="icon ion-social-github"></i></a></div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>