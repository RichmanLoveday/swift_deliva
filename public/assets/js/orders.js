const assignDriver = document.getElementById('assign_driver');
const resedule = document.getElementById('resedule_btn');
const order = document.getElementById('orders');
const order_tab = document.getElementById('order-tab');
const tabs = document.querySelectorAll('.tab');
const check = document.querySelector('.check_all');
const delete_icon = document.getElementById('delete_icon');
const selectDriver = document.querySelector('.select_driver');
const selectDate = document.querySelector('.selectDate');

let check_row = document.querySelectorAll('.check');

let type = 'currentDay';

// check click event on order_tab
order_tab.addEventListener('click', (e) => {
    if (!e.target.classList.contains('tab_head')) 
        return;
    


    check.checked = false;
    const tab = e.target.parentElement;
    const id = e.target.dataset.id;
    const url = e.target.dataset.url;

    type = e.target.dataset.type;

    tabs.forEach(tab => {
        tab.classList.remove('active__nav');
        tab.lastElementChild.classList.add('hidden');
        tab.lastElementChild.classList.remove('flex');
    })


    tab.classList.add('active__nav');
    tab.lastElementChild.classList.remove('hidden');
    tab.lastElementChild.classList.add('flex');


    // get data from bacckend
    try {
        async function test() {
            const res = await axios.post(url, {
                companyID: id
            }, {"Content-Type": "application/json"});

            console.log(res.data)
            if (res.data.status == 'success') { // loop through data and store status

                let orders = "";

                if (res.data.orders.length > 0) {
                    res.data.orders.forEach((ord, inx) => {

                        let resheduleItem = '';
                        let assignDriver = '';
                        let reassignDriver = '';

                        // console.log(ord);
                        // console.log(res.data.uri);

                        if ((res.data.type == 'currentOrder') && ord.driverName == 'N/A') {
                            assignDriver = ` 
                                <li>
                                    <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600 assign_driver"
                                        href="#" data-te-toggle="modal"
                                        data-te-target="#assignDriver" data-te-ripple-init
                                        data-te-ripple-color="light">Assign Package to
                                        driver</a>
                                </li>
                            `;
                        }


                        if ((res.data.type == 'currentOrder') && ord.driverName != 'N/A') {
                            reassignDriver = ` 
                                <li>
                                    <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600 re_assign_driver"
                                        href="#" data-te-toggle="modal"
                                        data-url="${
                                res.data.uri
                            }order/reassign_driver"

                                        data-id="${
                                ord.orderID
                            }"
                                        data-te-target="#assignDriver" data-te-ripple-init
                                        data-te-ripple-color="light">Re-Assign Package to
                                        driver</a>
                                </li>
                            `;
                        }

                        if ((res.data.type == 'currentOrder' && ord.driverName == 'N/A') || (res.data.type == 'incompletedOrder' && ord.orderStatus == 'Not assigned')) {

                            resheduleItem = ` 
                             <li>
                                <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                    href="#" data-url="${
                                res.data.uri
                            }order/reshedule"
                                    data-id="${
                                ord.orderID
                            }" data-te-dropdown-item-ref href="#"
                                    data-te-toggle="modal" data-te-target="#resedule"
                                    data-te-ripple-init
                                    data-te-ripple-color="light">Resudule Package</a>
                            </li>
                            `;
                        }

                        orders += `
                    <tr class="order_row">
                        <td class="py-3 pl-4">
                            <div class="flex items-center h-5">
                                <input id="hs-table-checkbox-1" type="checkbox"
                                    class="border-gray-200 check rounded text-blue-600 focus:ring-blue-500  ">
                                <label for="hs-table-checkbox-1" class="sr-only">Checkbox</label>
                            </div>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                            ${
                            ord.fullName
                        }</td>

                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                            ${
                            ord.address
                        }</td>

                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                            ${
                            ord.pickUpDate
                        }</td>

                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                             ${
                            ord.receiverAddress
                        }</td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                            ${
                            ord.deliveryDate
                        }</td>

                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                            <span
                                class="inline-block whitespace-nowrap rounded-[0.27rem] bg-${
                            ord.statusCol
                        }-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-info-700">
                                ${
                            ord.orderStatus
                        }
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="relative" data-te-dropdown-ref>
                                <button class="" type="button" id="dropdownMenuButton1"
                                    data-te-dropdown-toggle-ref aria-expanded="false"
                                    data-te-ripple-init data-te-ripple-color="light">
                                    <img src="${
                            res.data.images
                        }/dropdown.png" alt="">
                                </button>
                                <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                                    aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                                    <li>
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600 view_details"
                                            data-url="${
                            res.data.uri
                        }order/order_details"
                                            data-orderNum="${inx}"
                                            data-packageID="${
                            ord.packageID
                        }" href="#"
                                data-te-dropdown-item-ref data-te-toggle="modal"
                                data-te-target="#viewPackage" data-te-ripple-init
                                data-te-ripple-color="light">View details</a>
                                    </li>
                                    ${assignDriver}
                                    ${reassignDriver}
                                   ${resheduleItem}
                                </ul>
                            </div>
                        </td>
                    </tr>`;
                        order.innerHTML = '';
                        order.innerHTML = orders;
                        check_row = document.querySelectorAll('.check');
                    })
                } else {
                    order.innerHTML = `  
                    <td colspan="10">
                        <div class="flex flex-col items-center justify-center w-1/2 mx-auto space-y-2 p-5">
                            <img src="${
                        res.data.images
                    }order_list.png" alt="">
                            <h3 class="font-sans text-2xl text-center leading-normal font-semibold text-gray-900/70">
                                Nothing to
                                see
                                yet</h3>
                            <p class="text-center text-[17px] leading-normal font-sans"> No order is found
                            </p>
                        </div>                  
                    </td>
                    `;
                } tab.lastElementChild.textContent = res.data.orders.length;

            }

        }
        test();
    } catch (error) {}


});


