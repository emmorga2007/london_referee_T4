import { fetchData } from "./components/DataMiner.js"; 

(() => {

    let vue_vm = new Vue({
        data: {
            announcements:[],
            images: [],
            currentImg:{},
            showLightbox: false
        },

        mounted: function () {
            console.log("Vue is mounted, trying a fetch for the initial data");

            fetchData("./admin/content/get_content.php")
                .then(data => {
                    data.forEach(image => {
                        this.images.push(image);
                    });
                })
                .catch(err => console.error(err));

            fetchData("./admin/announcements/get_announcements.php")
                .then(data => {
                    data.forEach(announcement => {
                        this.announcements.push(announcement);
                    });
                })
                .catch(err => console.error(err));
        },

        updated: function () {
            console.log(this.images);
            console.log(this.currentImg);
            console.log(this.showLightbox);
        },

        methods: {
            expandImg(target) {
                console.log(target);
                this.showLightbox = this.showLightbox ? false : true;
                this.currentImg = target;
            },
        },

        components: {
        }

    }).$mount("#app");




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


})();