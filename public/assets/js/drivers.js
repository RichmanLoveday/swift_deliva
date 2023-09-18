const registerDriverBtn = document.getElementById('register_driver');
const editDriverBtn = document.getElementById('edit_driver');
const resetPassword = document.getElementById('reset_password');

let driverID,
    rowEmail,
    rowFullName,
    rowPhone,
    rowStatus;

function validateForm(e) {
    const fullNameInput = document.querySelector(".full_name");
    const phoneInput = document.querySelector(".phn_num");
    const emailInput = document.querySelector(".email");
    const passwordInput = document.querySelector(".password");

    const url = e.target.dataset.url;
    const companyID = e.target.dataset.companyid;

    let error = false;

    if (fullNameInput.value.trim() === "") {
        fullNameInput.nextElementSibling.textContent = "Please enter your full name.*";
        error = true;
    } else {
        fullNameInput.nextElementSibling.textContent = '';
    }

    if (phoneInput.value.trim() === "") {
        phoneInput.nextElementSibling.textContent = "Please enter your phone number.*";
        error = true;
    } else if (isNaN(phoneInput.value)) {
        phoneInput.nextElementSibling.textContent = "Please enter a valid phone number.*";
        error = true;
    } else {
        phoneInput.nextElementSibling.textContent = '';
    }

    if (emailInput.value.trim() === "") {
        emailInput.nextElementSibling.textContent = "Please enter your email address.*";
        error = true;
    } else if (!isValidEmail(emailInput.value)) {
        emailInput.nextElementSibling.textContent = "Please enter a valid email.*";
        error = true;

    } else {
        emailInput.nextElementSibling.textContent = "";
    }

    if (passwordInput.value.trim() === "") {
        passwordInput.nextElementSibling.textContent = "Please enter a temporary password.*";
        error = true;
    } else if (passwordInput.value.length < 5) {
        passwordInput.nextElementSibling.textContent = "Password is too short";
        error = true;
    } else {
        passwordInput.nextElementSibling.textContent = '';
    }

    if (!error) {
        async function test() {
            // e.target.setAttribute('disabled', '');
            const res = await axios.post(url, {
                userDetails: {
                    fullName: fullNameInput.value,
                    email: emailInput.value,
                    phn: phoneInput.value,
                    password: passwordInput.value,
                    companyID: companyID
                },
                type: 'driver'
            }, { "Content-Type": "multipart/form-data" });

            console.log(res.data);
            if (res.status == 200 && res.data.status == 'success') {
                e.target.removeAttribute('disabled');
                document.querySelector('.close_btn').click();
                sweet_driver('success', res.data.message);
                let last_updated = res.data.last_updated;
                let images = res.data.images;
                let uri = res.data.uri;
                let status;
                let statusCol;

                let driversDetails = `
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">${last_updated.fullName
                    }</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                            ${last_updated.phone ?? 'N/A'
                    }</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                            ${last_updated.email
                    }
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                      <span
                            class="inline-block whitespace-nowrap rounded-[0.27rem] bg-warning-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-warning-700">
                            offline
                        </span>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="relative" data-te-dropdown-ref>
                                <button class="" type="button" id="dropdownMenuButton1" data-te-dropdown-toggle-ref aria-expanded="false" data-te-ripple-init data-te-ripple-color="light">
                                    <img src="${images}dropdown.png" alt="">
                                </button>
                                <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg [&[data-te-dropdown-show]]:block"
                                    aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                                    <li>
                                         <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 view_details"
                                            href="#" data-te-dropdown-item-ref data-te-toggle="modal"
                                            data-url="${uri}drivers/view_details"
                                            data-id="<?= $driver->driverName ?>"
                                            data-te-target="#viewDetails" data-te-ripple-init
                                            data-te-ripple-color="light"><img
                                                src="${images}view_details.png"
                                                class="inline-block h-5 w-5 mr-2 -mt-1" alt="">View Details
                                        </a>
                                    </li>
                                    <li>
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 edit_driver"
                                        href="#" data-te-dropdown-item-ref data-te-toggle="modal"
                                        data-id="${last_updated.driverName
                    }"
                                        data-url="${uri}drivers/view_details"
                                        data-te-target="#registerDriver" data-te-ripple-init
                                        data-te-ripple-color="light"><img src="${images}edit.png"
                                            class="inline-block h-5 w-5 mr-2 -mt-1" alt="">Edit</a>
                                    </li>
                                    <li>
                                         <a href="#" class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 reset_password"
                                            data-te-dropdown-item-ref data-te-toggle="modal"
                                            data-id="${last_updated.driverName
                    }"
                                            data-url="${uri}drivers/reset_password"
                                            data-te-target="#resetPassword" data-te-ripple-init
                                            data-te-ripple-color="light"><img src="${images}padlock.png"
                                                class="inline-block h-5 w-5 -mt-1 mr-1" alt="">
                                            Reset Password
                                        </a>
                                    </li>
                                    <li>
                                        <a onclick="disable_driver(this)" class="block w-full whitespace-nowrap bg-transparent
                                        px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100
                                        active:text-neutral-800 active:no-underline
                                        disabled:pointer-events-none disabled:bg-transparent
                                        disabled:text-neutral-400" href="#"
                                            data-te-dropdown-item-ref data-id="${last_updated.driverName}"
                                            data-url="${uri}drivers/disable_driver"><img
                                                src="${images}permit.png"
                                                class="inline-block h-5 w-5 -mt-1 mr-1" alt="">
                                            Disable
                                        </a>
                                    </li>
                                    <li>
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 delete_driver"
                                        href="#" data-te-dropdown-item-ref
                                        data-id="${last_updated.driverName
                    }"
                                        data-url="${uri}drivers/delete_driver"><i
                                            class="fa fa-trash text-yellowColor mr-2"
                                            aria-hidden="true"></i>
                                        Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                `;


                // check if children[0] has a carrier empty
                if (document.getElementById('drivers').children[0].classList.contains('empty_carrier')) {
                    document.getElementById('drivers').children[0].remove();
                }

                document.getElementById('drivers').insertAdjacentHTML('afterbegin', driversDetails);


            }

            if (res.status == 200 && res.data.status == 'error') {
                emailInput.nextElementSibling.textContent = res.data.errors.email;
            }

            if (res.status == 404) {
                e.target.removeAttribute('disabled');
                document.querySelector('.close_btn').click();
                sweet_driver('error', 'Oops...', res.data.message);
            }
        }
        test();
    }
}
registerDriverBtn.addEventListener('click', validateForm);


