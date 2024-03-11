<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sidebar 03</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" >
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4">
            <div class="rounded-image">
            <img src="images\logo\img\logo.png.jpeg" alt="" width="120">
            </div>
                <h1><a href="index.html" class="logo">Colegio De Galera</a></h1>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href=""><span class="fa fa-home mr-3"></span> Home</a>
                    </li>
                    <li>
                        <a href="profile"><span class="fa fa-user mr-3"></span> About</a>
                    </li>
                    <li>
                        <a href="profile"><span class="fa fa-briefcase mr-3"></span> Portfolio</a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-paper-plane mr-3"></span> Contact</a>
                    </li>
                    <li>
                        <a href="notifications"><span class="fa fa-bell mr-3"></span> Notifications</a>
                    </li>
                    <li>
                        <a href="logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
                    </li>
                </ul>
        
            

                

                <div class="mb-5">
                    <h3 class="h6 mb-3">Subscribe for newsletter</h3>
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <div class="icon"><span class="icon-paper-plane"></span></div>
                            <input type="text" class="form-control" placeholder="Enter Email Address">
                        </div>
                    </form>
                </div>
        
                <div class="footer">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4"></h2>
            <p></p>
            <p></p>
        </div>
    </div>
    <img src="images1/dd.jpg" alt="My Profile" width="80" style="position: absolute; right: 1px; top: 0px; border-radius: 50%;" onclick="toggleModal()">

<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <p>My Profile</p>
        <p>Log out</p>
        <span onclick="toggleModal()">Close</span>
    </div>
</div>
    <style>


            .rounded-image {
                border-radius: 50%;
                width: 115px; /* Adjust the width to your preference */
                height: 110px; /* Adjust the height to your preference */
                overflow: hidden;
            }
                
            h1 {
                    color: #3498db;
                    text-shadow: 2px 2px 4px #666;
                    margin-top: 50px;
                }

                .logo {
                    text-decoration: none;
                    font-size: 36px;
                    font-weight: bold;
                }

                .logo:hover {
                    color: #1abc9c;
                }
                .modal {
                                display: none;
                                position: fixed;
            top: 100px; /* Adjust this value as needed */
            left: 1445px;
            width: 10%;
            height: 20%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
                    }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
              position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            text-align: center;
        }

        img {
            cursor: pointer;
        }
            </style>
       
    <script>
        // JavaScript functions for modal functionality
        function toggleModal() {
            var modal = document.getElementById('myModal');
            if (modal.style.display === 'flex') {
                modal.style.display = 'none';
            } else {
                modal.style.display = 'flex';
            }
        }

        // Close the modal if the user clicks outside of it
        window.onclick = function(event) {
            if (event.target == document.getElementById('myModal')) {
                toggleModal();
            }
        };
    </script>
    <script>
    function toggleModal() {
        var modal = document.getElementById('myModal');
        modal.style.display = (modal.style.display === 'none' || modal.style.display === '') ? 'block' : 'none';
    }
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
