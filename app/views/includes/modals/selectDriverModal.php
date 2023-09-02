 <!--- Select Driver Modals --->
 <div data-te-modal-init
     class="fixed left-0 top-[25%] z-[1050] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
     id="assignDriver" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
     <div data-te-modal-dialog-ref
         class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
         <div
             class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-zinc-600">
             <div
                 class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-700">
                 <div
                     class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                     <h5 class="text-xl font-medium leading-normal text-neutral-800" id="exampleModalLabel">
                         Assign a driver
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
                 <div class="flex-auto p-4 space-y-4" data-te-modal-body-ref>
                     <select class="w-full select_driver p-2 rounded-md border-2 border-red-700" data-te-select-init
                         data-te-container="#assignDriver" data-te-select-filter="true">
                         <option>----select driver-----</option>
                         <?php if (is_array($drivers)) : ?>
                         <?php foreach ($drivers as $drive) : ?>
                         <option value="<?= $drive->userID ?>"><?= $drive->fullName ?></option>
                         <?php endforeach; ?>
                         <?php endif; ?>

                     </select>
                     <span
                         class="errorDriver text-xs font-semibold italic text-[#ff0000] mt-10 opacity-0 transition ease-linear">Select
                         a
                         driver *</span>
                 </div>
                 <div
                     class="flex flex-shrink-0 flex-wrap items-center justify-end border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                     <button type="button"
                         class="inline-block rounded bg-yellow-500 text-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                         data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                         Close
                     </button>
                     <button type="button" id="assign_driver" data-id=""
                         class="ml-1 inline-block rounded bg-blue-900/80 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                         data-te-ripple-init data-te-ripple-color="light">
                         Assign
                         <span
                             class="hidden ml-2 h-4 w-4 animate-spin rounded-full border-2 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]">
                         </span>
                     </button>
                 </div>
             </div>
         </div>
     </div>
 </div>