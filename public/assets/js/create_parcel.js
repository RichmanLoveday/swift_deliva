// Get form input fields
const packageNameInput = document.querySelector('input[name="packageName"]');
const packageDescriptionInput = document.querySelector('textarea[name="packageDescription"]');
const pickupAddressInput = document.querySelector('input[name="pickupAddress"]');
const senderFullNameInput = document.querySelector('input[name="senderFullName"]');
const pickupDateInput = document.querySelector('input[name="pickupDate"]');
const phoneContactInput = document.querySelector('input[name="phoneContact"]');
const emailAddressInput = document.querySelector('input[name="emailAddress"]');
const receiverNameInput = document.querySelector('input[name="receiverName"]');
const recipientNumberInput = document.querySelector('input[name="recipientNumber"]');
// const recipientEmailInput = document.querySelector('input[name="recipientEmail"]');
const recipientAddressInput = document.querySelector('input[name="recipientAddress"]');
const deliveryDateInput = document.querySelector('input[name="deliveryDate"]');
const deliveryTimeInput = document.querySelector('input[name="deliveryTime"]');
const recipientEmailAddressInput = document.querySelector('input[name="recipientEmailAddress"]');
//const billingAddressInput = document.querySelector('input[name="billingAddress"]');
const deliveryServiceProviderInput = document.querySelector('select[name="deliveryServiceProvider"]');
const paymentMethodInput = document.querySelector('select[name="paymentMethod"]');
const relevantInformationInput = document.querySelector('textarea[name="relevantInformation"]');
const addItemBtn = document.getElementById('add_item');
const items = document.getElementById('items');
const removeBtn = document.querySelectorAll('remove_item');


// change for summit buttons 
let createParcelBtn = document.getElementById('createPackageBtn');
let editParcel = document.getElementById('editPackageBtn');
function changeBtn(type = 'newPackage') {
    createParcelBtn.classList.replace('hidden', 'inline-block');
    editParcel.classList.replace('inline-block', 'hidden');
}

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


