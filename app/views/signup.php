<?= $this->view('includes/header', $data); ?>

<!--- Why choose us --->

<body class="bg-[#F9F9F9]">
    <form action="" method="post">
        <div class="flex create_account justify-center items-center min-h-screen mt-5 mb-5 p-10">
            <div class="md:max-w-2xl p-5 shadow-lg bg-[#F9F9F9] rounded-xl w-full ">
                <h2 class="font-sans text-xl font-bold text-center">Create <span class="text-yellowColor">an
                    </span>account
                </h2>
                <div class="w-full mb-4 mt-5 flex justify-center flex-col md:flex-row items-center md:space-x-6 px-10">
                    <div class="md:w-1/2 w-full">
                        <label for="fname" class="text-left font-sans text-gray-500">First
                            Name</label><br>
                        <input id="fname" type="text" name="firstName" class="w-full mt-2 border-0 rounded-md firstName" required>
                        <span class="text-yellowColor font-sans text-[10px] font-semibold italic hidden">Please enter
                            your First Name.</span>
                    </div>
                    <div class="md:w-1/2 w-full">
                        <label for="fname" class="text-left font-sans text-gray-500">Last Name</label><br>
                        <input id="fname" type="text" name="lastName" class="w-full mt-2 border-0 active:border-yellowColor rounded-md lastName" required>
                        <span class="text-yellowColor font-sans text-[10px] font-semibold italic hidden">Please enter
                            your Last Name.</span>
                    </div>
                </div>

                <div class="w-full mb-4 mt-5 flex justify-center flex-col md:flex-row items-center space-x-6 px-10">
                    <div class="md:w-1/2 w-full">
                        <label for="email" class="text-left font-sans text-gray-500">Email Address</label><br>
                        <input id="fname" type="email" name="email" class="w-full mt-2 border-0 active:border-yellowColor rounded-md email" required>
                        <span class="text-yellowColor font-sans text-[10px] font-semibold italic hidden">Please enter
                            your Email Address.</span>
                    </div>
                </div>
                <div class="w-full mb-4 mt-5 px-10">
                    <label for="accountType" class="text-left font-sans text-gray-500">Select LGA</label><br>
                    <select class="w-full p-1 border-0 border-red rounded-lg placeholder:p-1" data-te-select-init data-te-select-filter="true" name="accountType" id="acct_type" required>
                        <option value="0">Select account type</option>
                        <option value="Business">Business</option>
                        <option value="Customer">Customer</option>
                    </select>
                    <span class="text-yellowColor font-sans text-[10px] font-semibold italic hidden errorActType">Please
                        select an
                        Account Type.</span>
                </div>

                <div class="w-full mb-4 mt-5 px-10">
                    <label for="state" class="text-left font-sans text-gray-500">Select State</label><br>
                    <select class="w-full p-1 border-0 border-red rounded-lg placeholder:p-1" data-te-select-init data-te-select-filter="true" name="state" id="state">
                        <option value="0" selected="selected">- Select a State-</option>
                        <option value="Abia">Abia</option>
                        <option value="Adamawa">Adamawa</option>
                        <option value="AkwaIbom">AkwaIbom</option>
                        <option value="Anambra">Anambra</option>
                        <option value="Bauchi">Bauchi</option>
                        <option value="Bayelsa">Bayelsa</option>
                        <option value="Benue">Benue</option>
                        <option value="Borno">Borno</option>
                        <option value="Cross River">Cross River</option>
                        <option value="Delta">Delta</option>
                        <option value="Ebonyi">Ebonyi</option>
                        <option value="Edo">Edo</option>
                        <option value="Ekiti">Ekiti</option>
                        <option value="Enugu">Enugu</option>
                        <option value="FCT">FCT</option>
                        <option value="Gombe">Gombe</option>
                        <option value="Imo">Imo</option>
                        <option value="Jigawa">Jigawa</option>
                        <option value="Kaduna">Kaduna</option>
                        <option value="Kano">Kano</option>
                        <option value="Katsina">Katsina</option>
                        <option value="Kebbi">Kebbi</option>
                        <option value="Kogi">Kogi</option>
                        <option value="Kwara">Kwara</option>
                        <option value="Lagos">Lagos</option>
                        <option value="Nasarawa">Nasarawa</option>
                        <option value="Niger">Niger</option>
                        <option value="Ogun">Ogun</option>
                        <option value="Ondo">Ondo</option>
                        <option value="Osun">Osun</option>
                        <option value="Oyo">Oyo</option>
                        <option value="Plateau">Plateau</option>
                        <option value="Rivers">Rivers</option>
                        <option value="Sokoto">Sokoto</option>
                        <option value="Taraba">Taraba</option>
                        <option value="Yobe">Yobe</option>
                        <option value="Zamfara">Zamafara</option>
                    </select>
                    <span class="text-yellowColor font-sans text-[10px] font-semibold italic hidden errorState">Please
                        select a
                        State.</span>
                </div>

                <div class="w-full mb-4 mt-5 px-10">
                    <label for="lga" class="text-left font-sans text-gray-500">Select LGA</label><br>
                    <select class="w-full p-1 border-2 border-red rounded-lg placeholder:p-1 select-lga bg-white" data-te-select-init data-te-select-filter="true" name="lga" id="lga">
                        <option value="Select LGA..." selected="selected">Select LGA...</option>
                    </select>
                    <span class="text-yellowColor font-sans text-[10px] font-semibold italic hidden errorLga">Please
                        select a
                        Local Government Area (LGA).</span>
                </div>

                <div class="w-full mb-4 mt-5 flex justify-center flex-col md:flex-row items-center px-10">
                    <div class="md:w-1/2 w-full">
                        <label for="password" class="text-left font-sans text-gray-500">Password</label><br>
                        <input id="password" type="password" name="password" class="w-full mt-2 border-0 active:border-yellowColor rounded-md">
                        <span class="text-yellowColor font-sans text-[10px] font-semibold italic hidden"></span>
                    </div>

                    <div class="w-full mb-4 mt-5 flex justify-center flex-col md:flex-row items-center space-x-6 px-10">
                        <div class="md:w-1/2 w-full">
                            <label for="confirm_password" class="text-left font-sans text-gray-500">Confirm
                                Password</label><br>
                            <input id="confirm_password" type="password" name="confirm_password" class="w-full mt-2 border-0 active:border-yellowColor rounded-md">
                            <span class="text-yellowColor font-sans text-[10px] font-semibold italic hidden"></span>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button id="continueBtn" class="border border-yellowColor px-9 py-3 mt-4 rounded-md bg-yellowColor text-white transition duration-150 hover:ease-in" data-url="<?= ROOT ?>signup">Continue
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden justify-center items-center text-center min-h-screen mt-5 mb-5 choose_business p-10">
            <div class="max-w-md p-10 shadow-lg bg-[#F9F9F9] rounded-xl w-full">
                <h2 class="font-sans text-xl font-bold text-center">Create <span class="text-yellowColor">an
                    </span>account
                </h2>
                <form action="">
                    <div class="md:w-1/2 w-full text-left">
                        <label for="fname" class="text-left font-sans text-gray-500">Business
                            Name</label><br>
                        <input id="fname" type="text" name="businessName" class="w-full mt-2 border-0 rounded-md busName" required>
                        <span class="text-yellowColor font-sans text-[10px] font-semibold italic hidden">Please
                            enter
                            your Business Name.</span>
                    </div>
                    <div class="w-full mb-4 mt-5 text-left">
                        <label for="fname" class="text-left font-sans text-gray-500">Select State</label><br>
                        <select class="w-full p-1 border-0 border-red rounded-lg placeholder:p-1 busState" data-te-select-init data-te-select-filter="true" name="state" id="stateBus">
                            <option value="0" selected="selected">- Select a State-</option>
                            <option value="Abia">Abia</option>
                            <option value="Adamawa">Adamawa</option>
                            <option value="AkwaIbom">AkwaIbom</option>
                            <option value="Anambra">Anambra</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Bayelsa">Bayelsa</option>
                            <option value="Benue">Benue</option>
                            <option value="Borno">Borno</option>
                            <option value="Cross River">Cross River</option>
                            <option value="Delta">Delta</option>
                            <option value="Ebonyi">Ebonyi</option>
                            <option value="Edo">Edo</option>
                            <option value="Ekiti">Ekiti</option>
                            <option value="Enugu">Enugu</option>
                            <option value="FCT">FCT</option>
                            <option value="Gombe">Gombe</option>
                            <option value="Imo">Imo</option>
                            <option value="Jigawa">Jigawa</option>
                            <option value="Kaduna">Kaduna</option>
                            <option value="Kano">Kano</option>
                            <option value="Katsina">Katsina</option>
                            <option value="Kebbi">Kebbi</option>
                            <option value="Kogi">Kogi</option>
                            <option value="Kwara">Kwara</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Nasarawa">Nasarawa</option>
                            <option value="Niger">Niger</option>
                            <option value="Ogun">Ogun</option>
                            <option value="Ondo">Ondo</option>
                            <option value="Osun">Osun</option>
                            <option value="Oyo">Oyo</option>
                            <option value="Plateau">Plateau</option>
                            <option value="Rivers">Rivers</option>
                            <option value="Sokoto">Sokoto</option>
                            <option value="Taraba">Taraba</option>
                            <option value="Yobe">Yobe</option>
                            <option value="Zamfara">Zamafara</option>
                        </select>
                        <span class="text-yellowColor font-sans text-[10px] font-semibold italic hidden errorState">Please
                            select a
                            State.
                        </span>
                    </div>

                    <div class="w-full mb-4 mt-5 text-left">
                        <label for="fname" class="text-left font-sans text-gray-500">Select LGA</label><br>
                        <select class="w-full p-1 border-2 border-red rounded-lg placeholder:p-1 busLga bg-white" data-te-select-init data-te-select-filter="true" name="lga" id="lga">
                            <option value="0" selected="selected">Select LGA...</option>
                        </select>
                        <span class="text-yellowColor font-sans text-[10px] font-semibold italic hidden errorLga">Please
                            select a
                            Local Government Area (LGA).
                        </span>
                    </div>
                    <div class="md:w-1/2 w-full text-left">
                        <label for="fname" class="text-left font-sans text-gray-500">Phone number</label><br>
                        <input id="fname" type="text" name="businessName" class="w-full mt-2 border-0 rounded-md businessName" required>
                        <span class="text-yellowColor font-sans text-[10px] font-semibold italic hidden">Please enter
                            your First Name.
                        </span>
                    </div>
                    <button id="businessBtn" data-url="<?= ROOT ?>signup/business" class="border border-yellowColor px-9 py-3 mt-4 rounded-md bg-yellowColor text-white transition duration-150 hover:ease-in">Create
                        Account
                    </button>
                </form>
            </div>
        </div>
    </form>
    </footer>

</body>

</html>