function view_details(e) {

    const id = e.target.dataset.id;
    const url = e.target.dataset.url;

    // send request
    async function test() {
        const res = await axios.post(url, {
            id: id
        }, { "Content-Type": "multipart/form-data" });
        console.log(res.data);

        if (res.data.status == 'success') {
            document.querySelector('.driverName').textContent = res.data.fullName;
            document.querySelector('.driverEmail').textContent = res.data.email;
            document.querySelector('.driverPhone').textContent = res.data.phone;
            document.querySelector('.driverArea').textContent = res.data.area;
        }
    }
    test();
}

function populate_form(e) {
    const id = e.target.dataset.id;
    const url = e.target.dataset.url;
    driverID = id;

    // clear error messages
    document.querySelector(".email").nextElementSibling.textContent = '';

    // closest
    const rowDatas = e.target.closest('.row_datas');
    rowPhone = rowDatas.children[1];
    rowFullName = rowDatas.children[0];
    rowStatus = rowDatas.children[3];
    rowEmail = rowDatas.children[2];

    document.querySelector('.password').parentElement.classList.add('hidden');
    registerDriverBtn.classList.add('hidden');
    editDriverBtn.classList.remove('hidden');

    // send request
    async function test() {
        const res = await axios.post(url, {
            id: id
        }, { "Content-Type": "multipart/form-data" });
        console.log(res.data);

        if (res.data.status == 'success') {
            document.querySelector(".email").value = res.data.email;
            document.querySelector('.full_name').value = res.data.fullName;
            document.querySelector('.phn_num').value = res.data.phone;
        }
    }
    test();

}
document.getElementById('drivers').addEventListener('click', function (e) {
    if (e.target.classList.contains('view_details')) {
        view_details(e);
    }

    if (e.target.classList.contains('edit_driver')) {
        populate_form(e);
    }

    if (e.target.classList.contains('reset_password')) {
        driverID = e.target.dataset.id;
    }

    if (e.target.classList.contains('delete_driver')) {
        delete_driver(e);
    }
});


