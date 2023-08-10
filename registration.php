<?php
include "includes/header.php";


?>
<style>
    .layer{
        background-color: rgba(0,0,0,0.8);
        z-index:1;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: none;

    }
    .success-reg{
            font-size: 25px;
            color: #05e310;
            background-color: grey;
            position: absolute;
            top:5%;
            left:15%;
            width: 70%;
            height: 15%;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            display: none;
    }
    </style>
    <script src="js/html2canvas.js"></script>
<main id="main" class="pt-5 pb-3">
    <div class="layer"></div>
    <div class="success-reg">
            Registered! Redirecting to Home page...
    </div>
    <form id="registration" >
        <h1 style="margin-bottom: 50px;">Register</h1>   
            
            <label>
            <h2>Username/nickname</h2>    
            <input type="text" id="username" name="username" placeholder="Enter your username..." onkeyup="live_user_check(this)"></label>
            <div class="reg-error" id="reg-error">Entered invalid character. Please use valid username</div>
            <div class="valid-name" id="valid-name">You can use this username</div>
            <div class="inuse-error" id="inuse-error">Entered username is in use</div>
            <div class="space-error" id="space-error">Please enter username!</div>
            <div class="avatar-selector">
                <h2>Avatar selector/generator</h2>
            <label for="simple">
                <input id="simple" name="avatar" type="radio" value="simple" checked>
                Simple
            </label>
            <label for="medium">
                <input id="medium" name="avatar" type="radio" value="medium">
                Medium
            </label>
            <label for="complex">
                <input id="complex" name="avatar" type="radio" value="complex">
                Complex
            </label>
            <div id="s-avatar">
            <img src="assets/medium/m-1.png" id="simple_av_img" alt="" class="avatar-selected" onclick="m_av_select(this)">

            </div>
            <div id="m-avatar">
              <img src="assets/medium/m-1.png" alt="" onclick="m_av_select(this)">
              <img src="assets/medium/m-2.png" alt=""  onclick="m_av_select(this)">
              <img src="assets/medium/m-3.png" alt=""  onclick="m_av_select(this)">
            </div>
            <div id="c-avatar">
            <div class="av-img">
        <div class="eyes">
            <img src="assets/eyes/closed.png" onclick="select_eyes(this)" alt="">
            <img src="assets/eyes/laughing.png" onclick="select_eyes(this)" alt="">
            <img src="assets/eyes/long.png" onclick="select_eyes(this)" alt="">
            <img src="assets/eyes/normal.png" onclick="select_eyes(this)" alt="">
            <img src="assets/eyes/rolling.png" onclick="select_eyes(this)" alt="">
            <img src="assets/eyes/winking.png" onclick="select_eyes(this)" alt="">
        </div>
        <div class="mouth">
            <img src="assets/mouth/open.png" onclick="select_mouth(this)" alt="">
            <img src="assets/mouth/sad.png" onclick="select_mouth(this)" alt="">
            <img src="assets/mouth/smiling.png" onclick="select_mouth(this)" alt="">
            <img src="assets/mouth/straight.png" onclick="select_mouth(this)" alt="">
            <img src="assets/mouth/surprise.png" onclick="select_mouth(this)" alt="">
            <img src="assets/mouth/teeth.png" onclick="select_mouth(this)" alt="">
        </div>
        <div class="skins">
            <img src="assets/skin/green.png" onclick="select_skin(this)" alt="">
            <img src="assets/skin/red.png" onclick="select_skin(this)" alt="">
            <img src="assets/skin/yellow.png" onclick="select_skin(this)" alt="">
        </div>
    </div>
    <h4>Your avatar: </h4>
    <canvas id="avatar" width="100" height="100" crossorigin="anonymous" >
    </canvas>
            </div>
            </div>
            <input type="submit" value="Register me">
    </form>

</main>
<script src="js/registration.js"></script>
<?php
include "includes/footer.php";