const image = document.querySelector('.profile_image');
const profile_card = document.getElementById('profile_card');
console.log(image)
image.addEventListener('click', function () {
    profile_card.classList.toggle('opacity-100');
    profile_card.classList.toggle('hidden');
})