// Validation function
async function validatePackageForm(event, type = "new") { // Prevent form submission
    // event.preventDefault();
    const images = event.dataset.images;
    const url = event.dataset.url;
    const data = {};
    console.log(url);

    let state = false;
    let payMethod = 0;
    const startPrice = 50;
    let amount = 0;
    let itemsArr = [];
    console.log(state)
    // Check if the input fields are empty or have invalid values
    if (packageNameInput.value === "") {
        packageNameInput.classList.remove('border-gray-900/10');
        packageNameInput.classList.add('border-red-600');
        state = true;
    } else {
        packageNameInput.classList.add('border-gray-900/10');
        packageNameInput.classList.remove('border-red-600');
        data.packageDecription = packageNameInput.value;
    }


    if (packageDescriptionInput.value === "") {
        packageDescriptionInput.classList.remove('border-gray-900/10')
        packageDescriptionInput.classList.add('border-red-600');

        state = true;
    } else {
        packageDescriptionInput.classList.add('border-gray-900/10')
        packageDescriptionInput.classList.remove('border-red-600');

        data.deliveryInstruction = packageDescriptionInput.value;
    }

    if (pickupAddressInput.value === "") {
        pickupAddressInput.classList.remove('border-gray-900/10')
        pickupAddressInput.classList.add('border-red-600');

        state = true;
    } else {
        pickupAddressInput.classList.add('border-gray-900/10')
        pickupAddressInput.classList.remove('border-red-600');

        data.pickUpAddress = pickupAddressInput.value;

    }

    if (senderFullNameInput.value === "") {
        senderFullNameInput.classList.remove('border-gray-900/10')
        senderFullNameInput.classList.add('border-red-600');

        state = true;
    } else {
        senderFullNameInput.classList.add('border-gray-900/10')
        senderFullNameInput.classList.remove('border-red-600');

        data.senderFullname = senderFullNameInput.value;
    }

    // Add more validation checks for sender information as needed

    if (pickupDateInput.value === "") {
        pickupDateInput.classList.remove('border-gray-900/10')
        pickupDateInput.classList.add('border-red-600');

        state = true;

    } else {
        pickupDateInput.classList.add('border-gray-900/10')
        pickupDateInput.classList.remove('border-red-600');

        data.pickUpdate = pickupDateInput.value;
    }

    if (phoneContactInput.value === "" || isNaN(phoneContactInput.value) || phoneContactInput.value.length < 5) {
        phoneContactInput.classList.remove('border-gray-900/10')
        phoneContactInput.classList.add('border-red-600');

        state = true;

    } else {
        phoneContactInput.classList.add('border-gray-900/10')
        phoneContactInput.classList.remove('border-red-600');

        data.phoneContact = phoneContactInput.value;
    }


    if (emailAddressInput.value === "") {
        emailAddressInput.classList.remove('border-gray-900/10')
        emailAddressInput.classList.add('border-red-600');

        state = true;
    } else {
        emailAddressInput.classList.add('border-gray-900/10')
        emailAddressInput.classList.remove('border-red-600');

        data.email = emailAddressInput.value;
    }

    if (receiverNameInput.value === "") {
        receiverNameInput.classList.remove('border-gray-900/10')
        receiverNameInput.classList.add('border-red-600');
        state = true;

    } else { // alert('Yess')
        receiverNameInput.classList.remove('border-red-600');
        receiverNameInput.classList.add('border-gray-900/10')

        data.receiverName = receiverNameInput.value;
    }

    // Add more validation checks for recipient information as needed

    if (recipientNumberInput.value === "" || isNaN(recipientNumberInput.value) || recipientNumberInput.value.length < 10) {
        recipientNumberInput.classList.remove('border-gray-900/10')
        recipientNumberInput.classList.add('border-red-600');
        state = true;

    } else {
        recipientNumberInput.classList.add('border-gray-900/10')
        recipientNumberInput.classList.remove('border-red-600');

        data.receiverNumber = recipientNumberInput.value;
    }

    if (recipientAddressInput.value === "") {
        recipientAddressInput.classList.remove('border-gray-900/10')
        recipientAddressInput.classList.add('border-red-600');
        state = true;

    } else {
        recipientAddressInput.classList.add('border-gray-900/10')
        recipientAddressInput.classList.remove('border-red-600');

        data.receiverAddrs = recipientAddressInput.value;

    }

    if (deliveryDateInput.value === "") {
        deliveryDateInput.classList.remove('border-gray-900/10')
        deliveryDateInput.classList.add('border-red-600');
        state = true;

    } else {
        deliveryDateInput.classList.add('border-gray-900/10')
        deliveryDateInput.classList.remove('border-red-600');

        data.deliveryDate = deliveryDateInput.value;
    }

    if (deliveryTimeInput.value === "") {
        deliveryTimeInput.classList.remove('border-gray-900/10')
        deliveryTimeInput.classList.add('border-red-600');
        state = true;

    } else {
        deliveryTimeInput.classList.add('border-gray-900/10')
        deliveryTimeInput.classList.remove('border-red-600');

        data.deliveryTime = deliveryTimeInput.value;
    }

    // if (recipientEmailAddressInput.value === "") {
    //     recipientEmailAddressInput.classList.remove('border-gray-900/10')
    //     recipientEmailAddressInput.classList.add('border-red-600');

    //     state = true;
    // } else {
    //     recipientEmailAddressInput.classList.add('border-gray-900/10')
    //     recipientEmailAddressInput.classList.remove('border-red-600');

    //     data.receiverEmail = recipientEmailAddressInput.value;
    // }

    // if (billingAddressInput.value === "") {
    //     billingAddressInput.classList.remove('border-gray-900/10')
    //     billingAddressInput.classList.add('border-red-600');
    //     state = true;
    // } else {
    //     billingAddressInput.classList.add('border-gray-900/10')
    //     billingAddressInput.classList.remove('border-red-600');

    //     data.billingAddrs = billingAddressInput.value;
    // }

    // validate options
    if (deliveryServiceProviderInput.options.selectedIndex == 0) {
        document.querySelector('.errorCourier').classList.remove('hidden');
        state = true;
    } else {
        document.querySelector('.errorCourier').classList.add('hidden');

        data.deliveryServiceProvider = deliveryServiceProviderInput.value;
    }


    if (paymentMethodInput.options.selectedIndex == 0) {
        document.querySelector('.errorPay').classList.remove('hidden');
        state = true;
    } else if (paymentMethodInput.options.selectedIndex == 2) {
        document.querySelector('.errorPay').classList.add('hidden');
        payMethod = 2;

        data.paymentMethod = 'Card';
    } else {
        document.querySelector('.errorPay').classList.add('hidden');
        payMethod = 1;

        data.paymentMethod = 'Cash on delivery';
    }


    // validate items
    document.querySelectorAll('.item').forEach((itm, i) => {
        console.log(itm.children);
        let itemObj = {};

        for (let i = 0; i < itm.children.length; i++) {
            if (i == 0) {
                let item_name = itm.children[i].firstElementChild;
                if (item_name.value === '') {
                    item_name.classList.add('border-red-600');
                    item_name.classList.remove('border-gray-900/10')
                    state = true;
                } else {
                    item_name.classList.remove('border-red-600');
                    item_name.classList.add('border-gray-900/10');

                    itemObj.item_name = item_name.value;
                }
            }

            if (itm.children[i].classList.contains('item_quantity')) {
                let itemQty = itm.children[i];
                console.log(itemQty)
                if (itm.children[i].value == '') {
                    itemQty.classList.add('border-red-600');
                    itemQty.classList.remove('border-gray-900/10');
                    state = true;

                } else {
                    itemQty.classList.remove('border-red-600');
                    itemQty.classList.add('border-gray-900/10');

                    itemObj.item_quantiy = + itemQty.value;
                }
            }

            if (itm.children[i].classList.contains('item_weight')) {
                let itemW = itm.children[i];
                if (itm.children[i].value == '') {
                    itemW.classList.add('border-red-600');
                    itemW.classList.remove('border-gray-900/10');
                    state = true;

                } else {
                    itemW.classList.remove('border-red-600');
                    itemW.classList.add('border-gray-900/10');

                    itemObj.item_weight = + itemW.value
                }
            }

            if (itm.children[i].classList.contains('item_length')) {
                let itemL = itm.children[i];
                if (itm.children[i].value == '') {
                    itemL.classList.add('border-red-600');
                    itemL.classList.remove('border-gray-900/10');
                    state = true;

                } else {
                    itemL.classList.remove('border-red-600');
                    itemL.classList.add('border-gray-900/10');

                    itemObj.item_length = + itemL.value;
                }
            }

            if (itm.children[i].classList.contains('item_height')) {

                let itemH = itm.children[i];
                if (itm.children[i].value == '') {
                    itemH.classList.add('border-red-600');
                    itemH.classList.remove('border-gray-900/10');
                    state = true;

                } else {
                    itemH.classList.remove('border-red-600');
                    itemH.classList.add('border-gray-900/10');

                    itemObj.item_height = + itemH.value;
                }
            }

            if (itm.children[i].classList.contains('item_width')) {

                let itemW = itm.children[i];
                if (itm.children[i].value == '') {
                    itemW.classList.add('border-red-600');
                    itemW.classList.remove('border-gray-900/10');
                    state = true;

                } else {
                    itemW.classList.remove('border-red-600');
                    itemW.classList.add('border-gray-900/10');

                    itemObj.item_width = + itemW.value;
                }
            }

        }

        // calculating volumetric weigth of the package
        // (W*H*L)6000
        if (state == false) {
            let price = ((itemObj.item_weight * itemObj.item_height * itemObj.item_length) / 4000);

            if (price > itemObj.item_weight) {
                itemObj.Price = + (price * startPrice).toFixed(2);
            } else {
                itemObj.Price = itemObj.item_weight;
            }
            // store the amount of package
            amount = amount + itemObj.Price;

            // store items entered in an array
            itemsArr[i] = itemObj;
        }

    })
    data.amount = amount;
    data.items = itemsArr;

    // summit form to server
    if (type == "edit") {
        summit_edit(state, url, payMethod, data);
    } else {
        summit_new_data(state, url, payMethod, data);
    }

}

