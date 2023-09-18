 <!-- Modal -->
 <div data-te-modal-init
     class="fixed left-0 top-0 z-[1050] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
     id="viewPackage" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
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
                                 <li>
                                     <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400"
                                         href="#" data-te-dropdown-item-ref> <img src="<?= IMAGES ?>mark.png"
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
                                         href="#" data-te-dropdown-item-ref> <img src="<?= IMAGES ?>delete_red.png"
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