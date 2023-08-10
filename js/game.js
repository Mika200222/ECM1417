// var level="";
var user=""

function start_game(){
  document.getElementById("start-g").style.display="none";
    document.getElementById("game").style.display="block";
    document.getElementById("cards").style.display="block";
    document.querySelector(".result").style.display="none";
    
    
    
    
    var myCards = document.getElementById('cards');
myCards.innerHTML="";
var resultsArray = [];
var counter = 0;
var text = document.getElementById('text');
text.innerHTML="";
var seconds = 0; 
var tens = 0; 
var score = 0;
var appendTens = document.getElementById("tens");
var appendSeconds = document.getElementById("seconds");
appendTens.innerHTML="0";
appendSeconds.innerHTML="0";
var Interval ;
var images = [
  '1', 
  '2', 
  '3',
  '4'
];
clearInterval(Interval);
    Interval = setInterval(startTimer, 10);
function randomIntFromInterval(min, max) { // min and max included 
    return Math.floor(Math.random() * (max - min + 1) + min)
  }
  
    var test = randomIntFromInterval(0,images.length-1);
    var clone=Array(2).fill(images[test]);
    var cards = images.concat(clone); // merge to arrays
    

function repeat(item, times) {
    let rslt = [];
    for(let i = 0; i < times; i++) {
        rslt.push(item)
    }
    return rslt;
}
// Shufffel function
function shuffle(o){
  for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i],   o[i] = o[j], o[j] = x);
  return o;
}
shuffle(cards);


for (var i = 0; i < cards.length; i++) {
  card = document.createElement('div');
  card.dataset.item = cards[i];
  card.dataset.view = "card";
  myCards.appendChild(card);
     
  card.onclick = function () {
   
    if (this.className != 'flipped' && this.className != 'correct'){
        this.className = 'flipped';
        var result = this.dataset.item;
        resultsArray.push(result);
        
    }
  
    if (resultsArray.length > 1) {

      if (resultsArray[0] === resultsArray[1]) {
        
      } else {
       counter++;
        check("reverse");
        resultsArray = [];
      }
      
    }
    if (resultsArray.length > 2) {

        if (resultsArray[1] === resultsArray[2]) {
          check("correct");
          win();
          resultsArray = [];
        } else {
            counter++;
          check("reverse");
          resultsArray = [];
        }
        
      }
  }
   
};


var check = function(className) {
  
  var x = document.getElementsByClassName("flipped");
  setTimeout(function() {

    for(var i = (x.length - 1); i >= 0; i--) {
      x[i].className = className;
    }
     
  },500);
   
}

var win = function () {
    clearInterval(Interval);
    score = (100-counter*3>0)?100-counter*3:0;
    text.innerHTML = "Your time was " + seconds + ":" + tens+" Your point: "+score;
    // clear_time();
      document.querySelector(".result").style.display="block";
      document.getElementById("cards").style.display="none";
    
  }

function clear_time(){
  appendTens.innerHTML="0";
appendSeconds.innerHTML="0";
}
     
function startTimer () {
  tens++; 
    
  if(tens < 9){
    appendTens.innerHTML = "0" + tens;
  }
    
  if (tens > 9){
    appendTens.innerHTML = tens;
      
  } 
    
  if (tens > 99) {
    seconds++;
    appendSeconds.innerHTML = "0" + seconds;
    tens = 0;
    appendTens.innerHTML = "0" + 0;
  }
    
  if (seconds > 9){
    appendSeconds.innerHTML = seconds;
  }
  
}
document.getElementById("submit").addEventListener("click", function(){
  $.ajax({
    url: "reg.php",
    method: "post",
    data: {act:"score",score:score},
    success: function(){
      window.location.href = "leaderboard.php";
    }
  })
})
}
function again(){
  start_game();
}
// function simple(){

// };
// card_cr(6);
// function card_cr(c){
//     var card_c = document.querySelector(".cards");
//     var content ="";
//     for(var i = 0;i<c;i++){
        
//         content += '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center align-items-center">';
//         content+='<div class="card"><div class="card-front"><span>1</span><span>1</span></div>';
//         content+=' <div class="card-back"><img src="assets/game/1.png" alt=""></div></div></div>';
//     }
//     card_c.innerHTML=content;
//     const card = document.querySelectorAll(".card");
//     card.forEach((c)=>{
//         c.addEventListener("click",function(){
//             if(!c.classList.contains("flip")){
//                 c.classList.add("flip");
//             }
//         })
//     })
// }

function game_content(){

}