async function summit_new_data(state, url, payMethod, data) {
    // send data to ajax and pay as well
    if (!state) {
        if (payMethod == 2) {
            let pay = payWithPaystack(url, data)
            // console.log(data);
        } else { // send data to ajax
            console.log(data);
            try {
                const res = await axios.post(url, data);
                console.log(res.data)

                if (res.data.status == 'success') {
                    let images = res.data.images;
                    let uri = res.data.uri;
                    let status;
                    let statusCol;

                    if (+ res.data.last_updated.deliveryStatus == 0) {
                        status = 'pending';
                        statusCol = 'warning';
                    }

                    // extract the month and date from the date string
                    let pickupDateArr = res.data.last_updated.pickUpDate.split('-');
                    let deliveryDateArr = res.data.last_updated.deliveryDate.split('-');

                    let newParcel = `
                <tr>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                        ${res.data.last_updated.packageDescription}
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                        ${res.data.last_updated.receiverName}
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                        ${res.data.last_updated.receiverContact}
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                        ${monthNames[pickupDateArr[1] - 1] + ' ' + pickupDateArr[0]
                        }</td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                        ${monthNames[deliveryDateArr[1] - 1] + ' ' + deliveryDateArr[0]
                        }</td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                        ${res.data.last_updated.receiverAddress}</td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                        ${res.data.last_updated.paymentMethod}</td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                        <span
                            class="inline-block whitespace-nowrap rounded-[0.27rem] bg-${statusCol}-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-${statusCol}-700">
                            ${status}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="relative" data-te-dropdown-ref>
                            <button class="" type="button" id="dropdownMenuButton1"
                                data-te-dropdown-toggle-ref aria-expanded="false"
                                data-te-ripple-init data-te-ripple-color="light">
                                <img src="${images}dropdown.png" alt="">
                            </button>
                            <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg [&[data-te-dropdown-show]]:block"
                                aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                                <li>
                                    <a  onclick="populate_package_form(${uri}packages/retrive_package,${res.data.last_updated}) data-url="${uri}edit_package"
                                        class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 edit_parcel"
                                        href="#" data-te-dropdown-item-ref data-te-toggle="modal"
                                        data-te-target="#createPackage" data-te-ripple-init
                                        data-te-ripple-color="light"><i
                                            class="fa fa-pencil text-yellowColor mr-2"
                                            aria-hidden="true"></i>Edit Package
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="<?= ROOT ?>packages/track_package"
                                        class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400"><img
                                            src="${images}track.png" class="inline-block h-5 w-5"
                                            alt="">
                                            Track package
                                    </a>
                                </li>
                                <li>
                                    <a data-url="${uri}packages/cancel_order"
                                        data-package="${res.data.last_updated.packageID}"
                                        data-order="${res.data.last_updated.orderID}"
                                        class="block cancel_parcel w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 el"
                                        href="#" data-te-dropdown-item-ref><i
                                            class="fa fa-ban text-yellowColor mr-2 "
                                            aria-hidden="true"></i>
                                        Cancel Order
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
             `;
                    document.getElementById('parcels').insertAdjacentHTML('afterbegin', newParcel);
                    document.querySelector('.close_btn').click();

                    sweet_package('success', res.data.message);
                }


            } catch (error) {
                console.log(error);
            }


        }
    }
}


