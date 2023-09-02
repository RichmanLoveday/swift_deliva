<!--- driver dispatch items modal --->
<div data-te-modal-init
    class="fixed left-0 top-0 z-[1050] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="driverOrders" tabindex="-1" aria-labelledby="driverOrdersTitle" aria-modal="true" role="dialog">

    <div data-te-modal-dialog-ref
        class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-full translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[650px] mb-5 mt-5">
        <div
            class="loader pointer-events-auto relative rounded-md border-none bg-white w-full flex flex-row  bg-clip-padding text-current shadow-lg outline-none justify-center p-5">
            <img class="w-6 h-6 mr-2 text-center" src="<?= IMAGES ?>spinner.gif" alt=""> Loading....
        </div>
        <div
            class="hidden pointer-events-auto relative w-full flex-col rounded-md border-none bg-gray-200 bg-clip-padding text-current shadow-lg outline-none">
            <div
                class="flex flex-shrink-0 items-start justify-between rounded-t-md py-4 border-b border-gray-300/50 p-6 bg-white">
                <!--Modal title-->
                <div class="">
                    <h5 class="text-xl font-sans font-normal leading-normal text-gray-500 paymethod"
                        id="exampleModalScrollableLabel">
                        Cash on delivery
                    </h5>
                    <div>
                        <h3 class="font-normal font-sans leading-normal text-gray-500 inline-block">Status:
                        </h3>
                        <span class="font-normal font-sans leading-normal text-gray-500 orderNo">Order #:
                            53527</span>
                    </div>
                    <div>
                        <h3 class="font-normal font-sans leading-normal text-gray-500 inline-block">
                            Placement time:
                        </h3>
                        <span class="font-normal font-sans leading-normal text-gray-500 placementTime">July 07,
                            1:08AM</span>
                    </div>
                </div>

                <!--Close button-->
                <div class="flex justify-between items-center space-x-2">
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
            <div class="rounded-md w-full">
                <!-- start poiint and end --->
                <div class="flex flex-col justify-start items-start text-left px-6 py-4 bg-white">
                    <div class="p-[2px]"><img src="<?= IMAGES ?>satrt_point.png" class="inline-block w-3 h-3" alt="">
                        <p class="inline-block text-xs font-bold px-[5px] senderName">Victor Maamaa</p>
                    </div>
                    <div class="pb-5 px-4 ml-2 border-l border-gray-400/50">
                        <p class="text-xs font-light font-sans text-gray-600/70 senderAdds">No 30 oro
                            aka street rumuagholu</p>
                    </div>

                    <div class="p-[2px]"><img src="<?= IMAGES ?>location.png" class="inline-block w-3 h-4" alt="">
                        <p class="inline-block text-xs font-bold px-[5px] receiverName">Chioma Desire</p>
                    </div>
                    <div class="pb-5 px-4 ml-2">
                        <p class="text-xs font-light font-sans text-gray-600/70 receiverAdds">Behind
                            redeemed church rumuokro port harcourt.</p>
                    </div>
                </div>

                <div class=" mx-6 my-3 p-2 rounded-md shadow-md bg-white">
                    <h3 class="font-sans font-semibold leading-6">Delivery Instruction:</h3>
                    <p class="text-sm font-light font-sans text-gray-600 deliveryInstruction">This item is to be
                        delivered at
                        the entrance of my door.This item is to be delivered at
                        the entrance of my door.This item is to be delivered at
                        the entrance of my door.</p>
                </div>
                <h3 class="font-sans text-xs font-semibold leading-6 text-center text-gray-500">ORDER ITEMS
                </h3>
                <div class="mx-6 mb-3 border-b-2 border-gray-300">
                    <ul class="text-left mx-4 mb-4 font-sans font-light text-sm leading-5 packageItems">
                    </ul>
                </div>


                <div class="mx-6 my-3 mb-10 p-2 rounded-md shadow-md bg-white">
                    <h3 class="font-sans font-semibold leading-6 inline-block">Amount Due</h3>
                    <span class="inline-block float-right font-sans font-semibold leading-6 amount"><img
                            src="<?= IMAGES ?>naira.png" class="w-3 h-3 -mt-1 inline-block mr-1" alt="">4000.00</span>
                </div>
            </div>
        </div>
    </div>
</div>