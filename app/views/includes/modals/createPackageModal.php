<!----Create Package Modal --->
<div data-te-modal-init
    class="fixed left-0 top-0 z-[1055] border-0 hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="createPackage" tabindex="-1" aria-labelledby="createPackageLabel" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none border-0 relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[0px]:m-0 min-[0px]:h-full min-[0px]:max-w-none">
        <div
            class="pointer-events-auto relative flex w-full flex-col border-0 rounded-md bg-white bg-clip-padding text-current shadow-lg outline-none min-[0px]:h-full min-[0px]:rounded-none min-[0px]:border-0">
            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md p-4 min-[0px]:rounded-none">
                <!-- Modal title -->
                <h5 class="font-sans font-semibold leading-8 text-2xl" id="createPackageLabel">
                    Create Pascel
                </h5>
                <!-- Close button -->
                <button type="button"
                    class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none close_btn"
                    data-te-modal-dismiss aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="min-[0px]:overflow-y-auto">
                <form action=""
                    class="flex justify-between flex-col md:w-full mx-auto md:flex-row space-x-0 space-y-5 md:space-y-0 items-start md:space-x-5 p-4 ">
                    <div class="flex flex-row items-start px-5 border-2 border-gray-900/10 rounded-lg w-full md:w-1/2">
                        <div class="w-1/2 space-y-2 px-4 my-10 border-r-2 border-gray-900/10">
                            <h3 class="font-sans text-xl font-semibold leading-normal">Package Details</h3>
                            <div class="space-y-2">
                                <h3>Name of package</h3>
                                <input type="text"
                                    class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                    placeholder="Enter name" name="packageName">
                            </div>
                            <h3 class="mt-3">Items(s): W/L/H in cm *</h3>
                            <div id="items">
                                <div class="space-y-2 mb-2 item w-full">
                                    <div class="flex flex-row justify-between items-center space-x-3 item_con">
                                        <input type="text"
                                            class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                            placeholder="Item name">
                                        <img src="images/delete_con.png" alt=""
                                            class="cursor-pointer remove_item hidden">
                                    </div>
                                    <input type="number" min="0"
                                        class="w-[45%] p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1 item_quantity placeholder:text-sm"
                                        placeholder="Qty" name="itemQty">
                                    <input type="number" min="0"
                                        class="w-[45%] p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1 item_weight placeholder:text-sm"
                                        placeholder="Actual Weight" name="itemWeight">
                                    <input type="number" min="0"
                                        class="w-[25%] p-1 border-2 inline-block border-gray-900/10 rounded-lg placeholder:p-1 item_length placeholder:text-sm"
                                        placeholder="L" name="itemLenght">
                                    <img src="images/times.png" class="inline-block w-2 h-2 -mt-2 mx-1" alt="">
                                    <input type="number" min="0"
                                        class="w-[25%] p-1 inline-block border-2 border-gray-900/10 rounded-lg placeholder:p-1 item_height placeholder:text-sm"
                                        placeholder="H" name="itemHeight">
                                    <img src="images/times.png" class="inline-block w-2 h-2 -mt-2 mx-1" alt="">
                                    <input type="number" min="0"
                                        class="w-[25%] p-1 border-2 inline-block border-gray-900/10 rounded-lg placeholder:p-1 item_width placeholder:text-sm"
                                        placeholder="W" name="itemLenght">
                                </div>
                            </div>
                            <button type="button" id="add_item" data-images="<?= IMAGES ?>"
                                class="inline-block w-28 p-1 text-gray-900/50 font-sans text-center leading-normal border-2 border-gray-900/10 rounded-lg hover:scale-100 hover:shadow-md transition-transform ease-linear duration-100"><img
                                    src="images/add_gray.png" class="-mt-1 mr-1 inline-block" alt="">
                                Add More
                            </button>

                            <div class="space-y-2 mt-3">
                                <h3 class="mt-3">Describe Package</h3>
                                <textarea name="packageDescription"
                                    class="w-full h-20 p-1 border-2 border-gray-900/10 resize-none rounded-lg placeholder:p-1"
                                    id="" cols="30" rows="10" placeholder="Enter description of package"
                                    name="packageDescription"></textarea>

                            </div>
                        </div>
                        <div class="w-1/2 px-4 my-10 space-y-2">
                            <h3 class="font-sans text-xl font-semibold leading-normal" name="senderName">
                                Sender
                                Information</h3>
                            <div class="space-y-2">
                                <h3>Full name of sender</h3>
                                <input type="text" name="senderFullName"
                                    class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                    placeholder="Enter name" value="<?= set_val($senderName) ?>" disabled>
                            </div>

                            <div class="space-y-2">
                                <h3 class="mt-3">Pickup address</h3>
                                <input type="text"
                                    class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                    placeholder="Enter contact address" value="<?= set_val($senderAddress) ?>"
                                    name="pickupAddress" disabled>
                            </div>
                            <div class="space-y-2">
                                <h3 class="mt-3">Phone contact</h3>
                                <input type="text" name="phoneContact"
                                    class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                    placeholder="Enter phone number" value=" <?= set_val($senderPhone) ?>" disabled>
                            </div>
                            <div class="space-y-2">
                                <h3 class="mt-3">Enter Email Address</h3>
                                <input type="email" name="emailAddress"
                                    class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                    placeholder="Enter email address" value="<?= set_val($senderMail) ?>" disabled>
                            </div>
                            <div class="space-y-2" data-te-datepicker-init data-te-input-wrapper-init>
                                <h3 class="mt-3">Pickup date</h3>
                                <input type="text" name="pickupDate"
                                    class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                    placeholder="Select a date" data-te-datepicker-toggle-ref
                                    data-te-datepicker-toggle-button-ref />
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row items-start px-5 border-2 border-gray-900/10 rounded-lg w-full md:w-1/2">
                        <div class="w-1/2 px-4 my-10 space-y-2">

                            <h3 class="font-sans text-xl font-semibold leading-normal">Recipent Information
                            </h3>
                            <div class="space-y-2">
                                <h3>Full name of receiver</h3>
                                <input type="text" name="receiverName"
                                    class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                    placeholder="Enter name">
                            </div>
                            <div class="space-y-2">
                                <h3 class="mt-3">Recipent number</h3>
                                <input type="number" name="recipientNumber"
                                    class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                    placeholder="Enter number">
                            </div>


                            <div class="space-y-2">
                                <h3 class="mt-3">Recipent address</h3>
                                </h3>
                                <input type="text" name="recipientAddress"
                                    class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                    placeholder="Enter location of delivery">
                            </div>

                            <div class="space-y-2" data-te-datepicker-init data-te-input-wrapper-init>
                                <h3 class="mt-3">Delivery date</h3>
                                <input type="text" name="deliveryDate"
                                    class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                    placeholder="Set delivery date" data-te-datepicker-toggle-ref
                                    data-te-datepicker-toggle-button-ref />
                            </div>

                            <div class="space-y-2" data-te-with-icon="false" data-te-timepicker-init
                                data-te-input-wrapper-init id="timepicker-just-input">
                                <h3 class="mt-3">Delivery Time</h3>
                                <input type="text" name="deliveryTime"
                                    class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                    placeholder="Select Time" data-te-toggle="timepicker-just-input" id="form15">
                            </div>

                            <!-- <div class="space-y-2">
                                <h3 class="mt-3">Enter Email address</h3>
                                <input type="email" name="recipientEmailAddress"
                                    class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                    placeholder="Enter email address">
                            </div> -->
                        </div>
                        <div class="w-1/2 space-y-2 px-4 my-10 border-l-2 border-gray-900/10">
                            <h3 class="font-sans text-xl font-semibold leading-normal">Billing Details
                            </h3>
                            <!-- <div class="space-y-2">
                                <h3>Billing Address</h3>
                                <input type="text" name="billingAddress"
                                    class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                    placeholder="Enter billing address">
                            </div> -->
                            <div class="flex-auto space-y-2" data-te-modal-body-ref>
                                <h3 class="mt-3">Select Delivery service provider in your location</h3>
                                <select class="w-full p-1 border-2 border-red rounded-lg placeholder:p-1"
                                    data-te-select-init data-te-select-filter="true" name="deliveryServiceProvider">
                                    <option value="0">-----select delivery company-----</option>
                                    <?php foreach ($companies as $company) : ?>
                                    <option value="<?= $company->companyID ?>"><?= $company->companyName ?></option>
                                    <?php endforeach; ?>

                                </select>
                                <span class="text-red-600 hidden text-sm italic errorCourier">Select a courier
                                    service</span>
                            </div>
                            <div class="space-y-2">
                                <h3 class="mt-3">Payment Method</h3>
                                <select class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                    data-te-select-init name="paymentMethod">
                                    <option value="0">----payment method----</option>
                                    <option value="1" class="text-gray-800/10">Cash</option>
                                    <option value="2">Online</option>
                                </select>
                                <span class="text-red-600 hidden text-sm italic errorPay">Select a payment
                                    method</span>
                            </div>
                            <div class="space-y-2 mt-3">
                                <h3 class="mt-3">Relevant Information</h3>
                                <textarea name=""
                                    class="w-full h-20 p-1 border-2 border-gray-900/10 resize-none rounded-lg placeholder:p-1"
                                    id="" cols="30" rows="10" placeholder="Enter relevant Information"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div
                class="mt-auto flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 min-[0px]:rounded-none">
                <button type="button"
                    class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-yellow-400/50 focus:bg-yellow-400/50 focus:outline-none focus:ring-0 border border-yellowColor text-yellowColor hover:ease-in"
                    data-te-modal-dismiss>
                    Close
                </button>
                <button onclick="validatePackageForm(this)" type="button" id="createPackageBtn"
                    data-url="<?= ROOT ?>packages/registerPackage" data-images="<?= IMAGES ?>"
                    class="ml-1 inline-block rounded bg-yellow-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-yellow-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                    data-te-ripple-init data-te-ripple-color="light">
                    Create Package
                </button>

                <button onclick="validatePackageForm(this, 'edit')" type="button" id="editPackageBtn"
                    data-url="<?= ROOT ?>packages/editPackage" data-images="<?= IMAGES ?>"
                    class="ml-1 inline-block rounded bg-yellow-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-yellow-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                    data-te-ripple-init data-te-ripple-color="light">
                    Edit Package
                </button>
            </div>
        </div>
    </div>
</div>