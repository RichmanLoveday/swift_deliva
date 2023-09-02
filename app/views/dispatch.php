<?= $this->view('includes/app_header', $data); ?>
<?= $this->view('includes/side_bar', $data); ?>
<section class="py-5 bg-gray-500/5 overflow-y-scroll h-screen fixed top-16 w-full !pl-[260px] text-center" id="content">
    <div class="flex justify-between items-center mx-auto md:flex-row border-b-2 border-b-gray-600/30 px-10">
        <h3 class="font-sans font-semibold leading-8 text-2xl">Orders</h3>
        <div class="flex justify-around items-center space-x-6 p-4">
            <div class="flex justify-center items-center">
                <img class="border h-8 border-gray-500/50 py-[8px] pl-[8px] rounded-l-md border-r-0" src="<?= IMAGES ?>search.png" alt="">
                <input class="h-8 focus:outline-none  focus:border-gray-500/50 focus:ring-0 border-0 border-y border-r border-r-gray-500/50 border-y-gray-500/50 rounded-r-md bg-gray-500/0" id="search" type="text" placeholder="Search order">
            </div>
            <a href="#" class="border border-yellowColor px-8 py-1 text-center w-full rounded-md bg-yellowColor text-white transition duration-150 hover:ease-in">Search</a>
        </div>
    </div>

    <div class="w-full mx-auto px-5 mt-8 border-b border-b-gray-300 ">
        <div id="drivers_tabs" class="flex justify-between flex-row items-center">
            <div id="order-tab" class="flex flex-row justify-center space-x-10 items-center w-full">
                <div class="flex justify-between items-center active__nav tab" data-tab="tab 1">
                    <h3 data-userID="<?= $userID ?>" data-url="<?= ROOT ?>dispatch" data-companyID="<?= $companyID ?>" class="px-3 font-sans text-[15px] cursor-pointer font-semibold leading-10 tab_head">
                        Current
                        Orders
                    </h3>
                    <span class="flex items-center justify-center rounded-full h-5 w-5 text-xs px-2 py-1 text-white bg-yellowColor transition ease-linear duration-300">1</span>
                </div>
                <div class="flex justify-between items-center tab" data-tab="tab 2">
                    <h3 data-userID="<?= $userID ?>" data-url="<?= ROOT ?>dispatch/waiting_orders" data-companyID="<?= $companyID ?>" class="px-3 font-sans text-[15px] cursor-pointer font-semibold leading-10 tab_head">
                        Waiting Orders
                    </h3>
                    <span class="hidden items-center justify-center rounded-full h-5 w-5 text-xs px-2 py-1 text-white bg-yellowColor transition ease-linear duration-300">1</span>
                </div>
                <div class="flex justify-between items-center tab" data-tab="tab 3">
                    <h3 data-userID="<?= $userID ?>" data-url="<?= ROOT ?>dispatch/completed_orders" data-companyID="<?= $companyID ?>" class="px-3 font-sans text-[15px] cursor-pointer font-semibold leading-10 tab_head">
                        Completed
                        Orders
                    </h3>
                    <span class="hidden items-center justify-center rounded-full h-5 w-5 text-xs px-2 py-1 text-white bg-yellowColor transition ease-linear duration-300">1</span>
                </div>
            </div>
        </div>
    </div>

    <div class="-mt-5 px-2 w-full overflow-visible">
        <div id="driverOrdersList" class="flex flex-row flex-wrap justify-around mb-11 p-5 items-start w-full">
            <?php if (count($orders) > 0) : $inc = 0; ?>
                <?php foreach ($orders as $order) : $inc++;
                    // work on status progresses
                    $btnCol = '';
                    $btnText = '';
                    $statusCol = '';
                    $statusText = '';
                    $display = '';
                    $url = '';

                    $driverCollectMoney = '';

                    if ($order->orderStatus == 'picked up') {
                        $btnCol = 'bg-yellow-500';
                        $btnText = 'Mark as picked up';
                        $statusText = 'Started';
                        $statusCol = 'bg-yellow-500 text-white';
                    }

                    if ($order->orderStatus == 'on the way') {
                        $btnCol = 'bg-[#6ce052]';
                        $btnText = 'Mark as on the way';
                        $statusText = 'Picked up';
                        $statusCol = 'bg-blue-400/50 text-blue-600/75';
                    }

                    if ($order->orderStatus == 'done') {
                        $btnCol = 'bg-[#66BD50]';
                        $btnText = 'Mark as done';
                        $statusText = 'on the way';
                        $statusCol = 'bg-[#5856CE]/30 text-[#5856CE]';
                    }

                    if ($order->orderStatus != 'picked up') {
                        $display = 'inline-block';
                    } else {
                        $display = 'hidden';
                    }

                    if ($order->paymentMethod != 'Cash') {
                        $driverCollectMoney = 'data-te-toggle="modal" data-te-target="#staticBackdrop" data-te-ripple-init data-te-ripple-color="light" cashondelivery';
                        $url = ROOT . 'dispatch/product_amount';
                    } else {
                        $url = ROOT . 'dispatch/update_status';
                    }

                ?>
                    <div class="overflow-x-visible w-[30%] mt-5 rounded-md shadow-md bg-white px-4">
                        <div class="flex justify-between px-5 pb-2 pt-5 items-center border-b border-gray-300/50 mb-3">
                            <h3 class="text-left">Order <?= $inc ?></h3>
                            <span class="float-right"><img src="<?= IMAGES ?>naira.png" class="w-3 h-3 inline-block -mt-1" alt=""><?= $order->amount ?></span>
                        </div>
                        <!-- start poiint and end --->
                        <div class="flex flex-col justify-start items-start text-left">
                            <span class="bg-primary-100 self-end px-3 py-1 rounded-full <?= $statusCol ?> text-xs font-" status"> <?= $statusText ?></span>
                            <div class="p-[2px]"><img src="<?= IMAGES ?>satrt_point.png" class="inline-block w-3 h-3" alt="">
                                <p class="inline-block text-xs font-bold px-[5px]"><?= $order->fullName ?></p>
                            </div>
                            <div class="pb-5 px-4 ml-2 border-l border-gray-400/50">
                                <p class="text-xs font-" font-sans textay-600/70"><?= $order->address ?></p>
                            </div>

                            <div class="p-[2px]"><img src="<?= IMAGES ?>location.png" class="inline-block w-3 h-4" alt="">
                                <p class="inline-block text-xs font-bold px-[5px]"><?= $order->receiverName ?></p>
                            </div>
                            <div class="pb-5 px-4 ml-2">
                                <p class="text-xs font-" font-sans textay-600/70"><?= $order->receiverAddress ?></p>
                            </div>
                            <button type="button" data-orderID="<?= $order->orderID ?>" data-url="<?= ROOT ?>dispatch/view_order" data-userid="<?= $userID ?>" onclick="view_order(this)" class="mx-auto -mt-2 mb-2 p-2 text-sm font-sans font-normal text-yellowColor leading-6" data-te-dropdown-item-ref data-te-toggle="modal" data-te-target="#driverOrders" data-te-ripple-init data-te-ripple-color=""">View
             more <img src=" <?= IMAGES ?>yellow_arrow_down.png" alt="" class="inline-block ml-2"> </button>
                            <div class="w-full flex flex-row justify-around items-center">

                                <img src="<?= IMAGES ?>change_status.png" class="w-7 h-7 hover:scale-105 transition-transform ease-linear -mt-4 status_btn <?= $display ?>" alt="">
                                <button type="button" <?= $driverCollectMoney ?> data-userid="<?= $userID ?>" data-packageID="<?= $order->packageID ?>" data-orderID="<?= $order->orderID ?>" data-url="<?= $url ?>" data-status="<?= $order->orderStatus ?>" class="w-10/12 mx-auto px-2 py-1 rounded-full <?= $btnCol ?> text-white text-center mb-4 shadow-md hover:scale-105 transition-transform ease-linear outline-none driver_order_status">
                                    <img src="<?= IMAGES ?>arrow_mark.png" class="inline-block h-3 mr-1 -mt-1" alt="">
                                    <?= $btnText ?>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div>
                    <img class="mt-16 mx-auto" src="<?= IMAGES ?>truck_parcel.png" alt="">
                    <h3 class=" mb-20 font-sans">No dispatch found</h3>
                </div>
            <?php endif; ?>
        </div>
        <img class="w-12 h-12 mb-10 mt-16 mx-auto hidden" src="<?= IMAGES ?>circle_spinner.gif" alt="">
    </div>
</section>

<!---- My modals -->
<section>
    <!-- Driver Payment modal  -->
    <div data-te-modal-init class="fixed left-0 top-[30%] z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="staticBackdrop" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div class="flex flex-shrink-0 items-center justify-end rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!--Close button-->
                    <button type="button" class="box-content close_btn rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!--Modal body-->
                <div data-te-modal-body-ref class="relative p-4 flex justify-center flex-col text-center space-y-2">
                    <div class="flex justify-center">
                        <img src="<?= IMAGES ?>naira.png" class="h-8 w-8 mr-1 mt-1" alt="">
                        <h3 class="text-3xl font-sans font-bold requiredAmount"></h3>
                    </div>
                    <p class="font-sans text-gray-800/50">Collect the amount stated from the customer.</p>
                </div>

                <!--Modal footer-->
                <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <button type="button" class="inline-block rounded bg-blue-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color=""">
             Close
                    </button>
                    <button id=" driverPay" type=" button" data-url="<?= ROOT ?>dispatch/update_status" onclick="update_status(this)" class="ml-1 inline-block rounded bg-blue-700 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] driverPay" data-te-ripple-init data-te-ripple-color="">
                        Accept
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?= $this->view('includes/modals/dispatchItemsModal', $data); ?>
</section>
<?= $this->view('includes/modals', $data) ?>