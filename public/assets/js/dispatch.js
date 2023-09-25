const driverCurrentOrders = document.getElementById('driverCurrentOrders');
const driverOrdersList = document.getElementById('driverOrdersList') ?? null;
const driverTabs = document.getElementById('drivers_tabs');
const drive_tab = document.querySelectorAll('.tab');
let doneCon;
let overallContainer;
let attributes = {
    'data-te-toggle': 'modal',
    'data-te-target': '#staticBackdrop',
    'data-te-ripple-init': '',
    'data-te-ripple-color': 'light',
    cashondelivery: '',
};
let rootUrl;
async function change_driver_status(e) {
    if (e.target.classList.contains('driver_order_status')) {

        const url = e.target.dataset.url;
        const orderID = e.target.dataset.orderid;
        const userID = e.target.dataset.userid;
        const packageID = e.target.dataset.packageid;

        if (e.target.dataset.status == "picked up") {
            const container = e.target.parentElement.parentElement.parentElement;
            let overallContainer = container.parentElement;

            // run ajax
            const res = await axios.post(url + 'dispatch/update_status', {
                orderID: orderID,
                userID: userID,
                packageID: packageID,
                type: 'pick up',
                method: 'update'

            }, { "Content-Type": "application/json" })

            if (res.data.status == 'success') { // perfrom responce
                e.target.parentElement.parentElement.firstElementChild.classList.remove('bg-yellow-500', 'text-white')
                e.target.parentElement.parentElement.firstElementChild.classList.add('bg-blue-400/50', 'text-blue-600/75');
                e.target.parentElement.parentElement.firstElementChild.textContent = 'Picked up';


                e.target.classList.remove('bg-yellow-500');
                e.target.classList.add('bg-[#6ce052]');

                e.target.childNodes[2].textContent = 'Mark as on the way';
                e.target.dataset.status = 'on the way';
                e.target.previousElementSibling.classList.remove('hidden');
            }
            return;
        }

        if (e.target.dataset.status == "on the way") {
            const container = e.target.parentElement.parentElement.parentElement;
            let overallContainer = container.parentElement;

            // run ajax
            const res = await axios.post(url + 'dispatch/update_status', {
                packageID: packageID,
                orderID: orderID,
                userID: userID,
                type: 'on the way',
                method: 'update'

            }, { "Content-Type": "application/json" })

            if (res.data.status == 'success') {
                rootUrl = res.data.uri;
                console.log(res.data)
                if (res.data.payment_method == 0) {
                    // add atrribute to function
                    addAttribute(e.target, attributes);
                }

                e.target.parentElement.parentElement.firstElementChild.classList.remove('bg-blue-400/50', 'text-blue-600/75')
                e.target.parentElement.parentElement.firstElementChild.classList.add('bg-[#5856CE]/30', 'text-[#5856CE]')
                e.target.parentElement.parentElement.firstElementChild.textContent = 'On the way';

                e.target.classList.remove('bg-[#6ce052]');
                e.target.classList.add('bg-[#66BD50]');
                e.target.childNodes[2].textContent = 'Mark as done';
                e.target.dataset.status = 'done';

            }

            return;
        }

        if (e.target.dataset.status == "done") {
            doneCon = e.target.parentElement.parentElement.parentElement;
            overallContainer = doneCon.parentElement;
            let res;
            if (e.target.hasAttribute("cashondelivery")) { // fetch amount and save
                const getAmount = await axios.post(url + 'dispatch/product_amount', {
                    packageID: packageID
                }, { "Content-Type": "application/json" })

                if (getAmount.data.status == 'success') { // update driver get money modal

                    let attributes = {
                        packageID: getAmount.data.package.packageID,
                        orderID: orderID,
                        userID: userID,
                        amount: getAmount.data.package.amount,
                    }
                    let driverPay = document.querySelector('.driverPay');
                    document.querySelector('.requiredAmount').textContent = getAmount.data.package.amount;
                    // set attributes
                    Object.keys(attributes).forEach(elem => {
                        driverPay.setAttribute(elem, attributes[elem]);
                    })
                }
            } else { // run ajax
                const res = await axios.post(url + 'dispatch/update_status', {
                    packageID: packageID,
                    orderID: orderID,
                    userID: userID,
                    type: 'done',
                    method: 'update'

                }, { "Content-Type": "application/json" })

                if (res.data.status == 'success') {
                    let emptyOrder = `
                <div>
                    <img class="mt-16 mx-auto" src="${res.data.images
                        }truck_parcel.png" alt="">
                    <h3 class=" mb-20 font-sans">No dispatch found</h3>
                </div>
            `;
                    doneCon.remove();

                    if (overallContainer.children.length == 0) {
                        overallContainer.innerHTML = emptyOrder;
                    }

                }
                return;

            }
        }
    }


    // handle return status
    if (e.target.classList.contains('status_btn')) {
        const update_btn = e.target.nextElementSibling;

        const url = update_btn.dataset.url;
        const orderID = update_btn.dataset.orderid;
        const userID = update_btn.dataset.userid;
        const packageID = update_btn.dataset.packageid;


        if (update_btn.dataset.status == "on the way") {
            // run ajax
            const res = await axios.post(url + 'dispatch/update_status', {
                orderID: orderID,
                userID: userID,
                packageID: packageID,
                type: 'pick up',
                method: 'roll_back'
            }, { "Content-Type": "application/json" })

            // remove atrributes
            removeAttribute(e.target.nextElementSibling, attributes);

            if (res.data.status == 'success') {
                e.target.parentElement.parentElement.firstElementChild.classList.remove('bg-blue-400/50', 'text-blue-600/75')
                e.target.parentElement.parentElement.firstElementChild.classList.add('bg-yellow-500', 'text-white')
                e.target.parentElement.parentElement.firstElementChild.textContent = 'Started';

                update_btn.classList.add('bg-yellow-500');
                update_btn.classList.remove('bg-[#6ce052]');

                update_btn.childNodes[2].textContent = 'Mark as picked up';
                update_btn.dataset.status = 'picked up';

                e.target.classList.add('hidden');

            }

            return;
        }

        if (update_btn.dataset.status == "done") {
            const res = await axios.post(url + 'dispatch/update_status', {
                orderID: orderID,
                userID: userID,
                packageID: packageID,
                type: 'on the way',
                method: 'roll_back'
            }, { "Content-Type": "application/json" })

            // remove atrributes
            removeAttribute(e.target.nextElementSibling, attributes);
            if (res.data.status == 'success') {
                e.target.parentElement.parentElement.firstElementChild.classList.remove('bg-[#5856CE]/30', 'text-[#5856CE]')
                e.target.parentElement.parentElement.firstElementChild.classList.add('bg-blue-400/50', 'text-blue-600/75')
                e.target.parentElement.parentElement.firstElementChild.textContent = 'Picked up';

                update_btn.classList.add('bg-[#6ce052]');
                update_btn.classList.remove('bg-[#66BD50]');

                update_btn.childNodes[2].textContent = 'Mark as picked up';
                update_btn.dataset.status = 'on the way';

            }

            return;
        }
        return;
    }

}
driverOrdersList.addEventListener('click', change_driver_status);

