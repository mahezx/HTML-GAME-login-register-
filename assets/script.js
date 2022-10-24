// untuk merubah tampilan form login & register

        function submitData(){
        $(document).ready(function(){
        var data = {
          fullname: $("#fullname").val(),
          username: $("#username").val(),
          password: $("#password").val(),
          action: $("#action").val(),
        };

        $.ajax({
            url: 'function.php',
            type: 'post',
            data: data,
            success:function(response){
              if(response == "Login Successful"){
                swal({
                    title: "Login Successful",
                    text: "Welcome back " + $("#username").val(),
                    icon: "success",
                    button: false,
                    timer: 5000,
                }); setTimeout(reload,5000)
              }else if(response == "Please Fill Out The Form!"){
                swal({
                    title: "Error!",
                    text: "Please Fill Out The Form!",
                    icon: "error",
                    button: false,
                });
            }else if(response == "Username Has Already Taken"){
                swal({
                    title: "Error!",
                    text: "Username Has Already Taken",
                    icon: "error",
                    button: false,
                });
            }else if(response =="Registration Successful"){
                swal({
                    title: "Registration Successful",
                    text: "Welcome " + $('#username').val(),
                    icon: "success",
                    button: false,
                    timer:5000,
                });setTimeout(reload,5000)
            }else if(response =="Wrong Password"){
                swal({
                    title: "Error!",
                    text: "Wrong Password!",
                    icon: "error",
                    button: false,
                });
            }else if(response =="User Not Registered"){
                swal({
                    title: "Error!",
                    text: "User Not Registered",
                    icon: "error",
                    button: false,
                });
            }
            }
        });
    });
}

function ganti1(){
    document.getElementById('logingame').remove();
    document.getElementById('registergame').style.display="block"
}

function ganti2(){
    location.reload()
}



//GAME BLOCK DASHNYA
function mulaigame(){
    document.getElementById("card-game").style.display="none"
    startGame()
}

var myGamePiece;
var myObstacles = [];
var myScore;
var Player;
var btnRestart = document.getElementById("restart");
var btnQuit = document.getElementById("quit")

function startGame() {
    myGamePiece = new component(30, 30, document.getElementById("warna").value, 50, 120);
    myScore = new component("20px", "Consolas", "black", 930, 28, "text");
    myGameArea.start();
    warnatext = document.getElementById("warna").value
    document.getElementById("isigame").style.display="block"
    document.getElementById("cardcanvas").style.display="block"
    document.getElementById("playername").style.display="block"
    document.getElementById("playername").style.color= warnatext
    document.getElementById("gambarGame").style.display="none"
    document.getElementById("kumpulbtn2").style.display="none"
    myObstacles = [];
}

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 1050;
        this.canvas.height = 450;
        this.context = this.canvas.getContext("2d");
        document.getElementById("isigame").insertBefore(this.canvas, document.getElementById("isigame").childNodes[0]);
        this.frameNo = 0;
        this.interval = setInterval(updateGameArea, 20);
        window.addEventListener('keydown', function (e) {
                myGameArea.keys = (myGameArea.keys || []);
                myGameArea.keys[e.keyCode] = true;
            })
                window.addEventListener('keyup', function (e) {
                myGameArea.keys[e.keyCode] = false;
            })
        },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    },
    stop : function() {
        clearInterval(this.interval);
    }
}

function component(width, height, color, x, y, type) {
    this.type = type;
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;    
    this.x = x;
    this.y = y;    
    this.update = function() {
        ctx = myGameArea.context;
        if (this.type == "text") {
            ctx.font = this.width + " " + this.height;
            ctx.fillStyle = color;
            ctx.fillText(this.text, this.x, this.y);
        } else {
            ctx.fillStyle = color;
            ctx.fillRect(this.x, this.y, this.width, this.height);
        }
    }
    this.newPos = function() {
        this.x += this.speedX;
        this.y += this.speedY;        
    }
    this.crashWith = function(otherobj) {
        var myleft = this.x;
        var myright = this.x + (this.width);
        var mytop = this.y;
        var mybottom = this.y + (this.height);
        var otherleft = otherobj.x;
        var otherright = otherobj.x + (otherobj.width);
        var othertop = otherobj.y;
        var otherbottom = otherobj.y + (otherobj.height);
        var crash = true;
        if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
            crash = false;
        }
        return crash;
    }
}

function updateGameArea() {
    var x, height, gap, minHeight, maxHeight, minGap, maxGap;
    for (i = 0; i < myObstacles.length; i += 1) {
        if (myGamePiece.crashWith(myObstacles[i])) {
            myGameArea.stop();
            document.getElementById("kumpulbtn2").style.display="block";
            return;
        } 
    }
    myGameArea.clear();
    myGameArea.frameNo += 1;
    if (myGameArea.frameNo == 1 || everyinterval(70)) {
        x = myGameArea.canvas.width;
        minHeight = 20;
        maxHeight = 200;
        height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight);
        minGap = 50;
        maxGap = 200;
        gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);
        myObstacles.push(new component(20, height, "#374151", x, 0));
        myObstacles.push(new component(20, x - height - gap, "#374151", x, height + gap));
    }
    for (i = 0; i < myObstacles.length; i += 1) {
        myObstacles[i].speedX = -5;
        myObstacles[i].newPos();
        myObstacles[i].update();
    }
    myScore.text="SCORE: " + myGameArea.frameNo;
    myScore.update();
    
    myGamePiece.speedX = 0;
    myGamePiece.speedY = 0;
    if (myGameArea.keys && myGameArea.keys[65]) {myGamePiece.speedX = -2; } //kiri
    if (myGameArea.keys && myGameArea.keys[68]) {myGamePiece.speedX = 2; } //kanan
    if (myGameArea.keys && myGameArea.keys[87]) {myGamePiece.speedY = -2; } //atas
    if (myGameArea.keys && myGameArea.keys[83]) {myGamePiece.speedY = 2; } //bawah
    myGamePiece.newPos();    
    myGamePiece.update();
}

function everyinterval(n) {
    if ((myGameArea.frameNo / n) % 1 == 0) {return true;}
    return false;
}

function quit(){
    location.reload()
}

function restart(){
    myGameArea.clear()
    myGameArea.stop()
    startGame();
}

function reload(){
    window.location.reload()
}
