const assignDriver = document.getElementById('assign_driver');
const resedule = document.getElementById('resedule_btn');
const order = document.getElementById('orders');
const order_tab = document.getElementById('order-tab');
const tabs = document.querySelectorAll('.tab');
const check = document.querySelector('.check_all');
const delete_icon = document.getElementById('delete_icon');
const selectDriver = document.querySelector('.select_driver');
const selectDeliveryDate = document.querySelector('.deliverDate');
const selectPickupDate = document.querySelector('.pickupDate');
const selectDeliveryTime = document.querySelector('.deliveryTime');

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
            console.log(url, id)
            const res = await axios.post(url, {
                companyID: id
            }, { "Content-Type": "application/json" });

            //console.log(res.data)
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
                                    <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 assign_driver"
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
                                    <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 re_assign_driver"
                                        href="#" data-te-toggle="modal"
                                        data-url="${res.data.uri
                                }order/reassign_driver"

                                        data-id="${ord.orderID
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
                                    <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 reshedule_order"
                                        href="#" data-url="${res.data.uri
                                }order/reshedule"
                                        data-id="${ord.orderID}" data-te-dropdown-item-ref href="#"
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
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            ${ord.fullName}</td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            ${ord.address}</td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            ${ord.pickUpDate}</td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                             ${ord.receiverAddress}</td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            ${ord.deliveryDate}</td>

                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            <span
                                class="inline-block whitespace-nowrap rounded-[0.27rem] bg-${ord.statusCol}-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-${ord.statusCol}-700">
                                ${ord.orderStatus}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="relative" data-te-dropdown-ref>
                                <button class="" type="button" id="dropdownMenuButton1"
                                    data-te-dropdown-toggle-ref aria-expanded="false"
                                    data-te-ripple-init data-te-ripple-color="light">
                                    <img src="${res.data.images}/dropdown.png" alt="">
                                </button>
                                <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg [&[data-te-dropdown-show]]:block"
                                    aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                                    <li>                                    
                                    <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 view_details data-orderNum="${inx + 1}" data-url="${res.data.uri}order/order_details" data-orderID="${ord.orderID}" data-packageID="${ord.packageID}" href="#"
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
                            <img src="${res.data.images
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
    } catch (error) { }


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
            Swal.fire({ title: 'Deleted', customClass: 'swal', text: ' Order deleted successfully' })
            check.checked = false;
            setTimeout(() => {
                Swal.close();
            }, 2000)
        }
    })
})


