$(document).ready(function() {
  $('#current-center').magnificPopup({
  delegate: 'a', // child items selector, by clicking on it popup will open
  type: 'image',
  // other options
    gallery: {
    // options for gallery
    enabled: true,
    tPrev: 'Avant (Left arrow key)', // title for left button
    tNext: 'Apres (Right arrow key)', // title for right button
  }
});
});