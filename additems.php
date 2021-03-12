<?php include('server.php')?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Price Tracker</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <header>
        <nav id="header-nav" class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="http://192.168.68.105:3000/index.html" class="pull-left visible-md visible-lg">
                        <div id="icon-img" alt="Logo image"></div>
                    </a>
                    <div class="navbar-brand">
                        <a href="http://192.168.68.105:3000/index.html">
                            <p>price tracker.</p>
                        </a>
                    </div>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#collapsable-nav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span><!-- Screen Reader only-->
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="collapsable-nav" class="collapse navbar-collapse">
                    <ul id="nav-list" class="nav navbar-nav navbar-right">
                        <li><a href="http://192.168.68.105:3000/index.html">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="index.html" name="logout" onclick=>Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--Add Items-->
    <div class="mainadditems">
        <p class="sign" align="center">Enter Item Details</p>
        <form class="form2" action="server.php" method="post">
            <input class="itemname" type="text" required name="itemname" align="center" placeholder="Item Name" value="<?php echo $itemname; ?>">
            <input class="itemlink" type="url" required name="itemlink" align="center" placeholder="Item URL" value="<?php echo $itemlink; ?>">
            <input class="price" type='number' required name="price" align='center' placeholder="Price" value="<?php echo $price; ?>">
            <button type="submit" class="submititem" name="sub_item" align="center">Add Item</button>
    </div>

    <!--Footer-->
    <footer class="panel-footer">
        <div class="container-fluid">
            <div class="row">
                <section id="phone" class="col-sm-4">
                    <a href="tel:9538972377">Call Us at +91 9538972377</a>
                    <hr class="visible-xs">
                </section>
                <section id="emailid" class="col-sm-4">
                    <a href="mailto: anisha.r.rao@gmail.com">Send Us an Email at anisha.r.rao@gmail.com</a>
                    <hr class="visible-xs">
                </section>
                <section id="copyright" class="col-sm-4">
                    <p>&copy; Copyright price tracker. 2021</p>
                </section>
                </span>
            </div>
        </div>
    </footer>

    <!--jQuery (Boostrap js plugins depend on it)-->
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>
<!--<div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>-->

</html>