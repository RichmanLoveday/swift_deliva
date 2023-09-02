<?= $this->view('includes/header', $data); ?>
<!--- Why choose us --->

<body class="bg-[#F9F9F9]">
    <div class="flex justify-center items-center text-center min-h-screen mt-5 mb-5">
        <div class="max-w-md p-5 shadow-lg bg-[#F9F9F9] rounded-xl w-full">
            <h2 class="font-sans text-[15px] font-bold">What is your Company type?</h2>
            <form action="">
                <div class="w-full h-10 relative mb-4 mt-5">
                    <label for="hs-radio-on-right" class="flex p-3 w-full bg-white rounded-md text-sm font-sans text-black absolute">
                        Ecommerce-business
                    </label>
                    <input type="radio" name="business" class="shrink-0 ml-auto mt-0.5 rounded-full text-yellow-500 pointer-events-none absolute right-6 top-1/2 -translate-y-1/2 focus:ring-yellow-500" id="hs-radio-on-right">
                </div>

                <div class="w-full h-10 relative mb-4 mt-5">
                    <label for="hs-radio-on-right-1" class="flex p-3 w-full bg-white rounded-md text-sm font-sans text-black absolute">
                        Restaurant
                    </label>
                    <input type="radio" name="business" value="restaurant" class="shrink-0 ml-auto mt-0.5 rounded-full text-yellow-500 pointer-events-none absolute right-6 top-1/2 -translate-y-1/2 focus:ring-yellow-500" id="hs-radio-on-right-1">
                </div>

                <div class="w-full h-10 relative mb-4 mt-5">
                    <label for="hs-radio-on-right-2" class="flex p-3 w-full bg-white rounded-md text-sm font-sans text-black absolute">
                        Retail Store
                    </label>
                    <input type="radio" name="business" value="retail-store" class="shrink-0 ml-auto mt-0.5 rounded-full text-yellow-500 pointer-events-none absolute right-6 top-1/2 -translate-y-1/2 focus:ring-yellow-500" id="hs-radio-on-right-2">
                </div>

                <div class="w-full h-10 relative mb-4 mt-5">
                    <label for="hs-radio-on-right-3" class="flex p-3 w-full bg-white rounded-md text-sm font-sans text-black absolute">
                        Wholesale Distributor
                    </label>
                    <input type="radio" name="business" value="wholesale_distributor" class="shrink-0 ml-auto mt-0.5 rounded-full text-yellow-500 pointer-events-none absolute right-6 top-1/2 -translate-y-1/2 focus:ring-yellow-500" id="hs-radio-on-right-3">
                </div>
                <div class="w-full h-10 relative mb-4 mt-5">
                    <label for="hs-radio-on-right-4" class="flex p-3 w-full bg-white rounded-md text-sm font-sans text-black absolute">
                        Medical & Healthcare
                    </label>
                    <input type="radio" name="business" value="Medical & Healthcare" class="shrink-0 ml-auto mt-0.5 rounded-full text-yellow-500 pointer-events-none absolute right-6 top-1/2 -translate-y-1/2 focus:ring-yellow-500" id="hs-radio-on-right-4">
                </div>
                <div class="w-full h-10 relative mb-4 mt-5">
                    <label for="hs-radio-on-right-5" class="flex p-3 w-full bg-white rounded-md text-sm font-sans text-black absolute">
                        Courier & Logistics
                    </label>
                    <input type="radio" name="business" class="shrink-0 ml-auto mt-0.5 rounded-full text-yellow-500 pointer-events-none absolute right-6 top-1/2 -translate-y-1/2 focus:ring-yellow-500" id="hs-radio-on-right-5">
                </div>
                <div class="w-full h-10 relative mt-5">
                    <label for="hs-radio-on-right-6" class="flex p-3 w-full bg-white rounded-tl-md rounded-tr-sm text-sm font-sans text-black absolute">
                        Others
                    </label>
                    <input type="radio" name="business" class="shrink-0 ml-auto mt-0.5 rounded-full text-yellow-500 pointer-events-none absolute right-6 top-1/2 -translate-y-1/2 focus:ring-yellow-500" id="hs-radio-on-right-6">
                </div>
                <div class="w-full h-20 mt-1 p-2 bg-white rounded-bl-md rounded-br-md">
                    <input placeholder="Enter your company type" type="text" class="mb-10 w-full border-0 placeholder:font-semibold font-sans focus:outline-none placeholder:text-gray-400 placeholder:opacity-30 placeholder:text-[15px] focus:border-0 placeholder:my-5 focus:border-teal-500">
                </div>
                <button class="border border-yellowColor px-9 py-3 mt-4 rounded-md bg-yellowColor text-white transition duration-150 hover:ease-in">Proceed
                </button>
            </form>
        </div>
    </div>
    </footer>
</body>

</html>