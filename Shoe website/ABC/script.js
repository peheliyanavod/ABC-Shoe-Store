window.onscroll = () =>{

    if(window.scrollY>80){
        document.querySelector('.header .header-2').classList.add('active');
    }
    else{
        document.querySelector('.header .header-2').classList.remove('active');   
    }
} 

window.onload = () =>{
    
    if(window.scrollY>80){
        document.querySelector('.header .header-2').classList.add('active');
    }
    else{
        document.querySelector('.header .header-2').classList.remove('active');   
    }

}


var swiper = new Swiper(".brands-slider", {
    loop:true,
    centeredSlides:true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    }, 
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });


