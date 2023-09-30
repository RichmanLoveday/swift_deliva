const Status = document.getElementById('status');
const availableDrivers = document.querySelector('.available_drivers');
const assignedOrders = document.querySelector('.assigned_orders');
const reassignDriver = document.querySelector('.reassign_driver');
const drivers = document.querySelectorAll('.driver');

// change status
async function update_status(e, url, userID) {
    if (e.classList.contains('offline')) {
        const res = await axios.post(url, { userID: userID, status: 'offline' });
        console.log(res.data);

        if (res.data.status == 'success') {
            e.classList.remove('opacity-100', 'hidden');
            e.classList.add('opacity-0');

            setTimeout(() => {
                e.classList.add('hidden');
                e.previousElementSibling.classList.remove('hidden', 'opacity-0');
            }, 500)
        }

    }

    if (e.classList.contains('online')) {
        // send ajax
        const res = await axios.post(url, { userID: userID, status: 'online' });
        console.log(res.data)

        if (res.data.status == 'success') {
            e.classList.remove('opacity-100', 'hidden');
            e.classList.add('opacity-0');

            setTimeout(() => {
                e.classList.add('hidden');
                e.nextElementSibling.classList.remove('hidden');
                e.nextElementSibling.classList.add('opacity-100');
            }, 500)
        }

    }
}
//Status.addEventListener('click', update_status);


async function view_dash_order(e, url, packageID) {
    console.log(e);

    console.log(packageID)
    const row = e.closest('.order_row');
    let spinner = document.querySelector('.loader');
    let test = document.querySelector('.orderStatus')

    try {
        const res = await axios.post(url + 'dashboard/order_details', {
            packageID: packageID
        }, { "Content-Type": "application/json" })

        // console.log(res.data);

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
            //  console.log(res.data)
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
            // document.querySelector('.order_num').textContent = orderNum;


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
        // document.querySelector('.delivered_btn').addEventListener('click', async () => {
        //     let url = res.data.uri + 'order/mark_as_delivered';
        //     const resData = await axios.post(url, { orderID: e.target.dataset.orderid, packageID: e.target.dataset.packageid });

        //     console.log(resData.data)
        //     if (resData.data.status == 'success') {
        //         row.remove();
        //         document.querySelector('.orderStatus').textContent = resData.data.order.orderStatus;
        //         document.querySelector('.close_btn').click();
        //     }
        // });


        // document.querySelector('.failed_btn').addEventListener('click', async () => {
        //     let url = res.data.uri + 'order/mark_as_failed';
        //     const resData = await axios.post(url, { orderID: e.target.dataset.orderid, packageID: e.target.dataset.packageid });

        //     console.log(resData.data)

        //     if (resData.data.status == 'success') {
        //         row.remove();
        //         //  document.querySelector('.orderStatus').textContent = resData.data.order.orderStatus;
        //         document.querySelector('.close_btn').click();
        //     }
        // })

        // document.querySelector('.delete_order_btn').addEventListener('click', async () => {
        //     let url = res.data.uri + 'order/delete_order';
        //     const resData = await axios.post(url, { orderID: e.target.dataset.orderid, packageID: e.target.dataset.packageid });

        //     console.log(resData.data)
        //     if (resData.data.status == 'success') {
        //         row.remove();
        //         //  document.querySelector('.orderStatus').textContent = resData.data.order.orderStatus;
        //         document.querySelector('.close_btn').click();
        //     }
        // })

    } catch (error) { }


}

async function getDriverOrders(e, url, driverID, companyID) {
    console.log(e);


    // style the drivers
    drivers.forEach(drive => {
        drive.classList.remove('border-yellowColor', 'bg-white', 'border-l-4');
    })


    // add to current click
    if (e.classList.contains('driver')) {
        e.classList.add('border-yellowColor', 'bg-white', 'border-l-4');
    } else {
        e.parentElement.classList.add('border-yellowColor', 'bg-white', 'border-l-4');
    }

    // get date from backend
    const res = await axios.post(url + 'dashboard/getDriverOrders', { companyID: companyID, driverID: driverID });
    console.log(res.data);

    if (res.data.status == 'success') {
        console.log(res.data.driverPackage)
        const data = get_availablee_orders(res.data.driverPackage[0], res.data.uri, res.data.images);

        assignedOrders.innerHTML = '';
        assignedOrders.innerHTML = data;
    }



}

function get_availablee_orders(data, uri, images) { // run ajax and send data to front end
    console.log(data.orders);

    let orders = '';
    let num = 0;
    data.orders.forEach(ord => {
        num++;
        let amount = 0;
        let bgColor = '';
        let text = '';

        if (ord.order_status == 2) {
            bgColor = 'bg-blue-400/50';
            text = 'Started';
        }

        if (ord.order_status == 3) {
            bgColor = 'bg-blue-400/50';
            text = "Picked Up";
        }

        if (ord.order_status == 8) {
            bgColor = 'bg-[#5856CE]/30';
            text = 'On the way';
        }

        // check amount
        let items = JSON.parse(ord.packageItems);

        items.forEach(itm => {
            amount = amount + itm.Price;
        })

        orders = orders + `
        <div class="border border-gray-300/50  rounded-md">
           <div class="flex flex-row justify-between items-start p-4">
               <div class="space-x-4">
                   <span
                       class="bg-primary-100 px-3 py-1 rounded-full ${bgColor} text-xs text-blue-600/75 font-light">${text}</span>
                    <span onclick="view_dash_order(this, '${uri}', '${ord.packageID}')" class="underline text-xs font-light cursor-pointer" data-te-dropdown-item-ref
                       data-te-toggle="modal" data-te-target="#order" data-te-ripple-init
                       data-te-ripple-color="light">Order ${num}</span>
               </div>
               <div class="space-x-4">
                   <span class="text-xs font-semibold"><img src="${images}naira.png"
                           class="w-3 h-3 -mt-1 inline-block" alt="">${amount}</span>
               </div>
           </div>
           <hr class="w-full border border-gray-300/50">
           <div class="flex justify-start flex-row items-start">
               <!-- start poiint and end --->
               <div class="px-4">
                   <div class="flex flex-col justify-start items-start text-left">
                       <div class="p-[2px]"><img src="${images}satrt_point.png"
                               class="inline-block w-3 h-3" alt="">
                           <p class="inline-block text-xs font-bold px-[5px]">${ord.fullName}</p>
                       </div>
                       <div class="pb-5 px-4 ml-2 border-l border-gray-400/50">
                           <p class="text-xs font-bold font-sans text-gray-600/70">${ord.address}</p>
                       </div>
   
                       <div class="p-[2px]"><img src="${images}location.png"
                               class="inline-block w-3 h-4" alt="">
                           <p class="inline-block text-xs font-bold px-[5px]">${ord.receiverName}</p>
                       </div>
                       <div class="pb-5 px-4 ml-2">
                           <p class="text-xs font-bold font-sans text-gray-600/70">${ord.receiverAddress}</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       `;
    });

    return orders;

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