let packageid;
async function summit_edit(state, url, payMethod, data) {
    if (!state) {
        console.log(data);
        console.log(url)
        data.packageID = packageid;

        if (payMethod == 2) {
            let pay = payWithPaystack(url, data)
            // console.log(data);
        } else { // send data to ajax
            // console.log(data);
            try {
                const res = await axios.post(url, data);
                console.log(res.data)

                if (res.data.status == 'success') {
                    document.querySelector('.close_btn').click();

                    sweet_package('success', res.data.message);
                }


            } catch (error) {
                console.log(error);
            }


        }
    }
}


// Add event listener to the form submission
//document.getElementById("myForm").addEventListener("click", validateForm);

function add_items(e) {
    let images = e.target.dataset.images;
    let newItem = `  
    <div class = "space-y-2 mb-2 item">
        <div class="flex flex-row justify-between items-center space-x-3">
            <input type="text"
                class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1 item_name"
                placeholder="Item name">
              <img src="${images}delete_con.png" alt="" class="cursor-pointer remove_item">
        </div>
        <input type="number" min="0"
            class="w-[45%] p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1 item_quantity placeholder:text-sm"
            placeholder="Qty">
         <input type="number" min="0"
            class="w-[45%] p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1 item_weight placeholder:text-sm"
            placeholder="Actual Weight" name="itemWeight">
        <input type="number" min="0"
            class="w-[25%] p-1 border-2 inline-block border-gray-900/10 rounded-lg placeholder:p-1 item_length placeholder:text-sm"
            placeholder="L" name="itemLenght">
        <img src="${images}times.png" class="inline-block w-2 h-2 -mt-10 mx-1" alt="">
        <input type="number" min="0"
            class="w-[25%] p-1 inline-block border-2 border-gray-900/10 rounded-lg placeholder:p-1 item_height placeholder:text-sm"
            placeholder="H" name="itemHeight">
        <img src="${images}times.png" class="inline-block w-2 h-2 -mt-10 mx-1" alt="">
        <input type="number" min="0"
            class="w-[25%] p-1 border-2 inline-block border-gray-900/10 rounded-lg placeholder:p-1 item_width placeholder:text-sm"
            placeholder="W" name="itemLenght">  
    </div>
    `;
    items.insertAdjacentHTML('beforeend', newItem);

}
addItemBtn.addEventListener('click', add_items);

