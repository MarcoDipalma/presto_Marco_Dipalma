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