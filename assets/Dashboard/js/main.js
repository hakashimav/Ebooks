// menu toggle
var toggle = document.querySelector('.toggle');
var navigation = document.querySelector('.navigation');
var main = document.querySelector('.main');

toggle.onclick = function(){
    navigation.classList.toggle('active')
    main.classList.toggle('active')
}
// add hovered class in selected list item
var list = document.querySelectorAll('.navigation li');
function activelink(){
    list.forEach((item)=>
    item.classList.remove('hovered'));
    this.classList.add('hovered')
}
list.forEach((item) =>
item.addEventListener('mouseover',activelink))