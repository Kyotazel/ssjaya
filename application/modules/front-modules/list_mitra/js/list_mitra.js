var url_controller = baseUrl + '/' + prefix_folder + '/' + _controller + '/';

new Splide( '.splide', {
    type       : 'loop',
    height     : '9rem',
    perPage    : 2,
    breakpoints: {
      640: {
        height: '6rem',
      },
    },
  } );