editDriverBtn.addEventListener('click', (e) => {
    const fullNameInput = document.querySelector(".full_name");
    const phoneInput = document.querySelector(".phn_num");
    const emailInput = document.querySelector(".email");
    const url = e.target.dataset.url;

    let error = false;

    if (fullNameInput.value.trim() === "") {
        fullNameInput.nextElementSibling.textContent = "Please enter your full name.*";
        error = true;
    } else {
        fullNameInput.nextElementSibling.textContent = '';
    }

    if (phoneInput.value.trim() === "") {
        phoneInput.nextElementSibling.textContent = "Please enter your phone number.*";
        error = true;
    } else if (isNaN(phoneInput.value)) {
        phoneInput.nextElementSibling.textContent = "Please enter a valid phone number.*";
        error = true;
    } else {
        phoneInput.nextElementSibling.textContent = '';
    }

    if (emailInput.value.trim() === "") {
        emailInput.nextElementSibling.textContent = "Please enter your email address.*";
        error = true;
    } else if (!isValidEmail(emailInput.value)) {
        emailInput.nextElementSibling.textContent = "Please enter a valid email.*";
        error = true;

    } else {
        emailInput.nextElementSibling.textContent = "";
    }


    if (!error) {
        async function test() {
            e.target.setAttribute('disabled', '');
            const res = await axios.post(url, {
                id: driverID,
                email: emailInput.value,
                phone: phoneInput.value,
                fullName: fullNameInput.value

            }, { "Content-Type": "multipart/form-data" });

            if (res.data.status == 'success') {
                e.target.removeAttribute('disabled');
                document.querySelector('.close_btn').click();
                sweet_driver('success', res.data.message);

                // add to edited datas
                rowEmail.textContent = res.data.email;
                rowFullName.textContent = res.data.fullName;
                // rowStatus.textContent = res.data.status ?? 'N/A';
                rowPhone.textContent = res.data.phone;

                // show password field back
                document.querySelector('.password').parentElement.classList.remove('hidden');
                registerDriverBtn.classList.remove('hidden');
                editDriverBtn.classList.add('hidden');

                // clear inputs
                emailInput.value = '';
                phoneInput.value = '';
                fullNameInput.value = '';
            }

            if (res.data.status == 'error') {
                e.target.removeAttribute('disabled');
                emailInput.nextElementSibling.textContent = res.data.errors.email;
            }

            if (res.data.status == 'failed') {
                e.target.removeAttribute('disabled');
                document.querySelector('.close_btn').click();
                sweet_driver('error', res.data.message);

                // show password field back
                document.querySelector('.password').parentElement.classList.remove('hidden');
                registerDriverBtn.classList.remove('hidden');
                editDriverBtn.classList.add('hidden');
            }
        }
        test();
    }
})


resetPassword.addEventListener('click', (e) => {
    const url = e.target.dataset.url;
    let error = false;
    if (document.querySelector('.adminPass').value.trim() === "") {
        document.querySelector('.adminPass').nextElementSibling.textContent = "Please enter password.*";
        error = true;
    } else {
        document.querySelector('.adminPass').nextElementSibling.textContent = '';
    }

    if (document.querySelector('.newPass').value.trim() === "") {
        document.querySelector('.newPass').nextElementSibling.textContent = "Please enter new password.*";
        error = true;
    } else {
        document.querySelector('.newPass').nextElementSibling.textContent = '';
    }

    if (document.querySelector('.conPass').value.trim() === "") {
        document.querySelector('.conPass').nextElementSibling.textContent = "Please enter new password.*";
        error = true;
    } else if (document.querySelector('.conPass').value.trim() !== document.querySelector('.newPass').value.trim()) {
        document.querySelector('.conPass').nextElementSibling.textContent = "Password does not match*";
        error = true;
    } else {
        document.querySelector('.conPass').nextElementSibling.textContent = '';

    }


    if (!error) {
        async function test() {
            e.target.setAttribute('disabled', '');
            const res = await axios.post(url, {
                id: driverID,
                adminPass: document.querySelector('.adminPass').value,
                newPass: document.querySelector('.newPass').value,
                conPass: document.querySelector('.conPass').value

            }, { "Content-Type": "multipart/form-data" });

            console.log(res.data);
            if (res.data.status == 'success') {
                e.target.removeAttribute('disabled');
                document.querySelector('.close_btn').click();
                document.querySelector('.resetError').classList.add('hidden');
                sweet_driver('success', res.data.message);

                // show password field back
                document.querySelector('.password').parentElement.classList.remove('hidden');

                // clear field
                document.querySelector('.adminPass').value = '';
                document.querySelector('.newPass').value = '';
                document.querySelector('.conPass').value = '';


            }

            if (res.data.status == 'error') {
                e.target.removeAttribute('disabled');
                document.querySelector('.resetError').classList.remove('hidden');
                document.querySelector('.resetError').textContent = res.data.message;
            }

            if (res.data.status == 'failed') {
                e.target.removeAttribute('disabled');
                document.querySelector('.close_btn').click();
                sweet_driver('error', res.data.message);

                // show password field back
                document.querySelector('.password').parentElement.classList.remove('hidden');
            }
        }
        test();
    }

    console.log(url);
})

function delete_driver(e) {
    const id = e.target.dataset.id;
    const url = e.target.dataset.url;
    const row = e.target.closest('.row_datas');
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
        if (result.isConfirmed) {
            async function test() {
                const res = await axios.post(url, {
                    id: id
                }, { "Content-Type": "multipart/form-data" });

                let empty_carrier = ` 
                <tr class="empty_carrier">
                    <td colspan="5">
                        <div
                            class="flex flex-col items-center justify-center w-1/2 mx-auto space-y-2 p-5">
                            <img src="${res.data.images
                    }carrier.png" alt="">
                            <h3
                                class="font-sans text-2xl text-center leading-normal font-semibold text-gray-900/70">
                                Nothing to
                                see
                                yet</h3>
                            <p class="text-center text-[17px] leading-normal font-sans">Have a Driver
                                registered
                                first
                            </p>
                        </div>
                    </td>
                </tr>
                `;

                if (res.data.status == 'success') {
                    row.remove();
                    console.log(document.getElementById('drivers').children);

                    if (document.getElementById('drivers').children.length == 0) {
                        document.getElementById('drivers').innerHTML = empty_carrier;
                    }

                    sweet_driver('success', res.data.message);
                }

                if (res.data.status == 'failed') {
                    sweet_driver('error', res.data.message);
                }
            }
            test();
        }
    })

}

async function disable_driver(e) {
    const id = e.dataset.id;
    const url = e.dataset.url;
    const row = e.closest('.row_datas');

    const res = await axios.post(url, {
        id: id
    }, { "Content-Type": "multipart/form-data" });
    console.log(res.data);
    if (res.data.status == 'success') {
        e.parentElement.classList.replace('block', 'hidden');
        e.parentElement.previousElementSibling.classList.replace('hidden', 'block');

        row.children[3].innerHTML = '';
        row.children[3].innerHTML = ` 
            <span
                class="inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700">
                disabled
            </span>
        `;
    }
}

async function enable_driver(e) {
    const id = e.dataset.id;
    const url = e.dataset.url;
    const row = e.closest('.row_datas');

    const res = await axios.post(url, {
        id: id
    }, { "Content-Type": "multipart/form-data" });
    console.log(res.data);
    if (res.data.status == 'success') {
        e.parentElement.classList.replace('block', 'hidden');
        e.parentElement.nextElementSibling.classList.replace('hidden', 'block');

        row.children[3].innerHTML = '';
        row.children[3].innerHTML = `
            <span
                class="inline-block whitespace-nowrap rounded-[0.27rem] bg-warning-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-warning-700">
                offline
            </span>
        `;
    }
}

function isValidEmail(email) { // Regular expression for email validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

function sweet_driver(icon, title, text = '') {
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
        showConfirmButton: false,
        timer: 2000
    })
}
