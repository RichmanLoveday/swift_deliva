<?= $this->view('includes/app_header', $data); ?>
<?= $this->view('includes/side_bar', $data); ?>

<section class="p-5 bg-gray-500/5 overflow-y-scroll h-screen fixed top-16 w-full !pl-[260px] text-center" id="content">
    <!---- Dashboard COnatiner-->
    <div class="mx-auto rounded-md mb-10">
        <div id="status" class="flex justify-start flex-row items-center space-x-3">
            <h1 class="text-left font-sans text-sm text-black/60 leading-10 font-bold">Hey Richman,
                Welcome back
                <img src="<?= IMAGES ?>wave_hand.png" class="inline-block -mt-2 p-2" alt="">
            </h1>
            <span
                class="cursor-pointer online px-5 py-1 rounded-full bg-[#66BD50] text-white font-sans font-semibold opacity-0  transition ease-linear hidden">Go
                online
            </span>

            <span
                class="cursor-pointer offline px-5 py-1 rounded-full bg-red-800 text-white font-sans font-semibold opacity-100  transition ease-linear">Go
                offline
            </span>
        </div>
        <div class="w-[85%] mx-auto flex flex-wrap flex-col md:flex-row justify-start items-center my-5">
            <!--- Total-->
            <div
                class="border-l-4 rounded-md shadow-md bg-white border-yellowColor  space-y-5 px-4 py-4 text-left w-[20%] mx-4 my-2">
                <p class="font-sans font-semibold leading-tight text-xs text-black/50">Total No of companies</p>
                <span class="text-left text-xl font-semibold font-sans text-black/60">10</span>
            </div>
            <div
                class="border-l-4 rounded-md shadow-md bg-white border-yellow-950/70 space-y-5 px-4 py-4 text-left w-[20%] mx-4 my-2">
                <p class="font-sans font-semibold leading-tight text-xs text-black/50">Total Order</p>
                <span class="text-left text-xl font-semibold font-sans text-black/60">110 Orders</span>
            </div>

            <div
                class="border-l-4 rounded-md shadow-md bg-white border-[#1D409C]  space-y-5 px-4 py-4 text-left w-[20%] mx-4 my-2">
                <p class="font-sans font-semibold leading-tight text-xs text-black/50">Total
                    deliveries</p>
                <span class="text-left text-xl font-semibold font-sans text-black/60">20 deliveries</span>
            </div>

            <div
                class="border-l-4 rounded-md shadow-md bg-white border-[#2ECC75]  space-y-5 px-4 py-4 text-left w-[20%] mx-4 my-2">
                <p class="font-sans font-semibold leading-tight text-xs text-black/50">Total drivers</p>
                <span class="text-left text-xl font-semibold font-sans text-black/60">30 drivers</span>
            </div>

            <div
                class="border-l-4 rounded-md shadow-md bg-white border-[#EF934D] space-y-2 px-4 py-4 text-left w-[20%] mx-4 my-2">
                <p class="font-sans font-semibold leading-tight text-xs text-black/50">Earning</p>
                <span class="text-left text-xl font-semibold font-sans text-black/60 flex"><img
                        src="<?= IMAGES ?>naira.png" class="w-4 h-4 mt-[6px]" alt=""> 10</span>
            </div>
        </div>
        <div class="hidden md:flex justify-around items-center text-sm text-gray-700 font-sans font-semibold -mb-2">
            <h2>Assigned orders by driver</h2>
            <h2>New Orders</h2>
        </div>
        <div class="flex items-start md:flex-row flex-col pt-5 w-full">
            <div class="flex flex-col justify-center space-y-1 p-2 w-[20%]">
                <div class="flex flex-row justify-between items-center p-2 rounded-md bg-white shadow-sm">
                    <h5 class="text-xs text-left font-sans text-black/60 font-semibold">Active Orders</h5>
                    <div
                        class="h-5 w-5 flex justify-center mr-2 items-center rounded-full text-white text-xs font-light font-sans bg-yellowColor">
                        5
                    </div>
                </div>
                <div class="flex flex-row justify-between items-center p-2 rounded-md bg-white shadow-sm">
                    <h5 class="text-xs text-left font-sans text-black/60 font-semibold">Late orders</h5>
                    <div
                        class="h-5 w-5 flex justify-center mr-2 items-center rounded-full text-white text-xs font-light font-sans bg-yellowColor">
                        5
                    </div>
                </div>
                <div class="flex flex-row justify-between items-center p-2 rounded-md bg-white shadow-sm">
                    <h5 class="text-xs text-left font-sans text-black/60 font-semibold">On time delivery</h5>
                    <div
                        class="h-5 w-5 flex justify-center mr-2 items-center rounded-full text-white text-xs font-light font-sans bg-yellowColor">
                        5
                    </div>
                </div>
            </div>
            <div class="mt-[2px] w-[80%] border-r border-t border-gray-300/50">
                <div class="flex md:flex-row flex-col items-start justify-between">
                    <div class="w-1/3 flex flex-col available_drivers">
                        <div class="w-full text-gray-700 font-semibold rounded-l-sm bg-white text-sm text-left pl-4 font-sans py-3 border-l-4 border-yellowColor flex justify-between driver transition ease-linear"
                            data-id="1" data-url="url">
                            <h5 class="text-xs">Richman Loveday</h5>
                            <div
                                class="h-5 w-5 flex justify-center mr-2 p-2 items-center rounded-full text-white text-xs font-light font-sans bg-yellowColor">
                                5
                            </div>
                        </div>
                        <div class="w-full text-gray-700 font-semibold rounded-l-sm text-sm text-left pl-4 font-sans py-3 flex justify-between transition ease-linear driver"
                            data-id="1" data-url="url">
                            <h5 class="text-xs">Simon John</h5>
                            <div
                                class="h-5 w-5 flex justify-center items-center p-2  mr-2 rounded-full text-white text-xs font-light font-sans bg-yellowColor">
                                10
                            </div>
                        </div>

                    </div>

                    <!--- Assigned Orders -->
                    <div class="w-[80%] space-y-2 px-4 py-2 bg-white assigned_orders h-screen">
                        <div class="border border-gray-300/50  rounded-md">
                            <div class="flex flex-row justify-between items-start p-4">
                                <div class="space-x-4">
                                    <span
                                        class="bg-primary-100 px-3 py-1 rounded-full bg-blue-400/50 text-xs text-blue-600/75 font-light">Started</span>
                                    <span class="underline text-xs font-light cursor-pointer" data-te-dropdown-item-ref
                                        data-te-toggle="modal" data-te-target="#order" data-te-ripple-init
                                        data-te-ripple-color="light">Order 1</span>
                                </div>
                                <div class="space-x-4">
                                    <span class="text-xs font-semibold"><img src="<?= IMAGES ?>naira.png"
                                            class="w-3 h-3 -mt-1 inline-block" alt="">50</span>
                                    <button type="button" data-te-toggle="modal" data-te-target="#assignDriver"
                                        data-te-ripple-init data-te-ripple-color="light"
                                        class="reassign_driver px-3 py-2 rounded-md bg-gray-200 text-xs font-light tracking-wide">Reassign</button>

                                </div>
                            </div>
                            <hr class="w-full border border-gray-300/50">
                            <div class="flex justify-start flex-row items-start">
                                <!-- start poiint and end --->
                                <div class="px-4">
                                    <div class="flex flex-col justify-start items-start text-left">
                                        <div class="p-[2px]"><img src="<?= IMAGES ?>satrt_point.png"
                                                class="inline-block w-3 h-3" alt="">
                                            <p class="inline-block text-xs font-bold px-[5px]">Victor Maamaa</p>
                                        </div>
                                        <div class="pb-5 px-4 ml-2 border-l border-gray-400/50">
                                            <p class="text-xs font-light font-sans text-gray-600/70">No 30 oro
                                                aka street rumuagholu</p>
                                        </div>

                                        <div class="p-[2px]"><img src="<?= IMAGES ?>location.png"
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

                        <div class="border border-gray-300/50  rounded-md">
                            <div class="flex flex-row justify-between items-start p-4">
                                <div class="space-x-4">
                                    <span
                                        class="bg-primary-100 px-3 py-1 rounded-full bg-blue-400/50 text-xs text-blue-600/75 font-light">Picked
                                        up</span>
                                    <span class="underline text-xs font-light cursor-pointer" data-te-dropdown-item-ref
                                        data-te-toggle="modal" data-te-target="#order" data-te-ripple-init
                                        data-te-ripple-color="light">Order 2</span>
                                </div>
                                <div class="space-x-4">
                                    <span class="text-xs font-semibold"><img src="<?= IMAGES ?>naira.png"
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
                                        <div class="p-[2px]"><img src="<?= IMAGES ?>satrt_point.png"
                                                class="inline-block w-3 h-3" alt="">
                                            <p class="inline-block text-xs font-bold px-[5px]">Victor Maamaa</p>
                                        </div>
                                        <div class="pb-5 px-4 ml-2 border-l border-gray-400/50">
                                            <p class="text-xs font-light font-sans text-gray-600/70">No 30 oro
                                                aka street rumuagholu</p>
                                        </div>

                                        <div class="p-[2px]"><img src="<?= IMAGES ?>location.png"
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

                        <div class="border border-gray-300/50  rounded-md">
                            <div class="flex flex-row justify-between items-start p-4">
                                <div class="space-x-4">
                                    <span
                                        class="bg-primary-100 px-3 py-1 rounded-full bg-[#5856CE]/30 text-xs text-[#5856CE] font-light">On
                                        the way</span>
                                    <span class="underline text-xs font-light cursor-pointer" data-te-dropdown-item-ref
                                        data-te-toggle="modal" data-te-target="#order" data-te-ripple-init
                                        data-te-ripple-color="light">Order 3</span>
                                </div>
                                <div class="space-x-4">
                                    <span class="text-xs font-semibold"><img src="<?= IMAGES ?>naira.png"
                                            class="w-3 h-3 -mt-1 inline-block" alt="">50</span>
                                    <button type="button" data-te-toggle="modal" data-te-target="#assignDriver"
                                        data-te-ripple-init data-te-ripple-color="light"
                                        class="reassign_driver px-3 py-2 rounded-md bg-gray-200 text-xs font-light tracking-wide">Reassign</button>

                                </div>
                            </div>
                            <hr class="w-full border border-gray-300/50">
                            <div class="flex justify-start flex-row items-start">
                                <!-- start poiint and end --->
                                <div class="px-4">
                                    <div class="flex flex-col justify-start items-start text-left">
                                        <div class="p-[2px]"><img src="<?= IMAGES ?>satrt_point.png"
                                                class="inline-block w-3 h-3" alt="">
                                            <p class="inline-block text-xs font-bold px-[5px]">Victor Maamaa</p>
                                        </div>
                                        <div class="pb-5 px-4 ml-2 border-l border-gray-400/50">
                                            <p class="text-xs font-light font-sans text-gray-600/70">No 30 oro
                                                aka street rumuagholu</p>
                                        </div>

                                        <div class="p-[2px]"><img src="<?= IMAGES ?>location.png"
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
                    </div>
                </div>

            </div>

            <!--- New orders -->
            <div class="space-y-2 px-4 py-2 bg-white w-[50%] h-screen mt-[2px] border-t border-r border-gray-300/50">
                <div class="border border-gray-300/50  rounded-md">
                    <div class="flex flex-row justify-between items-start p-4">
                        <div class="space-x-4">
                            <span
                                class="bg-primary-100 px-3 py-1 rounded-full bg-blue-400/50 text-xs text-blue-600/75 font-light">Started</span>
                            <span class="underline text-xs font-light">Order 1</span>
                        </div>
                        <div class="space-x-4">
                            <span class="text-xs font-semibold"><img src="<?= IMAGES ?>naira.png"
                                    class="w-3 h-3 -mt-1 inline-block" alt="">50</span>
                            <button type="button" data-te-toggle="modal" data-te-target="#assignDriver"
                                data-te-ripple-init data-te-ripple-color="light"
                                class="px-3 py-2 rounded-md bg-gray-200 text-xs font-light tracking-wide">Assign</button>

                        </div>
                    </div>
                    <hr class="w-full border border-gray-300/50">
                    <div class="flex justify-start flex-row items-start">

                        <div class="px-4">
                            <div class="flex flex-col justify-start items-start text-left">
                                <div class="p-[2px]"><img src="<?= IMAGES ?>satrt_point.png"
                                        class="inline-block w-3 h-3" alt="">
                                    <p class="inline-block text-xs font-bold px-[5px]">Victor Maamaa</p>
                                </div>
                                <div class="pb-5 px-4 ml-2 border-l border-gray-400/50">
                                    <p class="text-xs font-light font-sans text-gray-600/70">No 30 oro
                                        aka street rumuagholu</p>
                                </div>

                                <div class="p-[2px]"><img src="<?= IMAGES ?>location.png" class="inline-block w-3 h-4"
                                        alt="">
                                    <p class="inline-block text-xs font-bold px-[5px]">Chioma Desire</p>
                                </div>
                                <div class="pb-5 px-4 ml-2">
                                    <p class="text-xs font-light font-sans text-gray-600/70">Behind
                                        redeemed church rumuokro port harcourt.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!--- Create Orders --->
                <div class="flex flex-col justify-center items-center space-y-4 mt-[50%]">
                    <img src="<?= IMAGES ?>empty_box.png" alt="">
                    <h3 class="font-bold text-center font-sans">No available orders</h3>
                    <p class="font-light text-sm">There are no orders yet to dispatch</p>
                    <button class="px-10 py-2 rounded-full text-white font-bold text-sm bg-yellow-500" type="button"
                        href="#" data-te-dropdown-item-ref data-te-toggle="modal" data-te-target="#createPackage">Create
                        Order</button>
                </div>

            </div>

        </div>
    </div>