function assign_driver(e) { // validate form and get details
    if (!e.target.classList.contains('assign_driver'))
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

        if (!error) {
            const res = await axios.post(url, {
                orderID: id,
                driverID: driverId
            }, { "Content-Type": "application/json" })


            if (res.data.status == 'success') {
                assignDriver.removeAttribute('disabled');
                assignDriver.firstElementChild.classList.remove('inline-block');
                assignDriver.firstElementChild.classList.add('hidden');
                document.querySelector('.close_btn').click();
                selectDriver.options[0].setAttribute('selected', 'selected');

                row.children[6].innerHTML = `
                    <span
                        class="inline-block whitespace-nowrap rounded-[0.27rem] bg-${res.data.order.statusCol
                    }-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-${res.data.order.statusCol
                    }-700">
                        ${res.data.order.orderStatus}
                    </span>
                `;

                e.target.parentElement.innerHTML = ` 
                <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 re_assign_driver"
                    href="#" data-te-toggle="modal"
                    data-url="${res.data.uri
                    }order/reassign_driver" data-id="${res.data.order.orderID
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
    if (!e.target.classList.contains('re_assign_driver'))
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

        if (!error) {
            const res = await axios.post(url, {
                orderID: id,
                driverID: driverId
            }, { "Content-Type": "application/json" })


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
    if (!e.target.classList.contains('reshedule_order'))
        return;



    console.log(e);

    const row = e.target.closest('.order_row');
    const orderID = e.target.dataset.id;
    const url = e.target.dataset.url;

    console.log(url, orderID, row);

    resedule.addEventListener('click', async () => {
        let error = false;
        if (selectDeliveryDate.value == '') {
            document.querySelector('.errorDelievryDate').classList.replace('opacity-0', 'opacity-100');
            error = true;

        } else {
            document.querySelector('.errorDelievryDate').classList.replace('opacity-100', 'opacity-0');

        }

        if (selectPickupDate.value == '') {
            document.querySelector('.errorPickupDate').classList.replace('opacity-0', 'opacity-100');
            error = true;

        } else {
            document.querySelector('.errorPickupDate').classList.replace('opacity-100', 'opacity-0');
        }

        if (selectDeliveryTime.value == '') {
            document.querySelector('.errorDelievryTime').classList.replace('opacity-0', 'opacity-100');
            error = true;

        } else {
            document.querySelector('.errorDelievryTime').classList.replace('opacity-100', 'opacity-0');

        }


        if (!error) {
            resedule.firstElementChild.classList.replace('hidden', 'inline-block');
            resedule.setAttribute('disabled', '');

            // send requestes to back end
            const res = await axios.post(url, {
                orderID: orderID,
                pickUpDate: selectPickupDate.value,
                deliveryDate: selectDeliveryDate.value,
                deliveryTime: selectDeliveryTime.value,
                tab: type

            }, { "Content-Type": "application/json" })
            console.log(res.data);
            // show success modal
            if (res.data.status == 'success') {
                resedule.firstElementChild.classList.replace('inline-block', 'hidden');
                resedule.removeAttribute('disabled');
                document.querySelector('.close_btn').click();

                selectDeliveryTime.value = '';
                selectDeliveryDate.value = '';
                selectPickupDate.value = '';

                sweet_order('success', res.data.message);

                // render data
                if (res.data.remove) {
                    row.remove();
                } else {
                    row.children[3].textContent = res.data.pickupdate;
                    row.children[5].textContent = res.data.deliverydate;
                }

            }
            // console.log(res.data);
        }

    });

}


async function view_details(e) {
    if (!e.target.classList.contains('view_details'))
        return;
    const packageID = e.target.dataset.packageid;
    const url = e.target.dataset.url;
    const orderNum = e.target.dataset.ordernum;
    const row = e.target.closest('.order_row');
    let spinner = document.querySelector('.loader');
    console.log('Yeeeeeeeeeeeeeeeeee');
    let test = document.querySelector('.orderStatus')

    try {
        const res = await axios.post(url, {
            packageID: packageID
        }, { "Content-Type": "application/json" })

        spinner.classList.replace('hidden', 'flex');
        spinner.nextElementSibling.classList.replace('flex', 'hidden');
        // console.log(res.data)
        if (res.data.status == 'success') { // remove spinner
            spinner.classList.replace('flex', 'hidden');
            spinner.nextElementSibling.classList.replace('hidden', 'flex');


            let order = res.data.orders;
            let pickUpdate = formatDateTime(order.pickUpDate);
            let deliveryDateTime = formatDateTime(order.deliveryDate);
            let placementdate = formatDateTime(order.orderDate);

            // check for status and fix some stuff
            console.log(res.data)
            // mark as delivered of failed
            if (order.order_status == 0 || order.order_status == 1 || order.order_status == 2 || order.order_status == 3) {
                document.querySelector('.mark_as_delivered').classList.replace('hidden', 'block');
                document.querySelector('.mark_as_failed').classList.replace('hidden', 'block');
                document.querySelector('.delete_package').classList.replace('block', 'hidden');
            } else {
                document.querySelector('.mark_as_delivered').classList.replace('block', 'hidden');
                document.querySelector('.mark_as_failed').classList.replace('block', 'hidden');
                document.querySelector('.delete_package').classList.replace('hidden', 'block');
            }

            document.querySelector('.orderStatus').textContent = order.orderStatus;
            document.querySelector('.pickup_location').textContent = order.address;
            document.querySelector('.sender').textContent = order.fullName;
            document.querySelector('.sender_phn').textContent = order.phone;
            document.querySelector('.sender_email').textContent = order.email;
            document.querySelector('.delivery_location').textContent = order.receiverAddress;
            document.querySelector('.receiver').textContent = order.receiverName;
            document.querySelector('.receiver_phn').textContent = order.receiverContact;
            document.querySelector('.pickup_date').textContent = pickUpdate[0] + ', ' + pickUpdate[2];
            document.querySelector('.delivery_date').textContent = deliveryDateTime[0] + ', ' + deliveryDateTime[2];
            document.querySelector('.delivery_time').textContent = deliveryDateTime[3];
            document.querySelector('.driver_name').textContent = order.driverName;
            document.querySelector('.placement_date').textContent = placementdate[0] + ' ' + placementdate[1] + ', ' + placementdate[2] + ' | ' + placementdate[3];
            document.querySelector('.paymentMethod').textContent = order.paymentMethod;
            document.querySelector('.order_num').textContent = orderNum;


            // handle order items
            let deliveryItems = document.querySelector('.delivery_details');
            let items = JSON.parse(order.packageItems);

            const orderItems = document.querySelector('.order_items');

            let amount = 0;
            let html = '';
            items.forEach(itm => {
                amount = amount + itm.Price;
                html = html + `   
            <div class = "flex justify-between pr-2 items-start" > <p class="pickup_location text-[15px] font-sans text-black/90 leading-normal">
                        <span class="rounded-full bg-gray-300 p-1 text-xs text-black/50">x ${itm.item_quantiy
                    }</span>${itm.item_name}</p>
                    <span>
                        <img src="${res.data.images
                    }naira.png" class="w-3 h-3 inline-block -mt-1 mx-1" alt="">${itm.Price
                    }</span>
                    
            </div>
            `;
            });

            orderItems.innerHTML = '';
            orderItems.innerHTML = html;

            document.querySelector('.delivery_fee').innerHTML = ` <img src="${res.data.images
                }naira.png" class="w-3 h-3 inline-block -mt-1" alt="">${amount}
        `;
            // formatDateTime(order.date);
        }

        // check for event status event
        document.querySelector('.delivered_btn').addEventListener('click', async () => {
            let url = res.data.uri + 'order/mark_as_delivered';
            const resData = await axios.post(url, { orderID: e.target.dataset.orderid, packageID: e.target.dataset.packageid });

            console.log(resData.data)
            if (resData.data.status == 'success') {
                row.remove();
                document.querySelector('.orderStatus').textContent = resData.data.order.orderStatus;
                document.querySelector('.close_btn').click();
            }
        });


        document.querySelector('.failed_btn').addEventListener('click', async () => {
            let url = res.data.uri + 'order/mark_as_failed';
            const resData = await axios.post(url, { orderID: e.target.dataset.orderid, packageID: e.target.dataset.packageid });

            console.log(resData.data)

            if (resData.data.status == 'success') {
                row.remove();
                //  document.querySelector('.orderStatus').textContent = resData.data.order.orderStatus;
                document.querySelector('.close_btn').click();
            }
        })

        document.querySelector('.delete_order_btn').addEventListener('click', async () => {
            let url = res.data.uri + 'order/delete_order';
            const resData = await axios.post(url, { orderID: e.target.dataset.orderid, packageID: e.target.dataset.packageid });

            console.log(resData.data)
            if (resData.data.status == 'success') {
                row.remove();
                //  document.querySelector('.orderStatus').textContent = resData.data.order.orderStatus;
                document.querySelector('.close_btn').click();
            }
        })

    } catch (error) { }

}


order.addEventListener('click', (e) => {
    view_details(e);
    reshedule_order(e);
    assign_driver(e);
    re_assign_driver(e);

});

function delete_order(orderID) {
    console.log(orderID)
}


function mark_as_failed() {
    console.log(orderID)
}

function formatDateTime(value) {
    // Array of month names
    const monthNames = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];

    let [datePart, timePart = ""] = value.split(' ');
    let [year, month, day] = datePart.split('-').map(part => parseInt(part, 10));


    // get am and pm
    let date = new Date(value);
    let hours = date.getHours();
    let amPm = hours >= 12 ? 'PM' : 'AM';

    // // my format
    let formated = [
        monthNames[month - 1],
        day,
        year,
        timePart.slice(0, 5) + ' ' + amPm,
    ];

    return formated;
}

// function formatDate(value) {
//     let [month, day, year] = value.split('-');
//     let correct = "'" + year + '-' + day + '-' + month + "'";
//     let dateObject = new Date(correct);
//     // new Date(year, month, day)

//     console.log(dateObject);
//     console.log(month, day, year);

//     // formulate values
//     month = dateObject.toLocaleString("en-US", { month: "long" });
//     day = dateObject.toLocaleString("en-US", { day: "2-digit" });
//     year = dateObject.getFullYear();

//     // my format
//     let formated = [month, day, year];

//     return formated;
// }


function sweet_order(icon, title, text = '') {
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
        showConfirmButton: false,
        timer: 2000
    })
}
