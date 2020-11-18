var init = function() {
  var card = document.getElementById('card');
  var login = document.getElementById('login');
  
  document.getElementById('flip').addEventListener( 'click', function(){
    card.toggleClassName('flipped');
    login.style = "height: 430px;-webkit-transition: height 0.40;-o-transition: height 0.40;transition: height 0.40;";
  }, false);
};

window.addEventListener('DOMContentLoaded', init, false);