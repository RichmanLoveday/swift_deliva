<?php $this->view('includes/header', $data); ?>

<body class="bg-[#F9F9F9]">
    <div class="flex justify-center items-center min-h-screen mb-5 p-5 -mt-9">
        <div class="md:max-w-2xl p-5 shadow-lg bg-[#F9F9F9] rounded-xl w-full">
            <h2 class="font-sans text-3xl font-bold text-center">Sign <span class="text-yellowColor">in</span>
            </h2>
            <form action="" method="post">
                <?= print_error($data, 'email/password') ?>
                <div class="w-full mb-4 mt-5 flex justify-center flex-col md:flex-row items-center space-x-6 px-10">
                    <div class="md:w-1/2 w-full">
                        <label for="email" class="text-left font-sans text-gray-500">Email Address</label><br>
                        <input id="fname" type="email" name="email" value="<?= get_var('email') ?>"
                            class="w-full mt-2 border-0 active:border-yellowColor rounded-md">
                        <?= print_error2($data, 'email') ?>
                    </div>
                </div>

                <div class="w-full mb-4 mt-5 flex justify-center flex-col md:flex-row items-center space-x-6 px-10">
                    <div class="md:w-1/2 w-full">
                        <label for="password" class="text-left font-sans text-gray-500">Password</label><br>
                        <input id="password" type="password" name="password" value="<?= get_var('password') ?>"
                            class="w-full mt-2 border-0 active:border-yellowColor rounded-md">
                        <?= print_error2($data, 'password') ?>
                    </div>
                </div>

                <div class="text-center w-full px-10">
                    <button
                        class="border w-full border-yellowColor px-2 py-2 mt-4 rounded-md bg-yellowColor text-white transition duration-150 hover:ease-in">Sign
                        In
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>