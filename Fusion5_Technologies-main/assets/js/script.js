/*--banner slides--*/
document.addEventListener( 'DOMContentLoaded', function () {
    new Splide( '#image-carousel').mount();
  } );
/*---banner ends--*/
/*---Aos starts--*/
  AOS.init({
    duration:1200,
  });
/*---Aos ends--*/
/*------Preloader Starts---*/
window.addEventListener("load", () => {
  const preloader = document.querySelector(".preloaderBg");
   preloader.classList.add("load_ani_hidden");

  preloader.addEventListener("transitionend", () => {
      // Remove the correct elements using the correct variable names
      document.body.removeChild(preloader);
    });
});
/*---Preloader ends---*/