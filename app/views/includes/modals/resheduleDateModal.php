  <!--- Resedule Date --->
  <div data-te-modal-init
      class="fixed left-0 top-[25%] z-[1050] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
      id="resedule" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
      <div data-te-modal-dialog-ref
          class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
          <div
              class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
              <div
                  class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                  <div
                      class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4">
                      <h5 class="text-xl font-medium leading-normal text-neutral-800" id="exampleModalLabel">
                          Resedule Order
                      </h5>
                      <button type="button" id="resedule"
                          class="-my-2 border-2 border-gray-900/10 rounded-md -mr-2 ml-auto box-content h-4 w-4 p-2 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none close_btn"
                          data-te-modal-dismiss aria-label="Close">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor">
                              <path
                                  d="M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z" />
                          </svg>
                      </button>
                  </div>


                  <div class="relative m-3" data-te-datepicker-init data-te-input-wrapper-init>
                      <input type="text" id="pickupDate"
                          class="pickupDate peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                          placeholder="Select a date" data-te-datepicker-toggle-ref
                          data-te-datepicker-toggle-button-ref />
                      <label for="floatingInput"
                          class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Select
                          pickup date
                      </label>
                  </div>
                  <span
                      class="errorPickupDate text-xs font-semibold italic text-[#ff0000] ml-4 -mt-3 opacity-0 transition ease-linear">
                      Choose a pickup date *
                  </span>

                  <div class="relative m-3" data-te-datepicker-init data-te-input-wrapper-init>
                      <input type="text" id="deliveryDate"
                          class="deliverDate peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                          placeholder="Select a date" data-te-datepicker-toggle-ref
                          data-te-datepicker-toggle-button-ref />
                      <label for="floatingInput"
                          class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Select
                          delivery date
                      </label>
                  </div>
                  <span
                      class="errorDelievryDate text-xs font-semibold italic text-[#ff0000] ml-4 -mt-3 opacity-0 transition ease-linear">
                      Choose a delivery date *
                  </span>

                  <div class="relative m-3" data-te-timepicker-init data-te-input-wrapper-init
                      id="timepicker-just-input">
                      <input type="text" id="deliveryTime"
                          class="deliveryTime peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                          placeholder="Select Time" data-te-toggle="timepicker-just-input" id="form15" />
                      <label for="floatingInput"
                          class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Select
                          delivery time
                      </label>
                  </div>
                  <span
                      class="errorDelievryTime text-xs font-semibold italic text-[#ff0000] ml-4 -mt-3 opacity-0 transition ease-linear">
                      Choose a delivery time *
                  </span>

                  <div
                      class="flex flex-shrink-0 flex-wrap items-center justify-end border-t-2 border-neutral-100 border-opacity-100 p-4">
                      <button type="button"
                          class="inline-block rounded bg-yellow-500 text-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                          data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                          Close
                      </button>
                      <button type="button" id="resedule_btn"
                          class="ml-1 inline-block rounded bg-blue-900/80 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                          data-te-ripple-init data-te-ripple-color="light">
                          Resedule
                          <span
                              class="hidden ml-2 h-4 w-4 animate-spin rounded-full border-2 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]">
                          </span>
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </div>