async function change_driver_tabs(e) {
    if (!e.target.classList.contains('tab_head'))

        return;

    const tab = e.target.parentElement;
    const url = e.target.dataset.url;
    const companyID = e.target.dataset.companyid;
    const userID = e.target.dataset.userid;

    drive_tab.forEach(tab => {
        tab.classList.remove('active__nav')
        tab.lastElementChild.classList.add('hidden');
        tab.lastElementChild.classList.remove('flex');
    })

    tab.classList.add('active__nav');
    tab.lastElementChild.classList.remove('hidden');
    tab.lastElementChild.classList.add('flex');


    // get code from backend
    driverOrdersList.innerHTML = '';
    driverOrdersList.nextElementSibling.classList.remove('hidden');
    const res = await axios.post(url, {
        userID: userID,
        companyID: companyID
    }, { "Content-Type": "application/json" });

    // load spinner
    if (res.data.status == 'success') {
        driverOrdersList.nextElementSibling.classList.add('hidden');

        let orders = res.data.orders;
        driverOrdersList.innerHTML = '';

        if (tab.dataset.tab == 'tab 1') { // loop and display orders
            let currentOrders = '';
            if (orders.length > 0) {
                orders.forEach(ord => {
                    let amount = 0;
                    ord.packageItems.forEach(itm => {
                        amount = amount + itm.Price;
                    })

                    let btnCol = '';
                    let btnText = '';
                    let statusCol = '';
                    let statusText = '';
                    let display = '';
                    let driverCollectMoney = '';
                    let link = res.data.uri;

                    if (ord.orderStatus == 'picked up') {
                        btnCol = 'bg-yellow-500';
                        btnText = 'Mark as picked up';
                        statusText = 'Started';
                        statusCol = 'bg-yellow-500 text-white';
                    }

                    if (ord.orderStatus == 'on the way') {
                        btnCol = 'bg-[#6ce052]';
                        btnText = 'Mark as on the way';
                        statusText = 'Picked up';
                        statusCol = 'bg-blue-400/50 text-blue-600/75';
                    }

                    if (ord.orderStatus == 'done') {
                        btnCol = 'bg-[#66BD50]';
                        btnText = 'Mark as done';
                        statusText = 'on the way';
                        statusCol = 'bg-[#5856CE]/30 text-[#5856CE]';
                    }

                    if (ord.orderStatus != 'picked up') {
                        display = 'inline-block';
                    } else {
                        display = 'hidden';
                    }

                    if (ord.paymentMethod == 'Cash on delivery' && ord.orderStatus == 'done') {
                        driverCollectMoney = 'data-te-toggle="modal" data-te-target="#staticBackdrop" data-te-ripple-init data-te-ripple-color="light" cashondelivery';
                    }

                    currentOrders = currentOrders + ` 
                <div class="overflow-x-visible w-[30%] mt-5 rounded-md shadow-md bg-white px-4">
                    <div class="flex justify-between px-5 pb-2 pt-5 items-center border-b border-gray-300/50 mb-3">
                        <h3 class="text-left">Order 1</h3>
                        <span class="float-right"><img src="${res.data.images
                        }naira.png" class="w-3 h-3 inline-block -mt-1"
                                alt="">${amount.toFixed(2)
                        }</span>
                    </div>
                    <!-- start poiint and end --->
                    <div class="flex flex-col justify-start items-start text-left">
                        <span
                            class="bg-primary-100 self-end px-3 py-1 rounded-full ${statusCol} text-xs font-light status">
                            ${statusText}</span>
                        <div class="p-[2px]"><img src="${res.data.images
                        }satrt_point.png" class="inline-block w-3 h-3" alt="">
                            <p class="inline-block text-xs font-bold px-[5px]">${ord.fullName
                        }</p>
                        </div>
                        <div class="pb-5 px-4 ml-2 border-l border-gray-400/50">
                            <p class="text-xs font-light font-sans text-gray-600/70">${ord.address
                        }</p>
                        </div>

                        <div class="p-[2px]"><img src="${res.data.images
                        }location.png" class="inline-block w-3 h-4" alt="">
                            <p class="inline-block text-xs font-bold px-[5px]">${ord.receiverName
                        }</p>
                        </div>
                        <div class="pb-5 px-4 ml-2">
                            <p class="text-xs font-light font-sans text-gray-600/70">${ord.receiverAddress
                        }</p>
                        </div>
                        <button type="button"
                        data-orderID="${ord.orderID
                        }" data-url="${res.data.uri
                        }dispatch/view_order" data-userid="${res.data.userID
                        }" onclick="view_order(this)"
                            class="mx-auto -mt-2 mb-2 p-2 text-sm font-sans font-normal text-yellowColor leading-6"
                            data-te-dropdown-item-ref data-te-toggle="modal" data-te-target="#driverOrders"
                            data-te-ripple-init data-te-ripple-color="light">View
                            more <img src="${res.data.images
                        }yellow_arrow_down.png" alt="" class="inline-block ml-2"> </button>
                        <div class="w-full flex flex-row justify-around items-center">
                            <img src="${res.data.images
                        }change_status.png"
                                class="w-7 h-7 hover:scale-105 transition-transform ease-linear -mt-4 status_btn ${display}"
                                alt="">
                            <button type="button" ${driverCollectMoney} data-userid="${res.data.userID
                        }" data-status="${ord.orderStatus
                        }" data-orderid="${ord.orderID
                        }" data-packageid="${ord.packageID
                        }" data-url="${link}" data-status="${ord.orderStatus
                        }"
                                class="w-10/12 mx-auto px-2 py-1 rounded-full ${btnCol} text-white text-center mb-4 shadow-md hover:scale-105 transition-transform ease-linear outline-none driver_order_status">
                                <img src="${res.data.images
                        }arrow_mark.png" class="inline-block h-3 mr-1 -mt-1" alt="">
                               ${btnText}
                            </button>
                        </div>
                    </div>
                </div> 
        
            `;

                });
                driverOrdersList.innerHTML = currentOrders;

            } else {
                driverOrdersList.innerHTML = ` 
                    <div>
                        <img class="mt-16 mx-auto" src="${res.data.images
                    }truck_parcel.png" alt="">
                        <h3 class=" mb-20 font-sans">No dispatch found</h3>
                    </div>
                `;

            }
        }


        if (tab.dataset.tab == 'tab 2') {
            let waitingOrders = '';
            driverOrdersList.innerHTML = '';

            if (orders.length > 0) {
                orders.forEach(ele => {

                    let packageItems = JSON.parse(ele.packageItems);
                    let amount = 0;
                    packageItems.forEach(itm => {
                        amount = amount + itm.Price;
                    })
                    waitingOrders = waitingOrders + ` 
                <div class="overflow-x-visible w-[30%] mt-5 rounded-md shadow-md bg-white px-4">
                    <div class="flex justify-between px-5 pb-2 pt-5 items-center border-b border-gray-300/50 mb-3">
                        <h3 class="text-left">Order 1</h3>
                        <span class="float-right"><img src="${res.data.images
                        }/naira.png" class="w-3 h-3 inline-block -mt-1"
                                alt="">${amount}</span>
                    </div>
                    <!-- start poiint and end --->
                    <div class="flex flex-col justify-start items-start text-left">
                        <div class="p-[2px]"><img src="${res.data.images
                        }/satrt_point.png" class="inline-block w-3 h-3" alt="">
                            <p class="inline-block text-xs font-bold px-[5px]">${ele.fullName
                        }</p>
                        </div>
                        <div class="pb-5 px-4 ml-2 border-l border-gray-400/50">
                            <p class="text-xs font-light font-sans text-gray-600/70">${ele.address
                        }</p>
                        </div>

                        <div class="p-[2px]"><img src="${res.data.images
                        }/location.png" class="inline-block w-3 h-4" alt="">
                            <p class="inline-block text-xs font-bold px-[5px]">${ele.receiverName
                        }</p>
                        </div>
                        <div class="pb-5 px-4 ml-2">
                            <p class="text-xs font-light font-sans text-gray-600/70">${ele.receiverAddress
                        }</p>
                        </div>
                        <button type="button" data-orderID="${ele.orderID
                        }" data-url="${res.data.uri
                        }dispatch/view_order" data-userid="${res.data.userID
                        }" onclick="view_order(this)"
                            class="mx-auto -mt-2 mb-2 p-2 text-sm font-sans font-normal text-yellowColor leading-6"
                            data-te-dropdown-item-ref data-te-toggle="modal" data-te-target="#driverOrders"
                            data-te-ripple-init data-te-ripple-color="light">View
                            more <img src="${res.data.images
                        }/yellow_arrow_down.png" alt="" class="inline-block ml-2"> </button>
                        <div class="w-full flex flex-row justify-around items-center">
                            <img src="${res.data.images
                        }/change_status.png"
                                class="w-7 h-7 hover:scale-105 transition-transform ease-linear -mt-4 status_btn hidden"
                                alt="">
                            <div class="flex flex-row justify-center items-center space-x-5 w-full">
                    <button type="button" data-status="reject" data-userid="${ele.driverID
                        }" data-orderid="${ele.orderID
                        }" data-packageid="${ele.packageID
                        }" data-url=" ${res.data.uri
                        }/dispatch/reject_order" onclick="reject_package(this)"
                                    class="w-1/2 mx-auto px-2 py-1 rounded-full bg-[#DE4841] text-white text-center mb-4 shadow-md hover:scale-105 transition-transform ease-linear outline-none driver_order_status">
                                    <img src="${res.data.images
                        }/Remove.png" class="inline-block h-3 mr-1 -mt-1" alt="">
                                    Reject
                                </button>

                                <button type="button" data-status="accept" data-userid="${ele.driverID
                        }" data-orderid="${ele.orderID
                        }" data-packageid="${ele.packageID
                        }" data-url="${res.data.uri
                        }/dispatch/accept_order" onclick="accept_package(this)"
                                    class="w-1/2 mx-auto px-2 py-1 rounded-full bg-[#66BD50] text-white text-center mb-4 shadow-md hover:scale-105 transition-transform ease-linear outline-none driver_order_status">
                                    <img src = "${res.data.images
                        }/Assign to driver.png" class = "inline-block h-3 mr-1 -mt-1" alt = "" >
                                    Accept
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                })

                driverOrdersList.innerHTML = waitingOrders;
            } else {
                driverOrdersList.innerHTML = ` 
                    <div>
                        <img class="mt-16 mx-auto" src="${res.data.images
                    }truck_parcel.png" alt="">
                        <h3 class=" mb-20 font-sans">No dispatch found</h3>
                    </div>
                `;
            }

        }


        if (tab.dataset.tab == 'tab 3') {
            let driversCompletedOrders = '';

            let orders = res.data.orders;

            // loop through orders
            orders.forEach(ord => {
                driversCompletedOrders = driversCompletedOrders + `   
                    <tr>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            ${ord.address
                    }</td>

                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            ${ord.pickUpDate
                    }</td>

                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            ${ord.receiverAddress
                    }</td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            ${ord.deliveryDate

                    }</td>

                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            <span
                                class="inline-block whitespace-nowrap rounded-[0.27rem] bg-success-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-success-700">
                                Completed
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button type="button"
                                data-orderID="${ord.orderID
                    }" data-url="${res.data.uri
                    }dispatch/view_order" data-userid="${res.data.userID
                    }" onclick="view_order(this)"
                                class="mx-auto -mt-2 mb-2 p-2 text-sm font-sans font-normal text-yellowColor leading-6"
                                data-te-dropdown-item-ref data-te-toggle="modal" data-te-target="#driverOrders"
                                data-te-ripple-init data-te-ripple-color="light">View
                                more <img src="${res.data.images
                    }yellow_arrow_down.png" alt="" class="inline-block ml-2"> 
                            </button>
                        </td>
                    </tr>
                `
            })

            let tableContainer = `
            <div class="mt-5 px-2 h-screen overflow-visible mb-10">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-visible">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="border overflow-y-visible">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-500/5">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Pickup Location
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Pickup Date
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Delivery Location
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Delivery Date
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody id="orders" class="divide-y divide-gray-200">
                                 

                                `;

            let restString = `</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>`

            driverOrdersList.innerHTML = tableContainer + driversCompletedOrders + restString;
        }

    }
}
driverTabs.addEventListener('click', change_driver_tabs);

async function view_order(e) {
    let spinner = document.querySelector('.loader');
    spinner.classList.remove('hidden');
    spinner.nextElementSibling.classList.add('hidden');

    const url = e.dataset.url;
    const orderID = e.dataset.orderid;
    const userID = e.dataset.userid;


    // send request
    const res = await axios.post(url, {
        orderID: orderID,
        userID: userID
    }, { "Content-Type": "application/json" });

    if (res.data.status == 'success') { // remove spinner
        spinner.classList.add('hidden');
        spinner.nextElementSibling.classList.replace('hidden', 'flex');

        // populate datas
        let order = res.data.orders;
        let packageItems = order.packageItems;
        let amount = 0;
        let item = '';
        document.querySelector('.paymethod').textContent = order.paymentMethod;
        document.querySelector('.placementTime').textContent = order.placement_date;
        document.querySelector('.senderName').textContent = order.fullName;
        document.querySelector('.senderAdds').textContent = order.address;
        document.querySelector('.receiverName').textContent = order.receiverName;
        document.querySelector('.receiverAdds').textContent = order.receiverAddress;
        document.querySelector('.deliveryInstruction').textContent = order.deliveryInstruction;

        // // loop through and get items
        packageItems.forEach(itm => {
            amount = amount + itm.Price;
            item = item + `<li class="list-disc">${itm.item_name
                }<span class="rounded-full bg-gray-300 p-1 text-xs text-black/50 inline-block ml-2">x ${itm.item_quantiy
                }</span></li>`;
        })

        document.querySelector('.packageItems').innerHTML = item;
        document.querySelector('.amount').childNodes[1].textContent = amount.toFixed(2);


    }
}

async function accept_package(e) {
    const container = e.parentElement.parentElement.parentElement.parentElement;
    const url = e.dataset.url;
    const orderID = e.dataset.orderid;
    const userID = e.dataset.userid;
    const packageID = e.dataset.packageid;

    console.log(url);

    const res = await axios.post(url, {
        driverID: userID,
        orderID: orderID,
        packageID: packageID
    }, { "Content-Type": "application/json" })

    if (res.data.status == "success") {
        display_msg(res.data.message);
        container.remove();

        // show empty message
        if (driverOrdersList.children.length == 0) {
            driverOrdersList.innerHTML = ` 
                    <div>
                        <img class="mt-16 mx-auto" src="${res.data.images
                }truck_parcel.png" alt="">
                        <h3 class=" mb-20 font-sans">No dispatch found</h3>
                    </div>
                `;
        }
    }
}

async function reject_package(e) {
    const container = e.parentElement.parentElement.parentElement.parentElement;
    const url = e.dataset.url;
    const orderID = e.dataset.orderid;
    const userID = e.dataset.userid;
    const packageID = e.dataset.packageid;

    const res = await axios.post(url, {
        driverID: userID,
        orderID: orderID,
        packageID: packageID
    }, { "Content-Type": "application/json" });

    if (res.data.status == "success") {
        display_msg(res.data.message);
        container.remove();

        // show empty message
        if (driverOrdersList.children.length == 0) {
            driverOrdersList.innerHTML = ` 
                    <div>
                        <img class="mt-16 mx-auto" src="${res.data.images
                }truck_parcel.png" alt="">
                        <h3 class=" mb-20 font-sans">No dispatch found</h3>
                    </div>
                `;
        }
    }

}

async function driver_accept_payment(e) {
    const res = await axios.post(e.dataset.url, {
        packageID: e.getAttribute('packageid'),
        orderID: e.getAttribute('orderid'),
        userID: e.getAttribute('userid'),
        amount: e.getAttribute('amount'),
        type: 'done',
        payment: true,
        method: 'update'
    }, { "Content-Type": "application/json" })

    if (res.data.status == 'success') {
        document.querySelector('.close_btn').click();

        // remove the container row
        let emptyOrder = `
                <div>
                    <img class="mt-16 mx-auto" src="${res.data.images
            }truck_parcel.png" alt="">
                    <h3 class=" mb-20 font-sans">No dispatch found</h3>
                </div>
            `;
        doneCon.remove();

        if (overallContainer.children.length == 0) {
            overallContainer.innerHTML = emptyOrder;
        }

        // alert message 
        display_msg(res.data.message)

    }
}

function display_msg(text) {
    Swal.fire({
        text: text,
        toast: true,
        position: 'top-end',
        timer: 2000,
        type: 'error',
        timerProgressBar: true,
        showCancelButton: false,
        showConfirmButton: false,
        didOpen: () => {
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
    })
}

function addAttribute(element, attribute) {
    // add atrribute to function
    Object.keys(attribute).forEach(attr => {
        element.setAttribute(attr, attribute[attr]);
    })
}

function removeAttribute(element, attribute) {
    Object.keys(attribute).forEach(attr => {
        console.log(attr);
        element.removeAttribute(attr);
    })
}