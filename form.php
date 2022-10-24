<?php
require 'function.php';
if(isset($_SESSION["id"])){
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/form.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- javascript -->
    <script src="assets/script.js"></script>
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Welcome</title>
</head>
<body>
    <section id="logingame">
        <div class="container">
            <div class="user login">
                <div class="imgbg"><img src="assets/kda.jpg"></div>
                    <div class="form">
                        <form autocomplete="off" action="" method="post" id="inilogin" onsubmit="return false">
                            <h1>Welcome, gamers</h1>
                            <h1>Please sign in to your account</h1>
                            <input type="hidden" id="action" value="login">
                            <p class="nama">Username</p>
                            <input type="text" id="username" placeholder="Username" oninput="validasi1()" required>
                            <p id="salahNama"></p>
                            <p id="namaKosong"></p>
                            <p class="pw">Password</p>
                            <input type="password" id="password" placeholder="Password" oninput="validasi2()" required>
                            <p id="salahPw"></p>
                            <p id="pwKosong"></p>
                            <p class="lupa-pw"><a  href="">Forgot password</a></p>
                            <input id="submit" type="submit" value="SIGN IN" onclick="submitData()">     
                            <hr>
                        </form>
                        <div>
                            <div class="login-cadangan">
                                <a href="https://accounts.google.com/v3/signin/identifier?dsh=S722328013%3A1665536657178250&flowName=GlifWebSignIn&flowEntry=ServiceLogin&ifkv=AQDHYWpk87pgmcEgQpy3KM4is_y7nCthW_g1WXOoFdxfi4egCn8kVrDecnT-QBwoUYxLWhlk7fno"> 
                                     <button class="google">
                                         <div class="logo-google">
                                             <i class="fa-brands fa-google"></i>
                                         </div>
                                     </button>
                                 </a>
                             
                                 <a href="https://store.steampowered.com/login/">
                                     <button class="steam">
                                         <div class="logo-steam">
                                             <i class="fa-brands fa-steam-symbol"></i>
                                         </div>
                                     </button>
                                 </a>
                             </div>
                            <!-- ganti onclixk -->
                            <p class="signupz">Dont have account? <button id="akunbaru" onclick="ganti1()">Create an account</button></p> 
                            <div class="publisher">
                                <p>
                                    &copy; Develop by Mahesa
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  

    <!-- REGISTER YAA -->

    <section id="registergame">
        <div class="container">
            <div class="user register">
                <div class="imgbg"><img src="assets/kda.jpg"></div>
                    <div class="form">
                        <form class="registermain" autocomplete="off" action="" method="post" id="iniregister" onsubmit="return false">
                            <h1>Welcome, gamers</h1>
                            <h1>Create a new account</h1>
                            <input type="hidden" id="action" value="register" required>
                            <p class="fname">Fullname</p>
                            <input type="text" id="fullname" placeholder="Fullname" required>
                            <p class="nama">Username</p>
                            <input type="text" id="username" placeholder="Username" required>
                            <p class="pw">Password</p>
                            <input type="password" id="password" placeholder="Password" required>
                            <input id="submit" type="submit" value="SIGN UP" onclick="submitData()">
                            <hr>
                        </form>
                            <!-- ganti onclixk -->
                            <p class="signinz">Already have account? <button onclick="ganti2()" id="akunlama"> Login to your account</button></p> 
                            <div class="publisher">
                                <p>
                                    &copy; Developed by Mahesa
                                </p>
                            </div>      
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>