check.addEventListener('click', (e) => {
    if (e.target.checked) {
        check_row.forEach(check => {
            check.checked = true;
        })
    } else {
        check_row.forEach(check => {
            check.checked = false;
        })
    }
});


delete_icon.addEventListener('click', (e) => {
    Swal.fire({
        title: 'Are you sure?',
        customClass: 'swal',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        console.log(result)
        if (result.isConfirmed) {
            check_row.forEach(check => {
                if (check.checked) {
                    check.parentElement.parentElement.parentElement.remove();
                }
            })
            Swal.fire({title: 'Deleted', customClass: 'swal', text: ' Order deleted successfully'})
            check.checked = false;
            setTimeout(() => {
                Swal.close();
            }, 2000)
        }
    })
})

function assign_driver(e) { // validate form and get details
    if (! e.target.classList.contains('assign_driver')) 
        return;
    


    const companyID = e.target.dataset.id;
    const url = e.target.dataset.url;
    const id = e.target.dataset.id;
    const row = e.target.closest('.order_row');

    console.log(url, companyID, id);

    assignDriver.addEventListener('click', async () => {
        let error = false;
        let driverId;
        if (selectDriver.options.selectedIndex == 0) {
            document.querySelector('.errorDriver').classList.remove('opacity-0');
            error = true;
        } else {
            driverId = selectDriver.options[selectDriver.options.selectedIndex].value;
            document.querySelector('.errorDriver').classList.remove('opacity-100');
            document.querySelector('.errorDriver').classList.add('opacity-0');
            assignDriver.firstElementChild.classList.remove('hidden');
            assignDriver.firstElementChild.classList.add('inline-block');
            assignDriver.setAttribute('disabled', '');
        }

        if (! error) {
            const res = await axios.post(url, {
                orderID: id,
                driverID: driverId
            }, {"Content-Type": "application/json"})


            if (res.data.status == 'success') {
                assignDriver.removeAttribute('disabled');
                assignDriver.firstElementChild.classList.remove('inline-block');
                assignDriver.firstElementChild.classList.add('hidden');
                document.querySelector('.close_btn').click();
                selectDriver.options[0].setAttribute('selected', 'selected');

                row.children[6].innerHTML = `
                    <span
                        class="inline-block whitespace-nowrap rounded-[0.27rem] bg-${
                    res.data.order.statusCol
                }-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-${
                    res.data.order.statusCol
                }-700">
                        ${
                    res.data.order.orderStatus
                }
                    </span>
                `;

                e.target.parentElement.innerHTML = ` 
                <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600 re_assign_driver"
                    href="#" data-te-toggle="modal"
                    data-url="${
                    res.data.uri
                }order/reassign_driver" data-id="${
                    res.data.order.orderID
                }"
                    data-te-target="#assignDriver" data-te-ripple-init
                    data-te-ripple-color="light">Re-Assign Package to
                    driver
                </a>
                `;

                // alert
                sweet_order('success', res.data.message);

            }
            console.log(res.data);

        }
    })
}


