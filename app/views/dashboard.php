<?= $this->view('includes/app_header', $data); ?>
<?= $this->view('includes/side_bar', $data); ?>

<section class="p-5 bg-gray-500/5 overflow-y-scroll h-screen fixed top-16 w-full !pl-[260px] text-center" id="content">
    <!---- Dashboard COnatiner-->
    <div class="mx-auto rounded-md mb-10">
        <div id="status" class="flex justify-start flex-row items-center space-x-3">
            <h1 class="text-left font-sans text-sm text-black/60 leading-10 font-bold">Hey <?=$userName?>,
                Welcome back
                <img src="<?= IMAGES ?>wave_hand.png" class="inline-block -mt-2 p-2" alt="">
            </h1>
            <?php if($role == DRIVER): ?>
            <?php 
            $offlne = '';
            $online = '';
            if($status == ONDUTY) {
                $offlne = "opacity-100";
                $online = 'hidden opacity-0';
            } 
            
            if($status == OFFLINE) {
                $online = 'opacity-100';
                $offlne = 'hidden opacity-0';
            }
            ?>
            <span onclick="update_status(this, '<?=ROOT?>dashboard/change_status', '<?=$userID?>')"
                class="cursor-pointer online px-5 py-1 rounded-full bg-[#66BD50] text-white font-sans font-semibold  transition ease-linear <?=$online?>">Go
                online
            </span>

            <span onclick="update_status(this, '<?=ROOT?>dashboard/change_status', '<?=$userID?>')"
                class="cursor-pointer offline px-5 py-1 rounded-full bg-red-800 text-white font-sans font-semibold  transition ease-linear <?=$offlne?>">Go
                offline
            </span>
            <?php endif; ?>
        </div>
        <div class="w-[85%] mx-auto flex flex-wrap flex-col md:flex-row justify-center items-center my-5">
            <!--- Total-->
            <?php if($role == SUPER_ADMIN): ?>
            <div
                class="border-l-4 rounded-md shadow-md bg-white border-yellowColor  space-y-5 px-4 py-4 text-left w-[20%] mx-4 my-2">
                <p class="font-sans font-semibold leading-tight text-xs text-black/50">Total No of companies</p>
                <span class="text-left text-xl font-semibold font-sans text-black/60">10</span>
            </div>
            <?php endif; ?>

            <?php if($role == SUPER_ADMIN || $role == ADMIN || $role == CUSTOMER): ?>
            <div
                class="border-l-4 rounded-md shadow-md bg-white border-yellow-950/70 space-y-5 px-4 py-4 text-left w-[20%] mx-4 my-2">
                <p class="font-sans font-semibold leading-tight text-xs text-black/50">Total Order</p>
                <span class="text-left text-xl font-semibold font-sans text-black/60"><?=$totalOrders?> Orders</span>
            </div>
            <?php endif;?>

            <?php if($role == SUPER_ADMIN || $role == ADMIN || $role == DRIVER): ?>
            <div
                class="border-l-4 rounded-md shadow-md bg-white border-[#1D409C]  space-y-5 px-4 py-4 text-left w-[20%] mx-4 my-2">
                <p class="font-sans font-semibold leading-tight text-xs text-black/50">Total
                    deliveries</p>
                <span class="text-left text-xl font-semibold font-sans text-black/60"><?=$deliverys?> deliveries</span>
            </div>
            <?php endif; ?>


            <?php if($role == SUPER_ADMIN || $role == ADMIN): ?>
            <div
                class="border-l-4 rounded-md shadow-md bg-white border-[#2ECC75]  space-y-5 px-4 py-4 text-left w-[20%] mx-4 my-2">
                <p class="font-sans font-semibold leading-tight text-xs text-black/50">Total drivers</p>
                <span class="text-left text-xl font-semibold font-sans text-black/60"><?=$drivers?> drivers</span>
            </div>
            <?php endif; ?>


            <?php if($role == SUPER_ADMIN || $role == ADMIN): ?>
            <div
                class="border-l-4 rounded-md shadow-md bg-white border-[#EF934D] space-y-2 px-4 py-4 text-left w-[20%] mx-4 my-2">
                <p class="font-sans font-semibold leading-tight text-xs text-black/50">Earning</p>
                <span class="text-left text-xl font-semibold font-sans text-black/60 flex"><img
                        src="<?= IMAGES ?>naira.png" class="w-4 h-4 mt-[7px] mr-1" alt=""><?= $earnings?></span>
            </div>
            <?php endif; ?>
        </div>
        <div class="hidden md:flex justify-around items-center text-sm text-gray-700 font-sans font-semibold -mb-2">
            <h2>Available orders</h2>
        </div>
        <div class="flex items-start md:flex-row flex-col pt-5 w-full">
            <?php if($role == ADMIN || $role == DRIVER): ?>
            <div class="flex flex-col justify-center space-y-1 p-2 w-[20%]">
                <div class="flex flex-row justify-between items-center p-2 rounded-md bg-white shadow-sm">
                    <h5 class="text-xs text-left font-sans text-black/60 font-semibold">Active Orders</h5>
                    <div
                        class="h-5 w-5 flex justify-center mr-2 items-center rounded-full text-white text-xs font-light font-sans bg-yellowColor">
                        <?=$activeOrders?>
                    </div>
                </div>
                <div class="flex flex-row justify-between items-center p-2 rounded-md bg-white shadow-sm">
                    <h5 class="text-xs text-left font-sans text-black/60 font-semibold">Late orders</h5>
                    <div
                        class="h-5 w-5 flex justify-center mr-2 items-center rounded-full text-white text-xs font-light font-sans bg-yellowColor">
                        <?=$lateOrders?>
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
            <?php endif; ?>
            <div class="mt-[2px] w-full border-r border-t border-gray-300/50">
                <div class="flex md:flex-row flex-col items-start justify-between">
                    <?php if($role == ADMIN || $role == SUPER_ADMIN): ?>
                    <div class="w-1/3 flex flex-col available_drivers">
                        <?php
                        $int = 0;
                        foreach($driverPackage as $drive):
                            $borderLeft = '';
                            if($int == 0) {
                                $borderLeft = 'border-l-4 border-yellowColor bg-white';
                            }
                            $int++;
                        ?>
                        <div onclick="getDriverOrders(this, '<?=ROOT?>', '<?=$drive->driverID?>', '<?=$companyID?>')"
                            class="w-full text-gray-700 font-semibold <?=$borderLeft?> rounded-l-sm text-sm text-left pl-4 font-sans py-3  flex justify-between driver transition ease-linear"
                            data-id="1" data-url="url">
                            <h5 class="text-xs"><?=$drive->driverName?></h5>
                            <div
                                class="h-5 w-5 flex justify-center mr-2 p-2 items-center rounded-full text-white text-xs font-light font-sans bg-yellowColor">
                                <?=count($drive->orders)?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <!--- Assigned Orders -->
                    <?php if(!empty($driverPackage)): $num = 0; ?>
                    <div class="w-full space-y-2 px-4 py-2 bg-white assigned_orders h-full">
                        <?php foreach($driverPackage[0]->orders as $order): 
                            $amount = 0;
                            $bgColor = '';
                            $text = '';
                            $num++;
                            if($order->order_status == STARTING) {
                                $bgColor = 'bg-blue-400/50';
                                $text = 'Started';
                            }    

                            if($order->order_status ==  PICKED_UP) {
                                $bgColor = 'bg-blue-400/50';
                                $text = "Picked Up";
                            }

                            if($order->order_status == ONWAY) {
                                $bgColor = 'bg-[#5856CE]/30';
                                $text = 'On the way';
                            }

                            // check amount
                            $items = json_decode($order->packageItems);
                            foreach($items as $item) {
                                $amount = $amount + $item->Price;
                            }
                        ?>
                        <div class="border border-gray-300/50  rounded-md">
                            <div class="flex flex-row justify-between items-start p-4">
                                <div class="space-x-4">
                                    <span
                                        class="bg-primary-100 px-3 py-1 rounded-full <?=$bgColor?> text-xs text-blue-600/75 font-light"><?=$text?></span>
                                    <?php if($role == ADMIN || $role == SUPER_ADMIN): ?>
                                    <span onclick="view_dash_order(this, '<?=ROOT?>', '<?=$order->packageID?>')"
                                        class="underline text-xs font-light cursor-pointer" data-te-dropdown-item-ref
                                        data-te-toggle="modal" data-te-target="#order" data-te-ripple-init
                                        data-te-ripple-color="light">Order <?=$num?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="space-x-4">
                                    <span class="text-xs font-semibold"><img src="<?= IMAGES ?>naira.png"
                                            class="w-3 h-3 -mt-1 inline-block" alt=""><?=number_format($amount)?>
                                    </span>
                                </div>
                            </div>
                            <hr class="w-full border border-gray-300/50">
                            <div class="flex justify-start flex-row items-start">
                                <!-- start poiint and end --->
                                <div class="px-4">
                                    <div class="flex flex-col justify-start items-start text-left">
                                        <div class="p-[2px]"><img src="<?= IMAGES ?>satrt_point.png"
                                                class="inline-block w-3 h-3" alt="">
                                            <p class="inline-block text-xs font-bold px-[5px]"><?=$order->fullName?></p>
                                        </div>
                                        <div class="pb-5 px-4 ml-2 border-l border-gray-400/50">
                                            <p class="text-xs font-bold font-sans text-gray-600/70"><?=$order->address?>
                                            </p>
                                        </div>

                                        <div class="p-[2px]"><img src="<?= IMAGES ?>location.png"
                                                class="inline-block w-3 h-4" alt="">
                                            <p class="inline-block text-xs font-bold px-[5px]"><?=$order->receiverName?>
                                            </p>
                                        </div>
                                        <div class="pb-5 px-4 ml-2">
                                            <p class="text-xs font-bold font-sans text-gray-600/70">
                                                <?=$order->receiverAddress?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php else: ?>
                    <div class="mx-auto mt-20">
                        <img class="mt-16 mx-auto" src="<?= IMAGES ?>truck_parcel.png" alt="">
                        <h3 class=" mb-20 font-sans">No dispatch found</h3>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

