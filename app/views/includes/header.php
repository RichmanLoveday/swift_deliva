<html lang="en" class="scroll-smooth">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= CSS . 'style.css' ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"
            integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <?php if ($page_title != 'Home Page') : ?>
        <script defer type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
        <?php endif; ?>
        <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- <script src="https://cdn.tailwindcss.com"></script> -->
        <script defer src="<?= JS . 'script.js' ?>" defer></script>
        <script defer src="<?= JS . 'carausel.js' ?>"></script>
        <script defer src="<?= JS . 'signUp.js' ?>"></script>
        <title><?= $page_title ?></title>
    </head>

    <body class="overflow-x-hidden">
        <nav class="relative mx-auto">
            <!--- Nav on full screen -->
            <div class="shadow-md">
                <div class="container__limiter mx-auto flex flex-row justify-between items-center md:px-5 md:pt-2">
                    <!--logo-->
                    <img src="images/Logo.png" alt="">

                    <!--- links --->
                    <div
                        class="hidden items-center space-x-2 text-grayishBlue md:flex nav:flex-row font-sans font-thin">
                        <a href="<?= ROOT ?>" class="p-4 active__nav">Home</a>
                        <a href="#" class="p-4">About Us</a>
                        <a href="#" class="p-4">Services</a>
                        <a href="#" class="p-4">Contact Us</a>
                        <a href="#" class="p-4">FaQs</a>
                    </div>

                    <!--- Buttons -->
                    <div class="hidden md:flex md:space-x-2 pb-2">
                        <a href="<?= ROOT ?>login"
                            class="border border-yellowColor px-9 py-3 rounded-md text-yellowColor">Login</a>
                        <a href="<?= ROOT ?>signup"
                            class="border border-yellowColor px-9 py-3 rounded-md bg-yellowColor text-white transition duration-150 hover:ease-in">Start
                            for free</a>
                    </div>

                    <!--- Nav on small screen --->
                    <button id="menu-btn" class="z-30 block md:hidden focus:outline-none hamburger">
                        <span class="hamburger-top"></span>
                        <span class="hamburger-middle"></span>
                        <span class="hamburger-bottom"></span>
                    </button>
                </div>
            </div>
        </nav>

        <!--- Why choose us --->