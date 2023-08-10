document.getElementById("reg-error").style.display="none";
document.getElementById("medium").addEventListener("click",function(){
   document.getElementById("m-avatar").style.display="block";
})
document.getElementsByName("avatar").forEach((el)=>{
 el.addEventListener("click", function(){
   var flag = el.value;
   // alert(el.value);
   if(flag == "simple"){
     document.getElementById("s-avatar").style.display="block";
   document.getElementById("c-avatar").style.display="none";
   document.getElementById("m-avatar").style.display="none";
   }else if(flag == "medium"){
   document.getElementById("s-avatar").style.display="none";
   document.getElementById("c-avatar").style.display="none";
   document.getElementById("m-avatar").style.display="block";

   }else if(flag == "complex"){
     document.getElementById("s-avatar").style.display="none";
   document.getElementById("c-avatar").style.display="block";
   document.getElementById("m-avatar").style.display="none";
   }
})
})

var form = document.getElementById("registration");

form.addEventListener("submit",function(e){
 e.preventDefault();
 var user_name = document.getElementById("username").value;
 var user_score = 0;
 // username validation
 if(user_name!=""){
 if(validateUserName()){
  if(reg_user_check(user_name)=="1"){
   document.getElementById("reg-error").style.display="none"; 
   var level = $("input[type=radio][name='avatar']:checked").val()
    // avatar validation
 if(avatar_select() != "0"){
  if(avatar_select() == '2'){
    var user_avatar = avatar_save();
    if(user_avatar!="0"){
    register_user(user_name,user_avatar,user_score,level);
    }else{
        alert("Error occured while saving your avatar. Please try again!");
    }
   } else{
    var user_avatar = avatar_select();
    register_user(user_name,user_avatar,user_score,level);
   }
 }else{ 
  alert("please choose avatar");
 }
}else{
  $("#inuse-error").show(1000);
}
// end of avatar validation
  
 }else{
   document.getElementById("reg-error").style.display="block";
   alert("Please Register again");
 }
}else{
  // $("#space-error").css("display","block");
  $("#space-error").show(1000);
  setTimeout(function(){
    $("#space-error").hide(1000);
  },3000)

}
 // end of user validation
})
function live_user_check(data){
  data = data.value;
  if(data != ""){
  if(validateUserName()){
  let resp = reg_user_check(data);
  if(resp=="1"){
    $("#valid-name").show(1000);
    $("#reg-error").hide(1000);
    $("#inuse-error").hide(1000);
  }else {

    $("#valid-name").hide(1000);
    $("#reg-error").hide(500);
    $("#inuse-error").show(1000);
  }
}else{
  $("#valid-name").hide(1000);
    $("#reg-error").show(1000);
    $("#inuse-error").hide(1000);
}
  }else{
    $("#valid-name").css("display","none");
    $("#reg-error").css("display","none");
    $("#inuse-error").css("display","none");
  }
}
function reg_user_check(user_name){
  var check_user = $.ajax({
    url: "reg.php",
    method: "POST",
    data: {act:"user_check",username:user_name},
    async: false
  })
  return check_user.responseText;
 }
// complex avatar image save
 function avatar_save(){
  imageData = c_avatar();
// Send the POST request to the server
var resp=$.ajax({
  url: "reg.php",
  method: "POST",
  data:{image:imageData,act:"saveimg"},
  async: false
})
  return resp.responseText;
 }

// avatar save end
 
//   var re = new RegExp("/”!@#%&*()+=ˆ{}[]—;:“’<>?/","g") //”!@#%&*()+=ˆ{}[]—;:“’<>?/;

function validateUserName()

{

var inputValue = document.getElementById("username").value;

var regexPattern = /^[a-zA-Z0-9]+$/;

if(regexPattern.test(inputValue))

 {
return true;
 }
else
 {
return false;

 }

}
var m_av_src ="";
function m_av_select(el){
 document.querySelectorAll("#m-avatar img").forEach( (cl)=>{
   cl.classList.remove("avatar-selected");
 });
 el.className="avatar-selected";
 m_av_src = el.src;
}
// Avatar selection start

function avatar_select(){
    var flag = $("input[type=radio][name='avatar']:checked").val();
          if(flag == "simple"){
            m_av_src = document.getElementById("simple_av_img").src;
            return m_av_src;
          }else if(flag == "medium"){
            if(m_av_src == ""){
                return "0";
            }else{
                return m_av_src;
            }  
          }else if(flag == "complex"){
            return "2";
          }else{
            return "0";
          }
}


//Avatar selection end


// complex avatar selection start
var canvas;
var ctx;
var convavatar = document.getElementById("convavatar");
window.onload = function(){
    canvas = document.getElementById("avatar");
    ctx = canvas.getContext("2d");  
    
    mainloop();
}
var eye = new Image();
var mouth = new Image();
var skin = new Image();


eye.src = 'assets/eyes/normal.png'; 
mouth.src = 'assets/mouth/open.png'; 
skin.src = 'assets/skin/red.png'; 
function mainloop(){
    colorRect(0,0,canvas.width,canvas.height,'transparent');
    drawimg(skin,0,0,100,100);
    drawimg(eye,0,0,100,100);
    drawimg(mouth,0,0,100,100);
    
}

function colorRect(x,y,w,h,c){
    ctx.fillStyle = c;
    ctx.fillRect(x,y,w,h);
}
function drawimg(src,x,y,w,h){
    ctx.drawImage(src,x,y,w,h);
}
function select_eyes(el){
    eye.src = el.src;
    mainloop();

}
function select_mouth(el){
    mouth.src = el.src;
    mainloop();

    }
function select_skin(el){
    skin.src = el.src;
    mainloop();
    }

    function c_avatar(){
        var imgdata = canvas.toDataURL("image/png");        
        return imgdata;
    }
    async function downloadImage(
        imageSrc,
        nameOfDownload = 'my-image.png',
      ) {
        const response = await fetch(imageSrc);
      
        const blobImage = await response.blob();
      
        const href = URL.createObjectURL(blobImage);
      
        const anchorElement = document.createElement('a');
        anchorElement.href = href;
        anchorElement.download = nameOfDownload;
      
        document.body.appendChild(anchorElement);
        anchorElement.click();
      
        document.body.removeChild(anchorElement);
        window.URL.revokeObjectURL(href);
      }
// complex avatar selection end

function register_user(username,avatar,score,level){
    $.ajax({
        url: "reg.php",
        method: "post",
        data: {act:"register",username:username,avatar:avatar,score:score,level:level},
        success: function(data){
            if(data=='1'){
                $(".layer").show(10);
                $(".success-reg").show(500);
                $(".success-reg").css("display","flex");
                setTimeout(function(){
                  window.location.href="index.php";
                },1500)
            }else if(data=="inuse"){
                alert("Username used. Please select antoher username!");
            }else {
              alert("encoured error");
          }
        }
    })
}