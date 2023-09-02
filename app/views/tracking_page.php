<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
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
                        'dots': "url('../<?= IMAGES ?>bg-dots.svg')"
                    }
                }
            },
            plugins: [require('tailwind-scrollbar')]
        }
    </script>
    <title>Dashboard</title>
</head>

<body>
    <!-- Section body -->
    <section class="py-5 bg-gray-500/5 w-full  text-center" id="content">
        <div class="w-[42%] mx-auto p-5 bg-white rounded-md shadow-sm">
            <div class="text-left mb-3">
                <h3 class="text-lg font-sans font-semibold leading-2 text-black">Company Name</h3>
                <p class="text-xs font-sans font-normal text-gray-800/70">Powered by Swift Deliva</p>
            </div>
            <div class="bg-gray-400/50 h-[1px]"></div>

            <div class="text-left my-3 space-y-1">
                <h3 class="text-xl font-sans font-semibold leading-2 text-black">Driving to pickup</h3>
                <p class="text-xs font-sans font-normal text-gray-800/70">Est. arrival at 1:04 (Delayed)</p>
            </div>

            <div class="flex flex-row justify-between items-center space-x-3 mb-10">
                <span class="w-[25%] bg-green-500 h-[3px] rounded-full"></span>
                <span class="w-[25%] bg-gray-300 h-[3px] rounded-full"></span>
                <span class="w-[25%] bg-gray-300 h-[3px] rounded-full"></span>
                <span class="w-[25%] bg-gray-300 h-[3px] rounded-full"></span>
            </div>
            <div class="bg-gray-400/50 h-[1px]"></div>
            <h3 class="text-left font-semibold font-sans my-5">Updates</h3>
            <div class="flex flex-col justify-start items-start text-left mb-5">
                <div class="p-[2px] w-full">
                    <img src="<?= IMAGES ?>track_package.png" class="inline-block w-3 h-3" alt="">
                    <p class="inline-block text-[14px] font-bold px-[5px] mb-1">Delivered</p>
                    <span class="text-xs font-normal font-sans text-gray-600 float-right">1:30pm</span>
                </div>
                <div class="pb-2 px-[14px] ml-2 border-l border-yellowColor">
                    <p class="text-xs font-medium font-sans text-black">Item successfully delivered
                    </p>
                </div>
                <div class="p-[2px] w-full">
                    <img src="<?= IMAGES ?>track_package.png" class="inline-block w-3 h-3" alt="">
                    <p class="inline-block text-[14px] font-bold px-[5px] mb-1">On the way</p>
                    <span class="text-xs font-normal font-sans text-gray-600 float-right">1:30pm</span>
                </div>
                <div class="pb-2 px-[14px] ml-2 border-l border-yellowColor">
                    <p class="text-xs font-medium font-sans text-black">Driver 1 is on the way to the delivery
                        address now
                    </p>
                </div>
                <div class="p-[2px] w-full">
                    <img src="<?= IMAGES ?>track_package.png" class="inline-block w-3 h-3" alt="">
                    <p class="inline-block text-[14px] font-bold px-[5px] mb-1">Picked Up</p>
                    <span class="text-xs font-normal font-sans text-gray-600 float-right">1:30pm</span>
                </div>
                <div class="pb-2 px-[14px] ml-2 border-l border-yellowColor">
                    <p class="text-xs font-medium font-sans text-black">Driver 1 just picked up the item
                        from Victor
                    </p>
                </div>
                <div class="p-[2px] w-full">
                    <img src="<?= IMAGES ?>track_package.png" class="inline-block w-3 h-3" alt="">
                    <p class="inline-block text-[14px] font-bold px-[5px] mb-1">Driving to pickup</p>
                    <span class="text-xs font-normal font-sans text-gray-600 float-right">1:30pm</span>
                </div>
                <div class="pb-2 px-[14px] ml-2 border-l border-yellowColor">
                    <p class="text-xs font-medium font-sans text-black">
                        Driver 1 is driving to pickup order from Victor
                    </p>
                </div>

                <div class="p-[2px] w-full">
                    <img src="<?= IMAGES ?>track_package.png" class="inline-block w-3 h-3" alt="">
                    <p class="inline-block text-[14px] font-bold px-[5px] mb-1">Start</p>
                    <span class="text-xs font-normal font-sans text-gray-600 float-right">1:30pm</span>
                </div>
                <div class="pb-2 px-[14px] ml-2 flex justify-between items-center w-full">
                    <p class="text-xs font-medium font-sans text-black">Your order has been received and processed
                    </p>
                </div>
            </div>
            <div class="bg-gray-400/50 h-[1px]"></div>
            <div class="my-5">
                <h3 class="text-left font-semibold font-sans">Order 111 (3 Items)</h3>
                <ul class="text-left mx-8 my-2 font-sans font-light text-sm leading-5">
                    <li class="list-disc">Rice</li>
                    <li class="list-disc">Beans</li>
                    <li class="list-disc">Garri</li>
                </ul>
            </div>
        </div>
    </section>


</body>

<footer class="bottom-0 fixed left-40 w-[90%] px-10 mx-auto">
    <p class="text-right text-xs text-gray-400 font-light leading-relaxed">2023 Swift Deliva. All Right Reserved</p>
    </section>
</footer>

</html>