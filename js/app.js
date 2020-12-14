window.onscroll = function() {myFunction()};

var nav = document.getElementById("header");

var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

var flkty = new Flickity( '.main-gallery', {
    cellAlign: 'left',
    contain: true,
  });