function re_assign_driver(e) { // validate form and get details
    if (! e.target.classList.contains('re_assign_driver')) 
        return;
    


    const url = e.target.dataset.url;
    const id = e.target.dataset.id;
    console.log(url, id);

    assignDriver.addEventListener('click', async () => {
        let error = false;
        let driverId;
        if (selectDriver.options.selectedIndex == 0) {
            document.querySelector('.errorDriver').classList.remove('opacity-0');
            error = true;
        } else {
            driverId = selectDriver.options[selectDriver.options.selectedIndex].value;
            document.querySelector('.errorDriver').classList.remove('opacity-100');
            document.querySelector('.errorDriver').classList.add('opacity-0');
            assignDriver.firstElementChild.classList.remove('hidden');
            assignDriver.firstElementChild.classList.add('inline-block');
            assignDriver.setAttribute('disabled', '');
        }

        if (! error) {
            const res = await axios.post(url, {
                orderID: id,
                driverID: driverId
            }, {"Content-Type": "application/json"})


            if (res.data.status == 'success') {
                assignDriver.removeAttribute('disabled');
                assignDriver.firstElementChild.classList.remove('inline-block');
                assignDriver.firstElementChild.classList.add('hidden');
                document.querySelector('.close_btn').click();
                selectDriver.options[0].setAttribute('selected', 'selected');


                // alert
                console.log(res.data);
                sweet_order('success', res.data.message);
            }

        }
    })
}


function reshedule_order(e) {
    if (! e.target.classList.contains('reshedule_order')) 
        return;
    


    console.log(e);

    const row = e.target.closest('.order_row');
    const orderID = e.target.dataset.id;
    const url = e.target.dataset.url;

    resedule.addEventListener('click', async () => {
        let error = false;
        if (selectDate.value == '') {
            document.querySelector('.errorReshedule').classList.remove('opacity-0');
            error = true;

        } else {
            document.querySelector('.errorReshedule').classList.remove('opacity-100');
            document.querySelector('.errorReshedule').classList.add('opacity-0');
            resedule.firstElementChild.classList.remove('hidden');
            resedule.firstElementChild.classList.add('inline-block');
            resedule.setAttribute('disabled', '');

        }

        if (! error) { // send requestes to back end
            const res = await axios.post(url, {
                orderID: orderID,
                pickUpDate: selectDate.value,
                type: type

            }, {"Content-Type": "application/json"})

            // show success modal
            if (res.data.status == 'success') {
                resedule.firstElementChild.classList.add('hidden');
                resedule.firstElementChild.classList.remove('inline-block');
                resedule.removeAttribute('disabled');
                document.querySelector('.close_btn').click();

                selectDate.value = '';
                sweet_order('success', res.data.message);

                // render data
                if (res.data.remove) {
                    row.remove();
                } else {
                    row.children[3].textContent = res.data.date;
                }

            }
            console.log(res.data);
        }

    });

}


