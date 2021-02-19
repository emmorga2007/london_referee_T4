var scenes = document.querySelectorAll('.scene');
scenes.forEach(scene => {
    let parallaxInstance = new Parallax(scene);
})

function scrollAnimation(){
    let logo = document.querySelector('.logo-con');
    if (window.scrollY > 20){
        logo.classList.add('shrink');
    }else {
        logo.classList.remove('shrink');
    }
}

window.addEventListener('scroll', scrollAnimation);