</section>

<!---- My modals -->
<section>
    <!-- Modal -->
    <div data-te-modal-init
        class="fixed left-0 top-0 z-[2000] border-0 hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
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
                        class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
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
                        <div
                            class="flex flex-row items-start px-5 border-2 border-gray-900/10 rounded-lg w-full md:w-1/2">
                            <div class="w-1/2 space-y-2 px-4 my-10 border-r-2 border-gray-900/10">
                                <h3 class="font-sans text-xl font-semibold leading-normal">Package Details</h3>
                                <div class="space-y-2">
                                    <h3>Name of package</h3>
                                    <input type="text"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Enter name">
                                </div>
                                <div class="space-y-2 ">
                                    <h3 class="mt-3">Items(s)</h3>
                                    <input type="text"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Item name">
                                    <input type="text"
                                        class="w-16 p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Qty">
                                    <button type="button"
                                        class="inline-block w-28 p-1 text-gray-900/50 font-sans text-center leading-normal border-2 border-gray-900/10 rounded-lg"><img
                                            src="images/add_gray.png" class="-mt-1 mr-1 inline-block" alt="">
                                        Add Item
                                    </button>
                                </div>

                                <div class="space-y-2 mt-2">
                                    <h3 class="mt-3">Package Dimention</h3>
                                    <input type="text"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Item name">
                                    <input type="text"
                                        class="w-10 p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="L">
                                    <img src="images/times.png" class="inline-block -mt-10 mx-1" alt="">
                                    <input type="text"
                                        class="w-10 p-1 border-2 inline-block border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="B">
                                    <img src="images/times.png" class="inline-block -mt-2 mx-1" alt="">
                                    <input type="text"
                                        class="w-10 p-1 inline-block border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="H">
                                </div>


                                <div class="space-y-2 mt-3">
                                    <h3 class="mt-3">Describe Package</h3>
                                    <textarea name=""
                                        class="w-full h-20 p-1 border-2 border-gray-900/10 resize-none rounded-lg placeholder:p-1"
                                        id="" cols="30" rows="10" placeholder="Enter description of package">
                                            </textarea>

                                </div>
                            </div>
                            <div class="w-1/2 px-4 my-10 space-y-2">
                                <h3 class="font-sans text-xl font-semibold leading-normal">Sender
                                    Information</h3>
                                <div class="space-y-2">
                                    <h3>Full name of sender</h3>
                                    <input type="text"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Enter name">
                                </div>
                                <div class="space-y-2">
                                    <h3 class="mt-3">Pickup address</h3>
                                    <input type="text"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Enter contact address">
                                </div>
                                <div class="space-y-2">
                                    <h3 class="mt-3">Full name of sender</h3>
                                    <input type="text"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Enter name">
                                </div>

                                <div class="space-y-2" data-te-datepicker-init data-te-input-wrapper-init>
                                    <h3 class="mt-3">Pickup date</h3>
                                    <input type="text"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Select a date" data-te-datepicker-toggle-ref
                                        data-te-datepicker-toggle-button-ref />
                                </div>

                                <div class="space-y-2">
                                    <h3 class="mt-3">Phone contact</h3>
                                    <input type="number"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Enter phone number">
                                </div>

                                <div class="space-y-2">
                                    <h3 class="mt-3">Whatsapp contact</h3>
                                    <input type="number"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Enter Whatsapp number">
                                </div>

                                <div class="space-y-2">
                                    <h3 class="mt-3">Enter Email address</h3>
                                    <input type="email"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Enter email address">
                                </div>

                            </div>
                        </div>
                        <div
                            class="flex flex-row items-start px-5 border-2 border-gray-900/10 rounded-lg w-full md:w-1/2">
                            <div class="w-1/2 px-4 my-10 space-y-2">

                                <h3 class="font-sans text-xl font-semibold leading-normal">Recipent Information
                                </h3>
                                <div class="space-y-2">
                                    <h3>Full name of receiver</h3>
                                    <input type="text"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Enter name">
                                </div>
                                <div class="space-y-2">
                                    <h3 class="mt-3">Recipent number</h3>
                                    <input type="number"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Enter number">
                                </div>
                                <div class="space-y-2">
                                    <h3 class="mt-3">Recipent email</h3>
                                    <input type="email"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Enter number">
                                </div>

                                <div class="space-y-2">
                                    <h3 class="mt-3">Recipent address</h3>
                                    </h3>
                                    <input type="number"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Enter location of delivery">
                                </div>

                                <div class="space-y-2" data-te-datepicker-init data-te-input-wrapper-init>
                                    <h3 class="mt-3">Delivery date</h3>
                                    <input type="text"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Set delivery date" data-te-datepicker-toggle-ref
                                        data-te-datepicker-toggle-button-ref />
                                </div>

                                <div class="space-y-2" data-te-with-icon="false" data-te-timepicker-init
                                    data-te-input-wrapper-init id="timepicker-just-input">
                                    <h3 class="mt-3">Delivery Time</h3>
                                    <input type="text"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Select Time" data-te-toggle="timepicker-just-input" id="form15">
                                </div>

                                <div class="space-y-2">
                                    <h3 class="mt-3">Enter Email address</h3>
                                    <input type="email"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Enter email address">
                                </div>
                            </div>
                            <div class="w-1/2 space-y-2 px-4 my-10 border-l-2 border-gray-900/10">
                                <h3 class="font-sans text-xl font-semibold leading-normal">Billing Details
                                </h3>
                                <div class="space-y-2">
                                    <h3>Billing Address</h3>
                                    <input type="text"
                                        class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        placeholder="Enter billing address">
                                </div>
                                <div class="flex-auto space-y-2" data-te-modal-body-ref>
                                    <h3 class="mt-3">Select Delivery service provider</h3>
                                    <select class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        data-te-select-init data-te-select-filter="true">
                                        <option class="text-gray-800/10">Express delivery company</option>
                                        <option value="1">Express delivery company</option>
                                        <option value="2">Express delivery company</option>
                                        <option value="3">Express delivery company</option>
                                        <option value="4">Express delivery company</option>
                                        <option value="4">Express delivery company</option>
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <h3 class="mt-3">Payment Method</h3>
                                    <select class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1"
                                        data-te-select-init>
                                        <option class="text-gray-800/10">Cash</option>
                                        <option value="1">Paystack</option>
                                    </select>
                                </div>
                                <div class="space-y-2 mt-3">
                                    <h3 class="mt-3">Relevant Information</h3>
                                    <textarea name=""
                                        class="w-full h-20 p-1 border-2 border-gray-900/10 resize-none rounded-lg placeholder:p-1"
                                        id="" cols="30" rows="10" placeholder="Enter relevant Information">
                                            </textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div
                    class="mt-auto flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50 min-[0px]:rounded-none">
                    <button type="button"
                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-yellow-400/50 focus:bg-yellow-400/50 focus:outline-none focus:ring-0 border border-yellowColor text-yellowColor hover:ease-in"
                        data-te-modal-dismiss>
                        Close
                    </button>
                    <button type="button"
                        class="ml-1 inline-block rounded bg-yellow-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-yellow-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                        data-te-ripple-init data-te-ripple-color="light">
                        Send request
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--- Select driver modal -->
    <div data-te-modal-init
        class="fixed left-0 top-[25%] z-[1050] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="assignDriver" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div
                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-zinc-600">
                <div
                    class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                    <div
                        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4">
                        <h5 class="text-xl font-medium leading-normal text-neutral-800" id="exampleModalLabel">
                            Assign a driver
                        </h5>
                        <button type="button"
                            class="-my-2 border-2 border-gray-900/10 rounded-md -mr-2 ml-auto box-content h-4 w-4 p-2 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-modal-dismiss aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor">
                                <path
                                    d="M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex-auto p-4" data-te-modal-body-ref>
                        <select class="w-full p-2 rounded-md" data-te-select-init data-te-container="#assignDriver"
                            data-te-select-filter="true">
                            <option>----select driver-----</option>
                            <option value="1">James Bond</option>
                            <option value="2">Chibundu John</option>
                            <option value="3">Nice Kunle</option>
                            <option value="4">Affam Anthony</option>
                            <option value="4">Affam Anthony</option>
                        </select>
                    </div>
                    <div
                        class="flex flex-shrink-0 flex-wrap items-center justify-end border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <button type="button"
                            class="inline-block rounded bg-yellow-500 text-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                            data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                            Close
                        </button>
                        <button type="button"
                            class="ml-1 inline-block rounded bg-blue-900/80 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                            data-te-ripple-init data-te-ripple-color="light">
                            Assign
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Show order modal --->
    <div data-te-modal-init
        class="fixed left-0 top-0 z-[2000] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="order" tabindex="-1" aria-labelledby="orderTitle" aria-modal="true" role="dialog">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-full translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[650px] mb-5 mt-5">
            <div
                class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md p-4 px-8 dark:border-opacity-50">
                    <!--Modal title-->
                    <div>
                        <h5 class="text-2xl font-sans font-bold leading-normal text-neutral-800" id="orderLabel">
                            Order 1
                        </h5>
                        <h3 class="font-semibold font-sans leading-normal text-neutral-800">Status:
                            <span>unassigned</span>
                        </h3>
                    </div>

                    <!--Close button-->
                    <div class="flex justify-between items-center space-x-2">
                        <div class="relative">
                            <button class="" type="button" id="dropdownMenuButton3" data-te-dropdown-toggle-ref
                                aria-expanded="false" data-te-ripple-init data-te-ripple-color="light">
                                <img src="<?=IMAGES?>dropdown.png" alt="">
                            </button>
                            <ul class="absolute z-[1000] float-left -ml-6 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg [&[data-te-dropdown-show]]:block"
                                aria-labelledby="dropdownMenuButton3" data-te-dropdown-menu-ref>
                                <li>
                                    <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400"
                                        href="#" data-te-dropdown-item-ref> <img src="images/mark.png"
                                            class="inline-block mr-1 w-4 h-4" alt="" srcset=""> Mark as
                                        delivered</a>
                                </li>
                                <li>
                                    <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400"
                                        href="#" data-te-dropdown-item-ref>
                                        Mark as failed</a>
                                </li>
                                <li>
                                    <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-red-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400"
                                        href="#" data-te-dropdown-item-ref> <img src="images/delete_red.png"
                                            class="inline-block mr-2" alt="" srcset="">
                                        Delete</a>
                                </li>
                            </ul>
                        </div>
                        <button type="button"
                            class="box-content border-2 border-gray-900/10 rounded-md hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-modal-dismiss aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!--Modal body-->
                <div class="p-4 mx-8 my-3 rounded-md border-2 border-gray-800/10">
                    <div class="pickup flex justify-between p-2 space-x-10">
                        <div
                            class="pickup_from flex flex-col items-start space-y-1 justify-center border-r-2 border-gray-800/10 w-1/2">
                            <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                Pickup From
                            </h3>
                            <p class="pickup_location text-[15px] font-sans text-black/90 leading-normal">Ikot
                                Akpan
                                Abia, Uyo, AKS</p>
                            <p class="sender text-[15px] font-sans text-black/90 leading-normal">Mrs Rebecca</p>
                            <p class="sender_phn text-[15px] font-sans text-black/90 leading-normal">
                                +2349388373383</p>
                            <p class="sender_email text-[15px] font-sans text-black/90 leading-normal">
                                richy@gmal.com</p>
                        </div>
                        <div class="deliver_to flex flex-col items-start space-y-1 w-1/2 justify-center">
                            <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                Deliver To</h3>
                            <p class="pickup_location text-[15px] font-sans text-black/90 leading-normal">
                                Akpan Essien, Uyo, AKS</p>
                            <p class="sender text-[15px] font-sans text-black/90 leading-normal">Chioma Favour
                            </p>
                            <p class="sender_phn text-[15px] font-sans text-black/90 leading-normal">
                                +2349388373383</p>
                            <p class="sender_email text-[15px] font-sans text-black/90 leading-normal">
                                richy@gmal.com</p>
                        </div>

                    </div>
                </div>

                <div class="p-4 mx-8 my-3 rounded-md border-2 border-gray-800/10">
                    <div class="pickup flex justify-between p-2 space-x-10">
                        <div
                            class="pickup_from flex flex-col items-start space-y-1 justify-center border-r-2 border-gray-800/10 w-1/2">
                            <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                Delivery Details
                            </h3>
                            <p class="pickup_location text-[15px] font-sans text-black/90 leading-normal">Ikot
                                1 Carton of indomie</p>
                            <p class="sender text-[15px] font-sans text-black/90 leading-normal">2 Pairs of
                                black shoes</p>
                        </div>
                        <div class="deliver_to flex flex-col items-start space-y-1 w-1/2 justify-center">
                            <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                Earning</h3>
                            <p class="pickup_location text-[15px] font-sans text-black/90 leading-normal">
                                Delivery fee <img src="<?=IMAGES?>naira.png" class="w-3 h-3 inline-block -mt-1 mx-1"
                                    alt="">200
                            </p><br>
                            <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                Distance
                            </h3>
                            <p class="sender text-[15px] font-sans text-black/90 leading-normal">50km
                            </p>
                        </div>

                    </div>
                </div>

                <div class="p-4 mx-8 my-3 rounded-md border-2 border-gray-800/10">
                    <div class="pickup flex justify-between p-2 space-x-10">
                        <div
                            class="pickup_from flex flex-col items-start space-y-1 justify-center border-r-2 border-gray-800/10 w-1/2">
                            <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                Pickup date</h3>
                            <p class="pickup_location text-[15px] font-sans text-black/90 leading-normal">
                                May 17 </p><br>
                            <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                Pickup time
                            </h3>
                            <p class="sender text-[15px] font-sans text-black/90 leading-normal">3:00pm
                            </p>
                        </div>
                        <div class="deliver_to flex flex-col items-start space-y-1 w-1/2 justify-center">
                            <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                Deliver date</h3>
                            <p class="pickup_location text-[15px] font-sans text-black/90 leading-normal">
                                May 17</p>
                            <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                Delivery Time</h3>
                            <p class="pickup_location text-[15px] font-sans text-black/90 leading-normal">
                                4:00pm </p><br>
                        </div>

                    </div>
                </div>

                <div class="p-4 mx-8 my-3 rounded-md border-2 border-gray-800/10">
                    <div class="pickup flex justify-between p-2 space-x-10">
                        <div
                            class="pickup_from flex flex-col items-start space-y-1 justify-center border-r-2 border-gray-800/10 w-1/2">
                            <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                Driver</h3>
                            <p class="pickup_location text-[15px] font-sans text-black/90 leading-normal">
                                Samuel </p>
                        </div>
                        <div class="deliver_to flex flex-col items-start space-y-1 w-1/2 justify-center">
                            <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                Placement date</h3>
                            <p class="pickup_location text-[15px] font-sans text-black/90 leading-normal">
                                May 16, 2023 | 3:59pm</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 mx-8 my-3 rounded-md border-2 border-gray-800/10">
                    <div class="pickup flex justify-between p-2 space-x-10">
                        <div class="pickup_from flex flex-col items-start space-y-1 justify-center w-full">
                            <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                Payment Details</h3>
                            <p class="pickup_location text-[15px] font-sans text-black/90 leading-normal">
                                Payment Method: Cash</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?= $this->view('includes/footer', $data); ?>