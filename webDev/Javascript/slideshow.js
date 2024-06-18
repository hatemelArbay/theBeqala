$(document).ready(function() {
  // Select all the carousel slides and store them in an array
  const slides = $('.carousel-item');
  // Initialize the current slide index to 0
  let currentSlideIndex = 0;

  // Set up an interval to switch between slides every 5 seconds
  setInterval(() => {
    // Calculate the index of the next slide, wrapping around to the first slide if necessary
    const nextSlideIndex = (currentSlideIndex + 1) % slides.length;
    // Fade in the next slide and fade out the current slide
    fadeIn(slides[nextSlideIndex]);
    fadeOut(slides[currentSlideIndex]);
    // Update the current slide index to the next slide
    currentSlideIndex = nextSlideIndex;
  }, 5000);

  // Define a function to fade in an element
  function fadeIn(el) {
    // Set the initial opacity of the element to 0
    el.style.opacity = 0;
    // Define a variable to track the current opacity
    let opacity = 0;
    // Set up an interval to gradually increase the opacity until it reaches 1
    const fadeAnimation = setInterval(() => {
      opacity += 0.015;
      el.style.opacity = opacity;
      // Stop the interval once the opacity reaches 1
      if (opacity >= 1) clearInterval(fadeAnimation);
    }, 30);
  }

  // Define a function to fade out an element
  function fadeOut(el) {
    // Set the initial opacity of the element to 1
    let opacity = 1;
    // Set up an interval to gradually decrease the opacity until it reaches 0
    const fadeAnimation = setInterval(() => {
      opacity -= 0.015;
      el.style.opacity = opacity;
      // Stop the interval once the opacity reaches 0
      if (opacity <= 0) clearInterval(fadeAnimation);
    }, 30);
  }

  // Hide all the slides except for the current slide
  slides.hide().eq(currentSlideIndex).show();
});
