var url_controller = baseUrl + "/" + prefix_folder + "/" + _controller + "/";

var my = new Splide("#my-carousel", {
  type: "loop",
  autoplay: "playing",
  rewind: true,
});

my.mount();

var product = new Splide("#main-carousel", {
  type: "fade",
  autoplay: "playing",
  pagination: false,
  rewind: true,
  arrows: false,
  breakpoints: {
    768: {
      pagination: true
    },
  },
});

var product_thumbnail = new Splide("#thumbnail-carousel-product", {
  arrows: true,
  fixedWidth: 180,
  fixedHeight: 100,
  rewind: true,
  pagination: false,
  isNavigation: true,
  breakpoints: {
    768: {
      fixedWidth: 60,
      fixedHeight: 44,
    },
  },
});

product.sync(product_thumbnail);
product.mount();
product_thumbnail.mount();

// Testimoni
var testimoni = new Splide("#testimoni-carounsel", {
  type: "loop",
  autoplay: "playing",
  rewind: true,
});

testimoni.mount();