function remove_item(e) {
    if (!e.target.classList.contains('remove_item'))
        return;



    const itemContainer = e.target.closest('.item');
    const item = document.querySelectorAll('.item');

    // chcke if item is is more than 1
    if (item.length > 1)
        itemContainer.remove();
}
items.addEventListener('click', remove_item);



const paymentForm = document.getElementById('paymentForm');
paymentForm?.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(url, data) {
    console.log(data.amount)
    let handler = PaystackPop.setup({
        key: 'pk_test_2ac48306b96059234462683a9e81798b02187120',
        email: 'lovedayrichman@yahoo.com',
        amount: data.amount * 100,
        ref: '' + Math.floor(
            (Math.random() * 1000000000) + 1
        ),
        onClose: function () {
            console.log('Closed');
        },
        callback: function (response) {
            let message = 'Payment complete! Reference: ' + response.reference;
            console.log(response);
            // send data to ajax
            if (response.status == "success") {
                data.message = response.message;
                data.transaction = response.transaction;

                document.querySelector('.close_btn').click();
                // send data to backend
                try {
                    async function test() {
                        const res = await axios.post(url, data, { "Content-Type": "multipart/form-data" });

                        console.log(res.data);

                        if (res.data.status == 'success') {
                            let images = res.data.images;
                            let uri = res.data.uri;
                            let status;
                            let statusCol;

                            if (+ res.data.last_updated.deliveryStatus == 0) {
                                status = 'pending';
                                statusCol = 'warning';
                            }

                            // extract the month and date from the date string
                            let pickupDateArr = res.data.last_updated.pickUpDate.split('-');
                            let deliveryDateArr = res.data.last_updated.deliveryDate.split('-');
                            let newParcel = `
                            <tr>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                    ${res.data.last_updated.packageDescription}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    ${res.data.last_updated.receiverName}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    ${res.data.last_updated.receiverContact}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    ${monthNames[pickupDateArr[1] - 1] + ' ' + pickupDateArr[0]
                                }</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    ${monthNames[deliveryDateArr[1] - 1] + ' ' + deliveryDateArr[0]
                                }</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    ${res.data.last_updated.receiverAddress}</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    ${res.data.last_updated.paymentMethod}</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    <span
                                        class="inline-block whitespace-nowrap rounded-[0.27rem] bg-${statusCol}-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-${statusCol}-700">
                                        ${status}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="relative" data-te-dropdown-ref>
                                        <button class="" type="button" id="dropdownMenuButton1"
                                            data-te-dropdown-toggle-ref aria-expanded="false"
                                            data-te-ripple-init data-te-ripple-color="light">
                                            <img src="${images}dropdown.png" alt="">
                                        </button>
                                        <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg [&[data-te-dropdown-show]]:block"
                                            aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                                            <li>
                                                <a data-url="${uri}edit_package"
                                                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 edit_parcel"
                                                    href="#" data-te-dropdown-item-ref data-te-toggle="modal"
                                                    data-te-target="#createPackage" data-te-ripple-init
                                                    data-te-ripple-color="light"><i
                                                        class="fa fa-pencil text-yellowColor mr-2"
                                                        aria-hidden="true"></i>Edit Package
                                                </a>
                                            </li>
                                            <li>
                                                <a target="_blank" href="${uri}packages/track_package"
                                                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400"><img
                                                        src="${images}track.png" class="inline-block h-5 w-5"
                                                        alt="">
                                                        Track package
                                                </a>
                                            </li>
                                            <li>
                                                <a data-url="${uri}packages/cancel_order"
                                                    data-package="${res.data.last_updated.packageID}"
                                                    data-order="${res.data.last_updated.orderID}"
                                                    class="block cancel_parcel w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 el"
                                                    href="#" data-te-dropdown-item-ref><i
                                                        class="fa fa-ban text-yellowColor mr-2 "
                                                        aria-hidden="true"></i>
                                                    Cancel Order
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                         `;
                            document.getElementById('parcels').insertAdjacentHTML('afterbegin', newParcel)

                            document.querySelector('.close_btn').click();
                            sweet_package('success', res.data.message);
                        }
                    }

                    test();

                } catch (error) {
                    sweet_package('error', 'Error', 'Ooopps an error occured, try again');
                };

            }
        }
    });

    handler.openIframe();
}