</section>

<!---- My modals -->
<section>
    <!-- Show order modal --->
    <div data-te-modal-init
        class="fixed left-0 top-0 z-[1050] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="order" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-full translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[650px] mb-5 mt-5">
            <div
                class="pointer-events-auto relative w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                <div class="flex flex-shrink-0 items-center justify-center rounded-t-md p-4 px-8 loader">
                    <img class="w-6 h-6 mr-2 text-center" src="<?= IMAGES ?>spinner.gif" alt=""> Loading....
                </div>
                <div
                    class="hidden pointer-events-auto relative w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md p-4 px-8">
                        <!--Modal title-->
                        <div>
                            <h5 class="text-2xl font-sans font-bold leading-normal text-neutral-800"
                                id="exampleModalScrollableLabel">
                                Order <span class="order_num"></span>
                            </h5>
                            <h3 class="font-semibold font-sans leading-normal text-neutral-800">Status:
                                <span class="orderStatus">unassigned</span>
                            </h3>
                        </div>

                        <!--Close button-->
                        <div class="flex justify-between items-center space-x-2">
                            <div class="relative">
                                <button class="" type="button" id="dropdownMenuButton3" data-te-dropdown-toggle-ref
                                    aria-expanded="false" data-te-ripple-init data-te-ripple-color="light">
                                    <img src="<?= IMAGES ?>dropdown.png" alt="">
                                </button>
                                <ul class="absolute z-[1000] float-left -ml-6 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg [&[data-te-dropdown-show]]:block"
                                    aria-labelledby="dropdownMenuButton3" data-te-dropdown-menu-ref>
                                    <li class="mark_as_delivered hidden">
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 delivered_btn"
                                            href="#" data-te-dropdown-item-ref> <img src="<?= IMAGES ?>mark.png"
                                                class="inline-block mr-1 w-4 h-4" alt="" srcset=""> Mark as
                                            delivered</a>
                                    </li>
                                    <li class="mark_as_failed hidden">
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 failed_btn"
                                            href="#" data-te-dropdown-item-ref>
                                            Mark as failed</a>
                                    </li>
                                    <li class="delete_package hidden">
                                        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-red-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 delete_order_btn"
                                            href="#" data-te-dropdown-item-ref> <img src="<?= IMAGES ?>delete_red.png"
                                                class="inline-block mr-2" alt="" srcset="">
                                            Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <button type="button"
                                class="box-content border-2 border-gray-900/10 rounded-md hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none close_btn"
                                data-te-modal-dismiss aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
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
                                <p class="delivery_location text-[15px] font-sans text-black/90 leading-normal">
                                    Akpan Essien, Uyo, AKS</p>
                                <p class="receiver text-[15px] font-sans text-black/90 leading-normal">Chioma Favour
                                </p>
                                <p class="receiver_phn text-[15px] font-sans text-black/90 leading-normal">
                                    +2349388373383</p>
                            </div>

                        </div>
                    </div>

                    <div class="p-4 mx-8 my-3 rounded-md border-2 border-gray-800/10">
                        <div class="pickup flex justify-between p-2 space-x-10">
                            <div
                                class="order_details flex flex-col items-start space-y-1 justify-center border-r-2 border-gray-800/10 w-1/2">
                                <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                    Order Details
                                </h3>

                                <div class="order_items w-full"></div>
                            </div>
                            <div class="deliver_to flex flex-col items-start space-y-1 w-1/2 justify-center">
                                <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                    Expect Amount</h3>
                                <div class="w-full flex justify-between">
                                    <p class="text-[15px] font-sans text-black/90 leading-normal">
                                        Delivery fee
                                    </p>
                                    <div class="delivery_fee">
                                    </div>

                                </div>
                                <br>
                            </div>

                        </div>
                    </div>

                    <div class="p-4 mx-8 my-3 rounded-md border-2 border-gray-800/10">
                        <div class="pickup flex justify-between p-2 space-x-10">
                            <div
                                class="pickup_from flex flex-col items-start space-y-1 justify-center border-r-2 border-gray-800/10 w-1/2">
                                <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                    Pickup date</h3>
                                <p class="pickup_date text-[15px] font-sans text-black/90 leading-normal">
                                    May 17 </p><br>
                                <!-- <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                            Pickup time
                         </h3>
                         <p class="sender text-[15px] font-sans text-black/90 leading-normal">3:00pm
                         </p> -->
                            </div>
                            <div class="deliver_to flex flex-col items-start space-y-1 w-1/2 justify-center">
                                <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                    Deliver date</h3>
                                <p class="delivery_date text-[15px] font-sans text-black/90 leading-normal">
                                    May 17</p>
                                <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                    Delivery Time</h3>
                                <p class="delivery_time text-[15px] font-sans text-black/90 leading-normal">
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
                                <p class="driver_name text-[15px] font-sans text-black/90 leading-normal">
                                    Samuel </p>
                            </div>
                            <div class="deliver_to flex flex-col items-start space-y-1 w-1/2 justify-center">
                                <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                    Placement date</h3>
                                <p class="placement_date text-[15px] font-sans text-black/90 leading-normal">
                                    May 16, 2023 | 3:59pm</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 mx-8 my-3 rounded-md border-2 border-gray-800/10">
                        <div class="pickup flex justify-between p-2 space-x-10">
                            <div class="pickup_from flex flex-col items-start space-y-1 justify-center w-full">
                                <h3 class="text-left font-semibold text-xl font-sans text-black/80 leading-normal">
                                    Payment Details</h3>
                                <p class="text-[15px] font-sans text-black/90 leading-normal">
                                    Payment Method: <span class="paymentMethod"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?= $this->view('includes/footer', $data); ?>