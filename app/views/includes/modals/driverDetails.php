 <!--- Select Driver Modals --->
 <div data-te-modal-init
     class="fixed left-0 top-[5%] z-[1050] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
     id="viewDetails" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
     <div data-te-modal-dialog-ref
         class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[700px]">
         <div
             class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
             <div
                 class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                 <div class="flex flex-shrink-0 items-center justify-between">
                     <button type="button"
                         class="-my-2 border-2 border-gray-900/10 rounded-md mr-5 mt-1 ml-auto box-content h-4 w-4 p-2 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none close_btn"
                         data-te-modal-dismiss aria-label="Close">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor">
                             <path
                                 d="M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z" />
                         </svg>
                     </button>
                 </div>
                 <div class="flex flex-row space-x-2 justify-center items-start px-6 py-4 w-full">
                     <div class="flex flex-col justify-between space-y-3 items-center w-[30%] p-5">
                         <div class="space-y-2  w-full">
                             <img class="w-[80%] mx-auto" src="<?= IMAGES ?>avatar.png" alt="">
                         </div>
                         <h3 class="font-semibold text-sm font-sans driverName"></h3>
                     </div>

                     <div class="space-y-3 w-[30%] px-2 py-5">
                         <div>
                             <h3 class="font-semibold text-sm text-black/50 leading-6">Phone number</h3>
                             <p class=" font-medium text-black/90 text-xs leading-6 driverPhone"></p>
                         </div>

                         <div>
                             <h3 class=" font-semibold text-sm text-black/50 leading-6">Email</h3>
                             <p class=" font-medium text-black/90 text-xs leading-6 driverEmail"></p>
                         </div>

                         <div>
                             <h3 class=" font-semibold text-sm text-black/50 leading-6">Area</h3>
                             <p class=" font-medium text-black/90 text-xs leading-6 driverArea"></p>
                         </div>
                     </div>

                     <div class="space-y-2 w-[30%] px-2 py-5">
                         <div>
                             <h3 class=" font-semibold text-sm text-black/50 leading-6">Vehicle</h3>
                             <img src="" alt="">
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </div>