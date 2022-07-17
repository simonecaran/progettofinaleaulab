// Logo responsive     
let logo = document.getElementById('logo')
let cards = document.querySelectorAll('.card')
function changeLogo(itGo){
if(theMusicPlay.matches){
  logo.setAttribute('src','/img/presto-logo-rid.svg')
  cards.forEach(card => {
    card.classList.add('m-auto')
  });
}
else{
  logo.setAttribute('src','/img/presto-logo.svg')
  cards.forEach(card => {
    card.classList.remove('m-auto')
  });
}
}

let theMusicPlay = window.matchMedia("(max-width:425px)")
changeLogo(theMusicPlay)
theMusicPlay.addListener(changeLogo)


let example = document.querySelector('.center')
// Spinner JS
window.addEventListener('DOMContentLoaded',()=>{
    example.classList.add('d-none')
})
let toggle = 0
let noScroll = document.querySelector(".noScroll");
let body = document.querySelector("body")
noScroll.addEventListener('click',()=>{
  if(toggle == 0){
    body.style.overflow = "hidden"
    toggle = 1
  }
  else {
    body.style.overflow ="visible"
    toggle = 0
  }
})


/** searchbar animazione */

/** searchbar fine animazione */



/** animazione header */
let words = document.getElementsByClassName('word');
if(words.length){
let wordArray = [];
let currentWord = 0;
words[currentWord].style.opacity = 1;
for (let i = 0; i < words.length; i++) {
  splitLetters(words[i]);
}

function changeWord() {
  let cw = wordArray[currentWord];
  let nw = currentWord == words.length-1 ? wordArray[0] : wordArray[currentWord+1];
  for (let i = 0; i < cw.length; i++) {
    animateLetterOut(cw, i);
  }
  
  for (let i = 0; i < nw.length; i++) {
    nw[i].className = 'letter behind';
    nw[0].parentElement.style.opacity = 1;
    animateLetterIn(nw, i);
  }
  
  currentWord = (currentWord == wordArray.length-1) ? 0 : currentWord+1;
}

function animateLetterOut(cw, i) {
  setTimeout(function() {
		cw[i].className = 'letter out';
  }, i*80);
}

function animateLetterIn(nw, i) {
  setTimeout(function() {
		nw[i].className = 'letter in';
  }, 340+(i*80));
}

function splitLetters(word) {
  let content = word.innerHTML;
  word.innerHTML = '';
  let letters = [];
  for (let i = 0; i < content.length; i++) {
    let letter = document.createElement('span');
    letter.className = 'letter';
    letter.innerHTML = content.charAt(i);
    word.appendChild(letter);
    letters.push(letter);
  }
  
  wordArray.push(letters);
}

changeWord();
setInterval(changeWord, 4000);
}

/** fine animazione header */