async function cancel_parcel(e) {
    if (!e.target.classList.contains('cancel_parcel'))

        return;



    const parcel_id = e.target.dataset.package;
    const orderID = e.target.dataset.order;
    const url = e.target.dataset.url;
    const statusColumn = e.target.closest('.parcel_row').children[7]

    // send request to ajax
    try {
        const res = await axios.post(url, {
            packageID: parcel_id,
            orderID: orderID
        }, { "Content-Type": "application/json" })

        if (res.data.status == 'success') { // update dom
            statusColumn.firstElementChild.classList.replace('bg-warning-100', 'bg-info-100');
            statusColumn.firstElementChild.classList.replace('text-warning-700', 'text-info-700');
            statusColumn.firstElementChild.textContent = 'cancelled';
            // hide cancel order btn
            e.target.parentElement.classList.add('hidden');
            // pop up message
            sweet_package('success', res.data.message);
        }

        if (res.data.status == 'failed') {
            sweet_package('error', res.data.message);
        }
    } catch (error) { }

}

async function delete_parcel(e) {
    if (!e.target.classList.contains('delete_parcel'))
        return;



    const parcel_id = e.target.dataset.id;
    const url = e.target.dataset.url;
    const row = e.target.closest('.parcel_row')

    // send request to ajax
    try {
        const res = await axios.post(url, {
            packageID: parcel_id
        }, { "Content-Type": "application/json" })

        console.log(res.data)
        if (res.data.status == 'success') { // update dom
            let emptyPackage = `  
                <tr>
                    <!-- - No pacel found --->
                    <td colspan="10">
                        <div
                            class="flex flex-col items-center justify-center w-1/2 mx-auto space-y-2 p-5">
                            <img src="<?= IMAGES ?>empty_box.png" alt="">
                            <h3
                                class="font-sans text-2xl text-center leading-normal font-semibold text-gray-900/70">
                                Nothing to
                                see
                                yet</h3>
                            <p class="text-center text-[17px] leading-normal font-sans"> Create a parcel
                                and we'll notify you when
                                your package has
                                been reviewed and acknowledged
                            </p>
                        </div>
                    </td>
                </tr>
            `;

            row.remove();
            if (document.getElementById('parcels').children.length == 0) { // add empty box
                document.getElementById('parcels').insertAdjacentHTML('beforeend', emptyPackage);
            }


            sweet_package('success', res.data.message);
        }

        if (res.data.status == 'failed') {
            sweet_package('error', res.data.message);
        }
    } catch (error) { }

}


document.getElementById('parcels').addEventListener('click', function (e) {
    cancel_parcel(e);
    delete_parcel(e);
})

