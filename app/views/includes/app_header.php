<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"
        integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="<?= JS ?>script.js" defer></script>
    <script defer src="<?= JS ?>navigation.js"></script>
    <script defer src="<?= JS ?>dashboard.js"></script>
    <script defer src="<?= JS ?>dispatch.js"></script>
    <script type="module" defer src="<?= JS ?>orders.js"></script>
    <script defer src="<?= JS ?>create_parcel.js" defer></script>
    <script defer src="<?= JS . 'drivers.js' ?>"></script>
    <script defer src="https://js.paystack.co/v1/inline.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        content: ['./*.html'],
        theme: {
            screens: {
                sm: '480px',
                nav: '1020px',
                md: '768px',
                lg: '1020px',
                xl: '1440px'

            },
            extend: {
                colors: {
                    yellowColor: 'hsl(34,98%,62%)',
                    darkRed: 'hsl(7,100%,58%)',
                    darkGray: 'hsl(0,0%,21%)',
                    veryDarkBlue: 'hsl(229, 32%, 21%)'
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif']
                },
                backgroundImage: {
                    'dots': "url('../images/bg-dots.svg')"
                }
            }
        },
        plugins: [require('tailwind-scrollbar')]
    }
    </script>
    <title><?= $page_title ?></title>
</head>

<body>
    <nav class="fixed w-full top-0 mb-20 mx-auto z-[800]">
        <!--- Nav on full screen -->
        <div class="shadow-md ">
            <div class="mx-auto flex flex-row justify-between items-center md:px-5 md:pt-2">
                <!--logo-->
                <div class="flex flex-row justify-between items-center z-[2500] space-x-10">
                    <button
                        class="inline-block rounded bg-yellowColor px-2 py-1 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                        data-te-sidenav-toggle-ref data-te-target="#sidenav-2" aria-controls="#sidenav-2"
                        aria-haspopup="true">
                        <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="h-5 w-5">
                                <path fill-rule="evenodd"
                                    d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <img src="<?= IMAGES ?>Logo.png" alt="">
                </div>
                <!--- Buttons -->
                <div class="flex relative justify-around items-center space-x-10 px-5" data-te-dropdown-ref>
                    <img class="h-8 w-8 cursor-pointer" src="<?= IMAGES ?>help_outline.png" alt="">
                    <img class="h-8 w-8 cursor-pointer" src="<?= IMAGES ?>notifications.png" alt="">
                    <img class="h-8 w-8 cursor-pointer profile_image" src="<?= IMAGES ?>person.png" alt="">


                    <div id="profile_card"
                        class="absolute z-[1000] float-left m-0  min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg opacity-0 hidden [&[data-te-dropdown-show]]:block p-10 top-10 right-5 transition ease-in">
                        <div class="relative">
                            <label for="image">
                                <img class="w-[100px] cursor-pointer h-[100px] mx-auto rounded-full object-fill"
                                    src="<?= IMAGES ?>human_face3.jpg" alt="">
                                <input type="file" id="image" hidden>
                            </label>
                            <img class="absolute top-16 right-16" src="<?= IMAGES ?>Camera.png" alt="">
                        </div>
                        <h4 class="font-sans font-light text-center mt-2 text-[16px] text-gray-700">Richman
                            Loveday
                        </h4>
                        <p class="text-center text-[10px] text-gray-500">lovedayrichman@yahoo.com</p>
                        <div class="flex flex-col justify-center items-center">
                            <a href=""
                                class="border border-yellowColor px-9 py-3 mt-4 text-center w-full rounded-md bg-yellowColor text-white transition duration-150 hover:ease-in">Manage
                                account</a>
                            <a href="<?= ROOT ?>logout"
                                class="border inline-block border-yellowColor px-9 py-3 mt-4 w-full text-center rounded-md text-yellowColor transition duration-150 hover:ease-in">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>