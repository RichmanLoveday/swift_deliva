const services = document.querySelector('.services_tab');
const service = document.querySelectorAll('.service');
const panels = document.querySelectorAll('.tab');
const parcels = document.querySelector('.parcel_img');


// click on services
const change_panel = function (e) {
    if (! e.target.classList.contains('service')) 
        return;
    


    const tab = e.target.dataset.target;
    console.log(tab);

    // clear all boder and hide all panel
    service.forEach(ele => {
        ele.classList.remove('border-l-2');
        ele.classList.remove('border-yellowColor');
    })

    panels.forEach(ele => {
        ele.classList.add('hidden');
    })

    // add border left on target
    if (e.target.tagName == 'H1') {
        e.target.parentNode.classList.add('border-l-2');
        e.target.parentNode.classList.add('border-yellowColor');
    } else {
        e.target.classList.add('border-l-2');
        e.target.classList.add('border-yellowColor');
    }

    // display panel based on tabs
    panels.forEach((ele, indx) => {
        console.log(ele);
        if (ele.classList.contains(`${tab}`)) 
            ele.classList.remove('hidden');
        

    })


}
services.addEventListener('click', change_panel);

// const btn = document.getElementById('menu-btn');
// const menu = document.getElementById('menu');
// const logo = document.getElementById('logo');


// Hamburger button listener
btn.addEventListener('click', navToggle);

function navToggle(e) {
    btn.classList.toggle('open');
    menu.classList.toggle('hidden');

    if (!menu.classList.contains('hidden')) {
        logo.setAttribute('src', './images/logo-bookmark-footer.svg')
    } else {
        logo.setAttribute('src', './images/logo-bookmark.svg')

    }
}


// services