async function view_details(e) {
    if (! e.target.classList.contains('view_details')) 
        return;
    


    const packageID = e.target.dataset.packageid;
    const url = e.target.dataset.url;
    const orderNum = e.target.dataset.ordernum;
    let spinner = document.querySelector('.loader');

    try {
        const res = await axios.post(url, {
            packageID: packageID
        }, {"Content-Type": "application/json"})

        spinner.classList.replace('hidden', 'flex');
        spinner.nextElementSibling.classList.replace('flex', 'hidden');

        console.log(res.data);
        if (res.data.status == 'success') { // remove spinner
            spinner.classList.replace('flex', 'hidden');
            spinner.nextElementSibling.classList.replace('hidden', 'flex');

            let order = res.data.orders;
            let pickUpdate = formatDate(order.pickUpDate);
            let deliveryDateTime = formatDateTime(order.deliveryDate);
            let placementdate = formatDateTime(order.date);

            console.log(deliveryDateTime)
            console.log(pickUpdate);

            document.querySelector('.orderStatus').textContent = order.orderStatus;
            document.querySelector('.pickup_location').textContent = order.address;
            document.querySelector('.sender').textContent = order.fullName;
            document.querySelector('.sender_phn').textContent = order.phone;
            document.querySelector('.sender_email').textContent = order.email;
            document.querySelector('.delivery_location').textContent = order.receiverAddress;
            document.querySelector('.receiver').textContent = order.receiverName;
            document.querySelector('.receiver_phn').textContent = order.receiverContact;
            document.querySelector('.pickup_date').textContent = pickUpdate[0] + ', ' + pickUpdate[1];
            document.querySelector('.delivery_date').textContent = deliveryDateTime[0] + ', ' + deliveryDateTime[1];
            document.querySelector('.delivery_time').textContent = deliveryDateTime[4];
            document.querySelector('.driver_name').textContent = order.driverName;
            document.querySelector('.placement_date').textContent = placementdate[0] + ' ' + placementdate[1] + ', ' + placementdate[2] + ' | ' + placementdate[4];
            document.querySelector('.paymentMethod').textContent = order.paymentMethod;
            document.querySelector('.order_num').textContent = orderNum;


            // handle order items
            let deliveryItems = document.querySelector('.delivery_details');
            let items = JSON.parse(order.packageItems);
            console.log(items)
            const orderItems = document.querySelector('.order_items');

            let amount = 0;
            let html = '';
            items.forEach(itm => {
                amount = amount + itm.Price;
                html = html + `   
            <div class = "flex justify-between pr-2 items-start" > <p class="pickup_location text-[15px] font-sans text-black/90 leading-normal">
                        <span class="rounded-full bg-gray-300 p-1 text-xs text-black/50">x ${
                    itm.item_quantiy
                }</span>
                        ${
                    itm.item_name
                }</p>
                    <span>
                        <img src="${
                    res.data.images
                }naira.png" class="w-3 h-3 inline-block -mt-1 mx-1" alt="">${
                    itm.Price
                }</span>
                    
            </div>
            `;
            });

            orderItems.innerHTML = '';
            orderItems.innerHTML = html;

            document.querySelector('.delivery_fee').innerHTML = ` <img src="${
                res.data.images
            }naira.png" class="w-3 h-3 inline-block -mt-1" alt="">${amount}
        `;
            formatDateTime(order.date);


        }

    } catch (error) {}

}


order.addEventListener('click', (e) => {
    view_details(e);
    reshedule_order(e);
    assign_driver(e);
    re_assign_driver(e);
});

function delete_order(e) {}

function mark_as_delivered() {}

function mark_as_failed() {}

function formatDateTime(value) {
    let [datePart, timePart] = value.split(' ');
    let [year, month, day] = datePart.split('-').map(part => parseInt(part, 10));
    let [hour, min, sec] = timePart.split(':').map(part => parseInt(part, 10));

    let dateObject = new Date(year, month - 1, day, hour, min, sec)

    // formulate values
    month = dateObject.toLocaleString("en-US", {month: "long"});
    day = dateObject.toLocaleString("en-US", {day: "2-digit"});
    year = dateObject.getFullYear();
    let time = dateObject.toLocaleString("en-US", {
        hour: "numeric",
        minute: "numeric",
        hour12: true
    });

    // my format
    let formated = [
        month,
        day,
        year,
        hour,
        time
    ];

    return formated;
}

function formatDate(value) {
    let [month, day, year] = value.split('-');
    let correct = "'" + year + '-' + day + '-' + month + "'";
    let dateObject = new Date(correct);
    // new Date(year, month, day)

    console.log(dateObject);
    console.log(month, day, year);

    // formulate values
    month = dateObject.toLocaleString("en-US", {month: "long"});
    day = dateObject.toLocaleString("en-US", {day: "2-digit"});
    year = dateObject.getFullYear();

    // my format
    let formated = [month, day, year];

    return formated;
}


function sweet_order(icon, title, text = '') {
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
        showConfirmButton: false,
        timer: 2000
    })
}
