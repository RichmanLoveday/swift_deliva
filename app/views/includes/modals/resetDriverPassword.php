 <!--- Select Driver Modals --->
 <div data-te-modal-init
     class="fixed left-0 top-[10%] z-[1050] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
     id="resetPassword" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
     <div data-te-modal-dialog-ref
         class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
         <div
             class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
             <div
                 class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                 <div
                     class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
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
                     <div class="space-y-2 w-full">
                         <label for="adminPass" class=" text-sm font-semibold">Admin Password*</label>
                         <input type="password"
                             class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1 adminPass"
                             placeholder="Enter password" name="adminPass">
                         <span class="text-red-600 text-sm italic"></span>
                     </div>

                     <div class="space-y-2 w-full">
                         <label for="newPass" class=" text-sm font-semibold">New Password*</label>
                         <input type="password"
                             class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1 newPass"
                             placeholder="Enter new password" name="newPass">
                         <span class="text-red-600 text-sm italic"></span>
                     </div>

                     <div class="space-y-2 w-full">
                         <label for="repeatNew" class=" text-sm font-semibold">Repeat New Password*</label>
                         <input type="password"
                             class="w-full p-1 border-2 border-gray-900/10 rounded-lg placeholder:p-1 conPass"
                             placeholder="Repeat password" name="repeatNew">
                         <span class="text-red-600 text-sm italic"></span>
                     </div>
                     <span class="px-5 py-2 text-red-950 bg-red-600/70 text-center resetError hidden"></span>
                     <div
                         class="flex flex-shrink-0 flex-wrap items-center justify-center border-t-2 border-neutral-100 border-opacity-100 p-4 w-full">
                         <button type="button" id="reset_password" data-url="<?= ROOT ?>drivers/reset_password"
                             class="ml-1 rounded bg-green-900/80 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                             data-te-ripple-init data-te-ripple-color="light">
                             SAVE
                         </button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>