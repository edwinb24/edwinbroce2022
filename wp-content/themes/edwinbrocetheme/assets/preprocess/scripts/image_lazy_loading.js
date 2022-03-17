const LAZY_IMAGES = document.querySelectorAll(".lazy_loaded_image")
const observer_options = {
    root: null,
    rootMargin: "0px 0px 300px 0px",
    threshold: 0
}

function preloadImage(img){
    let src = img.style.backgroundImage
    src = src.replace("?tr=w-20,h-20", "")
    if(window.innerWidth < 450 )
        src = src.replace(".jpg", "_mobile.jpg")
    img.style.backgroundImage = src
}

const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting){
            preloadImage(entry.target)
            observer.unobserve(entry.target)
        }
    });
}, observer_options)

LAZY_IMAGES.forEach(image => {
    imageObserver.observe(image)
})
