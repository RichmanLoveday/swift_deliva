 <!--- Select Driver Modals --->
 <div data-te-modal-init
     class="fixed left-0 top-[10%] z-[1050] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
     id="registerDriver" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
     <div data-te-modal-dialog-ref
         class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
         <div
             class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-zinc-600">
             <div
                 class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-700">
                 <div
                     class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                     <h5 class="text-xl font-medium leading-normal text-neutral-800" id="exampleModalLabel">
                         Register Driver
                     </h5>
                     <button type="button"
                         class="-my-2 border-2 border-gray-900/10 rounded-md -mr-2 ml-auto box-content h-4 w-4 p-2 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none close_btn"
                         data-te-modal-dismiss aria-label="Close">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor">
                             <path
                                 d="M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z" />
                         </svg>
                     </button>
                 </div>
                 <form class="flex flex-col  space-y-3 justify-center items-center px-6 py-4 w-full">
                     <div class="flex justify-between space-x-3 items-center">
                         <div class="space-y-2 w-1/2">
                             <label for="fullName" class="text-sm font-semibold">Full Name*</label>
                             <input type="text"
                                 class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1 full_name"
                                 placeholder="Enter full name" name="fullName">
                             <span class="text-red-600 text-sm italic errorCourier"></span>
                         </div>

                         <div class="space-y-2 w-1/2">
                             <label for="phone_number" class=" text-sm font-semibold">Phone No*</label>
                             <input type="text"
                                 class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1 phn_num"
                                 placeholder="Enter phone number" name="phone_number">
                             <span class="text-red-600 text-sm italic errorCourier"></span>
                         </div>
                     </div>

                     <div class="space-y-2 w-full">
                         <label for="email" class=" text-sm font-semibold">Email*</label>
                         <input type="email"
                             class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1 email"
                             placeholder="Enter email" name="email">
                         <span class="text-red-600 text-sm italic errorCourier"></span>
                     </div>

                     <div class="space-y-2 w-full">
                         <label for="password" class=" text-sm font-semibold">Tempory Password*</label>
                         <input type="password"
                             class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1 password"
                             placeholder="Enter password" name="password">
                         <span class="text-red-600 text-sm italic errorCourier"></span>
                     </div>

                     <div
                         class="flex flex-shrink-0 flex-wrap items-center justify-center border-t-2 border-neutral-100 border-opacity-100 p-4 w-full">

                         <button type="button" id="register_driver" data-url="<?= ROOT ?>drivers/register"
                             data-companyID="<?= $companyID ?>"
                             class="ml-1 inline-block rounded bg-blue-900/80 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                             data-te-ripple-init data-te-ripple-color="light">
                             Register
                             <span
                                 class="hidden ml-2 h-4 w-4 animate-spin rounded-full border-2 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]">
                             </span>
                         </button>

                         <button type="button" id="edit_driver" data-url="<?= ROOT ?>drivers/edit"
                             class="ml-1 hidden rounded bg-blue-900/80 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                             data-te-ripple-init data-te-ripple-color="light">
                             Edit
                             <span
                                 class="hidden ml-2 h-4 w-4 animate-spin rounded-full border-2 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]">
                             </span>
                         </button>
                     </div>
                 </form>

             </div>
         </div>
     </div>
 </div>