async function populate_package_form(url, packageID) {
    createParcelBtn.classList.replace('inline-block', 'hidden');
    editParcel.classList.replace('hidden', 'inline-block');
    packageid = packageID;
    try {
        const res = await axios.post(url, { packageID: packageID });
        console.log(res.data)
        /// check for success message 
        if (res.data.status == 'success') {
            // populate items
            const package = res.data.packages;
            const sender = res.data.sender;
            const packageItems = JSON.parse(package.packageItems);
            console.log(res.data)
            console.log(packageItems);
            console.log(items.children);

            // populate order individual datas
            let html = '';
            if (packageItems.length > 0) {
                packageItems.forEach((itm, el) => {
                    let display = 'hidden';
                    if (el > 0) display = 'block';

                    console.log(itm)
                    html += `
                    <div class="space-y-2 mb-2 item w-full">
                        <div class="flex flex-row justify-between items-center space-x-3 item_con">
                            <input type="text"
                                class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                placeholder="Item name" value="${itm.item_name}">
                            <img src="${res.data.images}delete_con.png" alt=""
                                class="cursor-pointer remove_item ${display}">
                        </div>
                        <input type="number" min="0"
                            class="w-[45%] p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1 item_quantity placeholder:text-sm"
                            placeholder="Qty" name="itemQty" value="${itm.item_quantiy}">
                        <input type="number" min="0"
                            class="w-[45%] p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1 item_weight placeholder:text-sm"
                            placeholder="Actual Weight" name="itemWeight" value="${itm.item_weight}">
                        <input type="number" min="0"
                            class="w-[25%] p-1 border-2 inline-block border-gray-900/10 rounded-lg placeholder:p-1 item_length placeholder:text-sm"
                            placeholder="L" name="itemLenght" value="${itm.item_length}">
                        <img src="${res.data.images}times.png" class="inline-block w-2 h-2 -mt-2 mx-1" alt="">
                        <input type="number" min="0"
                            class="w-[25%] p-1 inline-block border-2 border-gray-900/10 rounded-lg placeholder:p-1 item_height placeholder:text-sm"
                            placeholder="H" name="itemHeight" value="${itm.item_height}">
                        <img src="${res.data.images}times.png" class="inline-block w-2 h-2 -mt-2 mx-1" alt="">
                        <input type="number" min="0"
                            class="w-[25%] p-1 border-2 inline-block border-gray-900/10 rounded-lg placeholder:p-1 item_width placeholder:text-sm"
                            placeholder="W" name="itemLenght" value="${itm.item_length}">
                    </div>
                `;
                })
            }
            // update the DOM
            items.innerHTML = '';
            items.innerHTML = html;

            // update forms 
            packageDescriptionInput.value = package.deliveryInstruction;
            packageNameInput.value = package.packageDescription;
            senderFullNameInput.value = package.receiverName;
            receiverNameInput.value = package.receiverName;
            recipientAddressInput.value = package.receiverAddress;
            recipientNumberInput.value = package.receiverContact;
            senderFullNameInput.value = sender.fullName;
            //  recipientEmailAddressInput.value = package.receiverEmail

            // fix pickup date and delivery date
            let pickupdate = package.pickUpDate.split('-').join('/');
            let deliveryDate = package.deliveryDate.split(' ')[0].split('-').join('/');
            let deliveryTime = package.deliveryDate.split(' ')[1].split(':').slice(0, 2).join(':');

            // get AM OR PM
            let hours = new Date(package.deliveryDate).getHours();
            let amOrPm = hours >= 12 ? "PM" : "AM";

            pickupDateInput.value = pickupdate;
            deliveryDateInput.value = deliveryDate;
            deliveryTimeInput.value = deliveryTime + ' ' + amOrPm;

            // select payment option
            let value = 1;
            if (package.paymentMethod == "Cash on delivery") value = 1;
            if (package.paymentMethod == 'Card') value = 2;
            selectIndex(paymentMethodInput, value);

            // select company option
            selectIndex(deliveryServiceProviderInput, package.companyID);
        }


    } catch (error) {
        console.log(error);
    }
}

function selectIndex(input, value) {
    for (let index = 0; index < input.length; index++) {
        input[index].removeAttribute('selected');

        if (input[index].value == value) {
            input[index].setAttribute("selected", '');
        }
    }
}

async function edit_package(packageID, senderID) {
    // receive data

    // send to ajax

    // flash message
}

function sweet_package(icon, title, text = '') {
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
        showConfirmButton: false,
        timer: 2000
    })
}
