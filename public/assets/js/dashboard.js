const Status = document.getElementById('status');
const availableDrivers = document.querySelector('.available_drivers');
const assignedOrders = document.querySelector('.assigned_orders');
const reassignDriver = document.querySelector('.reassign_driver');
const drivers = document.querySelectorAll('.driver');

// change status
function update_status(e) {
    if (e.target.classList.contains('offline')) {
        e.target.classList.remove('opacity-100', 'hidden');
        e.target.classList.add('opacity-0');

        setTimeout(() => {
            e.target.classList.add('hidden');
            e.target.previousElementSibling.classList.remove('hidden', 'opacity-0');
        }, 500)
    }

    if (e.target.classList.contains('online')) {
        e.target.classList.remove('opacity-100', 'hidden');
        e.target.classList.add('opacity-0');

        setTimeout(() => {
            e.target.classList.add('hidden');
            e.target.nextElementSibling.classList.remove('hidden');
            e.target.nextElementSibling.classList.add('opacity-100');
        }, 500)
    }
}
Status.addEventListener('click', update_status);


function update_available_orders(e) {

    let id,
        url;
    console.log(e)
    // style the drivers
    drivers.forEach(drive => {
        drive.classList.remove('border-yellowColor', 'bg-white', 'border-l-4');
    })


    // add to current click
    if (e.target.classList.contains('driver')) {
        e.target.classList.add('border-yellowColor', 'bg-white', 'border-l-4');
        url = e.target.dataset.url;
        id = e.target.dataset.id;
    } else {
        e.target.parentElement.classList.add('border-yellowColor', 'bg-white', 'border-l-4');
        url = e.target.parentElement.dataset.url;
        id = e.target.parentElement.dataset.id;
    }

    const data = get_availablee_orders(id, url);
    assignedOrders.innerHTML = '';
    assignedOrders.innerHTML = data;
}
availableDrivers.addEventListener('click', update_available_orders);


function get_availablee_orders(id, url) { // run ajax and send data to front end

    return `
     <div class="border border-gray-300/50  rounded-md">
        <div class="flex flex-row justify-between items-start p-4">
            <div class="space-x-4">
                <span
                    class="bg-primary-100 px-3 py-1 rounded-full bg-blue-400/50 text-xs text-blue-600/75 font-light">Picked
                    up</span>
                <span class="underline text-xs font-light cursor-pointer"
                    data-te-dropdown-item-ref data-te-toggle="modal" data-te-target="#order"
                    data-te-ripple-init data-te-ripple-color="light">Order 2</span>
            </div>
            <div class="space-x-4">
                <span class="text-xs font-semibold"><img src="images/naira.png"
                        class="w-3 h-3 -mt-1 inline-block" alt="">50</span>
                <button type="button" data-te-toggle="modal" data-te-target="#assignDriver"
                    data-te-ripple-init data-te-ripple-color="light"
                    class="reassign_driver px-3 py-2 rounded-md bg-gray-200 text-xs font-light tracking-wide">Reassign
                </button>

            </div>
        </div>
        <hr class="w-full border border-gray-300/50">
        <div class="flex justify-start flex-row items-start">
            <!-- start poiint and end --->
            <div class="px-4">
                <div class="flex flex-col justify-start items-start text-left">
                    <div class="p-[2px]"><img src="<?=IMAGES?>satrt_point.png"
                            class="inline-block w-3 h-3" alt="">
                        <p class="inline-block text-xs font-bold px-[5px]">Victor Maamaa</p>
                    </div>
                    <div class="pb-5 px-4 ml-2 border-l border-gray-400/50">
                        <p class="text-xs font-light font-sans text-gray-600/70">No 30 oro
                            aka street rumuagholu</p>
                    </div>

                    <div class="p-[2px]"><img src="<?=IMAGES?>location.png"
                            class="inline-block w-3 h-4" alt="">
                        <p class="inline-block text-xs font-bold px-[5px]">Chioma Desire</p>
                    </div>
                    <div class="pb-5 px-4 ml-2">
                        <p class="text-xs font-light font-sans text-gray-600/70">Behind
                            redeemed church rumuokro port harcourt.</p>
                    </div>
                </div>
                <div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    `;
}
