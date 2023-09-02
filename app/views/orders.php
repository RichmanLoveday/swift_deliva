<?= $this->view('includes/app_header', $data); ?>
<?= $this->view('includes/side_bar', $data); ?>
<!-- Sidenav -->
<section class="py-5 bg-gray-500/5 overflow-y-scroll h-screen fixed top-16 w-full !pl-[260px] text-center" id="content">
    <div class="flex justify-between items-center mx-auto md:flex-row border-b-2 border-b-gray-600/30 px-10">
        <h3 class="font-sans font-semibold leading-8 text-2xl">Orders</h3>
        <div class="flex justify-around items-center space-x-6 p-4">
            <div class="flex justify-center items-center">
                <img class="border h-8 border-gray-500/50 py-[8px] pl-[8px] rounded-l-md border-r-0"
                    src="<?= IMAGES ?>search.png" alt="">
                <input
                    class="h-8 focus:outline-none  focus:border-gray-500/50 focus:ring-0 border-0 border-y border-r border-r-gray-500/50 border-y-gray-500/50 rounded-r-md bg-gray-500/0"
                    id="search" type="text" placeholder="Search order">
            </div>
            <a href="#"
                class="border border-yellowColor px-8 py-1 text-center w-full rounded-md bg-yellowColor text-white transition duration-150 hover:ease-in">Search</a>
        </div>
    </div>

    <div class="w-full mx-auto px-5 mt-8 border-b-2 border-b-gray-600/30 ">
        <div class="flex justify-between flex-row items-center">
            <div id="order-tab" class="flex justify-start space-x-10 items-center">
                <div class="flex justify-between items-center active__nav tab">
                    <h3 data-type="currentOrders" data-id="<?= $companyID ?>" data-url="<?= ROOT ?>order"
                        class="px-3 font-sans text-[15px] cursor-pointer font-semibold leading-10 tab_head">
                        Current
                        Orders
                    </h3>
                    <span
                        class="flex items-center justify-center rounded-full h-5 w-5 text-xs px-2 py-1 text-white bg-yellowColor transition ease-linear duration-300"><?= count($currentOrders) ?></span>
                </div>
                <div class="flex justify-between items-center tab">
                    <h3 data-type="scheduledOrders" data-id="<?= $companyID ?>"
                        data-url="<?= ROOT ?>order/sheduled_orders"
                        class="px-3 font-sans text-[15px] cursor-pointer font-semibold leading-10 tab_head">
                        Scheduled
                        Orders
                    </h3>
                    <span
                        class="hidden items-center justify-center rounded-full h-5 w-5 text-xs px-2 py-1 text-white bg-yellowColor transition ease-linear duration-300">1</span>
                </div>
                <div class="flex justify-between items-center tab">
                    <h3 data-type="completedOrders" data-id="<?= $companyID ?>"
                        data-url="<?= ROOT ?>order/completed_orders"
                        class="px-3 font-sans text-[15px] cursor-pointer font-semibold leading-10 tab_head">
                        Completed
                        Orders
                    </h3>
                    <span
                        class="hidden items-center justify-center rounded-full h-5 w-5 text-xs px-2 py-1 text-white bg-yellowColor transition ease-linear duration-300">1</span>
                </div>
                <div class="flex justify-between items-center tab">
                    <h3 data-type="incompleteOrders" data-id="<?= $companyID ?>"
                        data-url="<?= ROOT ?>order/incomplete_orders"
                        class="px-3 font-sans text-[15px] cursor-pointer font-semibold leading-10 tab_head">
                        Incomplete
                        Orders
                    </h3>
                    <span
                        class="hidden items-center justify-center rounded-full h-5 w-5 text-xs px-2 py-1 text-white bg-yellowColor transition ease-linear duration-300">1</span>
                </div>
                <div class="flex justify-between items-center tab">
                    <h3 data-type="orderHistory" data-id="<?= $companyID ?>" data-url="<?= ROOT ?>order/order_history"
                        class="px-3 font-sans text-[15px] cursor-pointer font-semibold leading-10 tab_head">
                        Order
                        History
                    </h3>
                    <span
                        class="hidden items-center justify-center rounded-full h-5 w-5 text-xs px-2 py-1 text-white bg-yellowColor transition ease-linear duration-300">1</span>
                </div>
            </div>
            <img id="delete_icon" class="p-[5px] cursor-pointer border border-yellowColor"
                src="<?= IMAGES ?>Delete icon.png" alt="">
        </div>
    </div>

    <div class="mt-5 px-2">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-visible">
                <div class="p-1.5 min-w-full inline-block align-middle mb-16">
                    <div class="border overflow-y-visible">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-500/5">
                                <tr>
                                    <th scope="col" class="py-3 pl-4">
                                        <div class="flex items-center h-5">
                                            <input id="hs-table-checkbox-all" type="checkbox"
                                                class="border-gray-200 check_all rounded text-yellowColor focus:ring-yellowColor">
                                            <label for="hs-table-checkbox-all" class="sr-only">Checkbox</label>
                                        </div>
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Customer Name
                                    </th>
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
                            <tbody id="orders" class="divide-y divide-gray-200 border-0">
                                <?php if ($currentOrders) : $num = 0; ?>
                                <?php foreach ($currentOrders as $order) : $num++; ?>
                                <?php
                                        $reshedule = '';
                                        $root = ROOT;
                                        $orderID = $order->orderID;

                                        if ($order->driverName == 'N/A' && $order->orderStatus == 'Not assigned') :
                                            $reshedule =
                                                '<li>
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600 reshedule_order"
                                            data-url="' . $root . 'order/reshedule" data-id="' . $orderID . '" href="#"
                                            data-te-dropdown-item-ref href="#" data-te-toggle="modal"
                                            data-te-target="#resedule" data-te-ripple-init
                                            data-te-ripple-color="light">
                                            Reschedule Package</a>
                                    </li>';
                                        ?>

                                <?php endif; ?>

                                <?php
                                        $assignDriver = '';
                                        if ($order->driverName == 'N/A') :
                                            $assignDriver =
                                                '<li>
                                            <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600 assign_driver"
                                                data-url="' . $root . 'order/assign_driver" data-id="' . $orderID . '" href="#" data-te-toggle="modal"
                                                data-te-target="#assignDriver" data-te-ripple-init
                                                data-te-ripple-color="light">Assign Package
                                                to
                                                driver</a>
                                        </li>';
                                        ?>

                                <?php endif; ?>

                                <?php
                                        $reAssignDriver = '';
                                        if ($order->driverName != 'N/A') :
                                            $reAssignDriver =
                                                '<li>
                                            <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600 re_assign_driver"
                                                data-url="' . $root . 'order/reassign_driver" data-id="' . $orderID . '" href="#" data-te-toggle="modal"
                                                data-te-target="#assignDriver" data-te-ripple-init
                                                data-te-ripple-color="light">RE-Assign Package
                                                to
                                                driver</a>
                                        </li>';
                                        ?>

                                <?php endif; ?>
                                <tr class="order_row">
                                    <td class="py-3 pl-4">
                                        <div class="flex items-center h-5">
                                            <input id="hs-table-checkbox-1" type="checkbox"
                                                class="border-gray-200 rounded check text-blue-600 focus:ring-blue-500  ">
                                            <label for="hs-table-checkbox-1" class="sr-only">Checkbox</label>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        <?= $order->fullName ?></td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        <?= $order->address ?></td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        <?= $order->pickUpDate ?></td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        <?= $order->receiverAddress ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        <?= $order->deliveryDate ?></td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        <span
                                            class="inline-block whitespace-nowrap rounded-[0.27rem] bg-<?= $order->statusCol ?>-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-<?= $order->statusCol ?>-700">
                                            <?= $order->orderStatus ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="relative" data-te-dropdown-ref>
                                            <button class="" type="button" id="dropdownMenuButton1"
                                                data-te-dropdown-toggle-ref aria-expanded="false" data-te-ripple-init
                                                data-te-ripple-color="light">
                                                <img src="<?= IMAGES ?>dropdown.png" alt="">
                                            </button>
                                            <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                                                aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                                                <li>
                                                    <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600 view_details"
                                                        data-url="<?= ROOT ?>order/order_details"
                                                        data-orderNum="<?= $num ?>"
                                                        data-packageID="<?= $order->packageID ?>" href="#"
                                                        data-te-dropdown-item-ref data-te-toggle="modal"
                                                        data-te-target="#viewPackage" data-te-ripple-init
                                                        data-te-ripple-color="light">View details</a>
                                                </li>
                                                <?= $assignDriver; ?>
                                                <?= $reAssignDriver; ?>
                                                <?= $reshedule; ?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!---- My modals ---->
<section>
    <?= $this->view('includes/modals/packageViewModal', $data); ?>
    <?= $this->view('includes/modals/resheduleDateModal', $data); ?>
    <?= $this->view('includes/modals/selectDriverModal', $data); ?>
</section>
<?= $this->view('includes/footer', $data); ?>