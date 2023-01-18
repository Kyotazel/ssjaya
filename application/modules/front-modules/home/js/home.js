var url_controller = baseUrl + '/' + prefix_folder + '/' + _controller + '/';

// Carousel
var slidePosition = 1;
SlideShow(slidePosition);

// forward/Back controls
function plusSlides(n) {
  SlideShow(slidePosition += n);
}

//  images controls
function currentSlide(n) {
  SlideShow(slidePosition = n);
}

function SlideShow(n) {
  var i;
  var slides = document.getElementsByClassName("Containers");
  var circles = document.getElementsByClassName("dots");
  if (n > slides.length) {slidePosition = 1}
  if (n < 1) {slidePosition = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < circles.length; i++) {
      circles[i].className = circles[i].className.replace(" enable", "");
  }
  slides[slidePosition-1].style.display = "block";
  circles[slidePosition-1].className += " enable";
} 

// Testimoni
var slidePositionTesti = 1;
SlideShowTesti(slidePositionTesti);

// forward/Back controls
function plusSlidesTesti(n) {
  SlideShowTesti(slidePositionTesti += n);
}

//  images controls
function currentSlide(n) {
  SlideShowTesti(slidePositionTesti = n);
}

function SlideShowTesti(n) {
  let i;
  let slides = document.getElementsByClassName("Containers-testi");
  if (n > slides.length) {slidePositionTesti = 1}
  if (n < 1) {slidePositionTesti = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slidePositionTesti-1].style.display = "block";
} 
