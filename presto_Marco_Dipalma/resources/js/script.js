let navbar = document.querySelector('#navbar');
let navLink = document.querySelectorAll('.nav-link');
let navbarBrand = document.querySelector('.navbar-brand');
let collapse = document.querySelector('#collapse');
let dropdown = document.querySelector('#dropdown');

window.addEventListener('scroll', ()=>{
    if (window.scrollY > 0) {
        // navbar.classList.remove('bg-white');
        // navbar.classList.add('bg-dark');
        // navbarBrand.classList.remove('text-black');
        // navbarBrand.classList.add('text-white');
        // collapse.classList.remove('bg-white');
        // collapse.classList.add('bg-dark');
        navbar.style.height= '60px';
        // navLink.forEach((link)=>{
        //     link.classList.remove('text-black');
        //     link.classList.add('text-white');
        // });
    }else{
        // navbar.classList.remove('bg-dark');
        // navbar.classList.add('bg-white');
        // navbarBrand.classList.remove('text-white');
        // navbarBrand.classList.add('text-black');
        // collapse.classList.remove('bg-dark');
        // collapse.classList.add('bg-white');
        navbar.style.height= '80px';
        // navLink.forEach((link)=>{
        //     link.classList.remove('text-white');
        //     link.classList.add('text-black');
        // });
        
    }
});


// Numeri Incrementali

let primoNumero = document.querySelector('#primoNumero');
let secondoNumero = document.querySelector('#secondoNumero');
let terzoNumero = document.querySelector('#terzoNumero');

let confirm = true;


function createInterval(n, element, time){
    let counter = 0;

    let interval = setInterval(()=>{
        if(counter<n){
            counter++
            element.innerHTML = counter;
        }else{
            clearInterval(interval)
        }

    },time);

    setTimeout(() => {
        confirm = true;
    }, 9000);

};



let observer = new IntersectionObserver((entries)=>{
    entries.forEach((entry)=>{
        if (entry.isIntersecting && confirm) {
            createInterval(100, primoNumero, 30);
            createInterval(200, secondoNumero, 20);
            createInterval(300, terzoNumero, 15);
            confirm = false
        }
    })

});

observer.observe(primoNumero);