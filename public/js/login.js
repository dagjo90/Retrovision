let $login = document.getElementsByClassName('loginScreen')[0];
let $register = document.getElementsByClassName('registerScreen')[0];
let $displayButton = document.getElementById('displayButton');
let $toggleback = document.getElementById('toggleback');

function displayRegister () {
  $login.style.display ="none";
  $displayButton.style.display ="none";
  $register.style.display ="block";
  $toggleback.style.display ="block";
}

function displayLogin () {
  $register.style.display ="none";
  $toggleback.style.display ="none";
  $login.style.display ="block";
  $displayButton.style.display ="block";
}
