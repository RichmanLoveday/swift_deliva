<?= $this->view('includes/header', $data); ?>
<!--- Hero section -->
<section class="w-full">
    <div class="slider">
        <!-- slide 1 -->
        <div class="slide">
            <!--- Text -->
            <div class="mt-[30%] md:mt-0 md:flex flex-col md:justify-around items-center md:flex-row md:p-16">
                <div class="basis-[45%] px-16 md:px-0 pb-5 md:text-left">
                    <h3 class="md:text-5xl text-3xl font-sans font-bold">Easy & Stress
                        free
                        Logistics
                        <span class="text-yellowColor"> Service</span>
                    </h3>
                    <p class="mt-5 mb-7">
                        Swift Deliva helps businesses set up themselves and easily <br> manage deliverables to
                        customers with their own drivers or
                        3rd party services.
                    </p>
                    <!--- Link -->
                    <a href="#" class="border border-yellowColor px-9 py-3 rounded-md bg-yellowColor text-white transition duration-150 hover:ease-in ">Start
                        for free
                        <img class="inline-block ml-3 " src="<?= IMAGES . 'long_arrow.svg' ?>" alt="">
                    </a>
                </div>

                <!--- Image -->
                <div class="hidden md:block basis-[45%]">
                    <img class="w-full h-full object-cover" src="<?= IMAGES . 'delivery_man.png' ?>" alt="" srcset="">
                </div>

            </div>
        </div>

        <div class="slide">
            <!--- Text -->
            <div class="mt-[30%] md:mt-0 md:flex flex-col md:justify-around items-center md:flex-row md:p-16">
                <div class="basis-[45%] px-16 md:px-0 pb-5 md:text-left">
                    <h3 class="md:text-5xl text-3xl font-sans font-bold">Easy & Stress free
                        Logistics
                        <span class="text-yellowColor"> Service</span>
                    </h3>
                    <p class="mt-5 mb-7">
                        Swift Deliva helps businesses set up themselves and easily <br> manage deliverables to
                        customers with their own drivers or
                        3rd party services.
                    </p>
                    <!--- Link -->
                    <a href="#" class="border border-yellowColor px-9 py-3 rounded-md bg-yellowColor text-white transition duration-150 hover:ease-in ">Start
                        for free
                        <img class="inline-block ml-3" src="<?= IMAGES . 'long_arrow.svg' ?>" alt="">
                    </a>
                </div>

                <!--- Image -->
                <div class="hidden md:block basis-[45%]">
                    <img class="" src="<?= IMAGES . 'delivery_man.png' ?>" alt="" srcset="">
                </div>

            </div>

        </div>


        <!-- Control buttons -->
        <button class="btn btn-next top-[35%] right-[0%] rounded-l-full flex justify-center items-center">
            <img src="<?= IMAGES . 'arrow_right.svg' ?>" alt="" srcset="">
        </button>
        <button class="btn btn-prev top-[35%] left-[0%] rounded-r-full flex justify-center items-center">
            <img src="<?= IMAGES . 'arrow_left.svg' ?>" alt="">
        </button>
    </div>
    <!--- Line --->
    <div class="container__limiter mx-auto border border-gray-200 -mt-7"></div>
</section>


<!--- Serivices -->
<section class="mt-14">
    <h3 class="text-center text-4xl font-sans font-bold">Our services</h3>

    <div class="container__limiter mx-auto flex flex-col md:flex-row justify-around items-start md:px-20 md:py-10 mt-5 mb-10 ">
        <div class="space-y-4 services_tab w-full mb-8 md:mb-0 md:basis-[40%] ">
            <div class="px-2 py-5 border-l-2 border-yellowColor cursor-pointer service transition ease-linear duration-200" data-target="tab-1">
                <h1 class="text-left font-semibold font-sans service" data-target="tab-1">Courier Services</h1>
            </div>
            <div class="px-2 py-5 cursor-pointer service transition ease-linear duration-200" data-target="tab-2">
                <h1 class="text-left font-semibold font-sans service" data-target="tab-2">Interstate deliveries
                </h1>
            </div>
            <div class="px-2 py-5 cursor-pointer service transition ease-linear duration-200" data-target="tab-3">
                <h1 class="text-left font-semibold font-sans service" data-target="tab-3">Iinternational
                    Deliveries</h1>
            </div>
        </div>

        <div class="parcel_img w-full md:basis-[40%]">
            <div class="max-w-lg h-60 tab tab-1 rounded-lg transition ease-linear duration-200"><img class="w-full h-full object-center object-fill rounded-lg" src="<?= IMAGES . 'pacel1.jpg' ?>" alt="">
            </div>
            <div class="max-w-full h-60 tab tab-2 hidden rounded-lg transition ease-linear duration-200"><img class="w-full h-full object-center object-fill rounded-lg" src="<?= IMAGES . 'pacel2.jpg' ?>" alt="" srcset=""></div>
            <div class="max-w-full h-60 tab tab-3 hidden rounded-lg transition ease-linear duration-200"><img class="w-full h-full object-center object-fill rounded-lg" src="<?= IMAGES . 'parcel3.jpg' ?>" alt="">
            </div>
        </div>
    </div>
</section>

<!--- How it works --->
<section class="mt-20 mb-20">
    <h3 class="text-center font-sans font-bold text-3xl">Here is how it works</h3>
    <h1 class="text-center font-sans opacity-60 text-gray-600 text-xl">In 3 easy steps</h1>

    <!--- Video -->
    <div class="mt-10 mx-10 mb-10 max-w-3xl md:mx-auto">
        <iframe class="w-full" height="391" src="https://www.youtube.com/embed/cNOKQIw81SE" title="Delivery Service Animated Promo Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>

    <div class="container__limiter mx-auto flex flex-wrap md:flex-row items-center justify-around md:p-0">
        <div class="p-5 md:p-10 md:w-1/2 flex justify-evenly space-x-9 md:space-x-2 items-start">
            <div class="h-5 w-5 p-6 flex justify-center items-center space-x-9 md:space-x-2 rounded-full bg-yellowColor font-bold font-sans text-2xl text-white">
                1</div>
            <div>
                <h2 class="text-left text-4xl font-semibold -ml-3">List items</h2>
                <ul class="list-disc font-sans text-gray-500 space-y-2  mt-2 text-left">
                    <li>List all items that needs to be moved</li>
                    <li>Specify the dimentions and weights of the object</li>
                    <li>Give as much additional informations as you can</li>
                    <li>Now request for your item pickup and drop</li>
                </ul>
            </div>
        </div>
        <div class="p-5 md:p-10 md:w-1/2">
            <img src="<?= IMAGES . 'undraw_note_list_re_r4u9 1.png' ?>" alt="">
        </div>

        <div class="p-5 md:p-10 md:w-1/2">
            <img src="<?= IMAGES . 'undraw_order_delivered_re_v4ab 1.png' ?>" alt="">
        </div>
        <div class="p-5 md:p-10 md:w-1/2 flex justify-evenly space-x-9 md:space-x-2 items-start">
            <div class="h-5 w-5 p-6 flex justify-center items-center rounded-full bg-yellowColor font-bold font-sans text-2xl text-white">
                2</div>
            <div>
                <h2 class="text-left text-4xl font-semibold -ml-3">List items</h2>
                <ul class="list-disc font-sans text-gray-500 space-y-2  mt-2 text-left">
                    <li>List all items that needs to be moved</li>
                    <li>Specify the dimentions and weights of the object</li>
                    <li>Give as much additional informations as you can</li>
                    <li>Now request for your item pickup and drop</li>
                </ul>
            </div>
        </div>

        <div class="p-5 md:p-10 md:w-1/2 flex justify-evenly space-x-9 md:space-x-2 items-start">
            <div class="h-5 w-5 p-6 flex justify-center items-center rounded-full bg-yellowColor font-bold font-sans text-2xl text-white">
                3</div>
            <div>
                <h2 class="text-left text-4xl font-semibold -ml-3">List items</h2>
                <ul class="list-disc font-sans text-gray-500 space-y-2  mt-2 text-left">
                    <li>List all items that needs to be moved</li>
                    <li>Specify the dimentions and weights of the object</li>
                    <li>Give as much additional informations as you can</li>
                    <li>Now request for your item pickup and drop</li>
                </ul>
            </div>
        </div>
        <div class="p-5 md:p-10 md:w-1/2">
            <img src="<?= IMAGES . 'undraw_order_ride_re_372k 1.png' ?>" alt="">
        </div>

    </div>
</section>

<!--- Testimonial -->
<section class="bg-yellowColor p-5">
    <div class="testimonial_slider md:max-w-xl mx-auto h-[450px] pb-5 pt-5 relative overflow-hidden">
        <h3 class="text-center text-3xl font-bold font-sans text-white">Clients Testimonials</h3>
        <div class="test_slide w-full absolute transition ease-linear duration-300">
            <div>
                <div class="max-w-sm mx-auto mt-5">
                    <img class="w-40 h-40 mx-auto shadow-sm rounded-full object-cover" src="<?= IMAGES . 'human_face.jpg' ?>" alt="">
                </div>
                <h1 class="w-1/2 mx-auto font-sans text-center text-white md:text-2xl pb-3 mt-5 mb-5 font-semibold border-b border-white">
                    Richman Loveday</h1>
                <p class="text-center text-white text-[13px] md:text-[15px] font-sans font-thin leading-tight">
                    Swift Deliva
                    is
                    a game-changer for my business.
                    Their
                    reliable
                    and speedy
                    parcel delivery
                    services, along with a
                    user-friendly platform, have exceeded my expectations. The attentive couriers, attention to
                    detail, and competitive
                    pricing make them my top choice. With Swift Deliva, my business has experienced significant
                    growth and customer
                    satisfaction.
                </p>
            </div>
        </div>

        <div class="test_slide w-full absolute transition ease-linear duration-300">
            <div>
                <div class="max-w-sm mx-auto mt-5">
                    <img class="w-40 h-40 mx-auto shadow-sm rounded-full object-cover" src="<?= IMAGES . 'human_face2.jpg' ?>" alt="">
                </div>
                <h1 class="w-1/2 mx-auto font-sans text-center text-white md:text-2xl pb-3 mt-5 mb-5 font-semibold border-b border-white">
                    Richman Loveday</h1>
                <p class="text-center text-white text-[13px] md:text-[15px] font-sans font-thin leading-tight">
                    Swift Deliva
                    is
                    a game-changer for my business.
                    Their
                    reliable
                    and speedy
                    parcel delivery
                    services, along with a
                    user-friendly platform, have exceeded my expectations. The attentive couriers, attention to
                    detail, and competitive
                    pricing make them my top choice. With Swift Deliva, my business has experienced significant
                    growth and customer
                    satisfaction.
                </p>
            </div>
        </div>

        <div class="test_slide w-full absolute transition ease-linear duration-300">
            <div>
                <div class="max-w-sm mx-auto mt-5">
                    <img class="w-40 h-40 mx-auto shadow-sm rounded-full object-cover" src="images/human_face3.jpg" alt="">
                </div>
                <h1 class="w-1/2 mx-auto font-sans text-center text-white md:text-2xl pb-3 mt-5 mb-5 font-semibold border-b border-white">
                    Richman Loveday</h1>
                <p class="text-center text-white text-[13px] md:text-[15px] font-sans font-thin leading-tight">
                    Swift Deliva
                    is
                    a game-changer for my business.
                    Their
                    reliable
                    and speedy
                    parcel delivery
                    services, along with a
                    user-friendly platform, have exceeded my expectations. The attentive couriers, attention to
                    detail, and competitive
                    pricing make them my top choice. With Swift Deliva, my business has experienced significant
                    growth and customer
                    satisfaction.
                </p>
            </div>
        </div>

        <!--- Buttons --->
        <button class="btn-prev-test absolute top-1/3 left-2 md:left-8 w-12 h-12 bg-white rounded-full shadow-md flex justify-center items-center hover:scale-105 transition ease-linear"><img src="<?= IMAGES . 'arrow-left.png' ?>" alt="" srcset=""></button>
        <button class="btn-next-test absolute top-1/3 right-2 md:right-8 w-12 h-12 bg-white rounded-full shadow-md flex justify-center items-center hover:scale-105 transition ease-linear"><img src="<?= IMAGES . 'arrow-right.png' ?>" alt="" srcset=""></button>
    </div>
</section>

<!--- Why choose us --->
<section class="bg-[#F7F7F7]">
    <h3 class="text-center font-sans text-3xl font-bold pt-10">Why Choose Us</h3>

    <div class="container__limiter mx-auto flex flex-col items-start p-10 md:px-20 justify-center md:justify-around space-y-5 md:space-y-0 md:space-x-16 md:flex-row">
        <div class="w-full md:w-1/3 flex justify-center items-center flex-col space-y-3 p-5 py-10 bg-white rounded-xl shadow-lg">
            <img src="<?= IMAGES . 'hand_shake.png' ?>" alt="">
            <h2 class="text-center font-sans font-bold text-2xl">Reliablity & <br> Timely Deliveries</h2>
            <p class=" text-center text-[15px] font-sans leading-relaxed text-[#757575]">
                At our parcel delivery website, we prioritize reliability and timeliness. We understand the
                importance of getting your
                packages to their destination on time.
            </p>
        </div>
        <div class="w-full md:w-1/3 flex justify-center items-center flex-col space-y-3 p-5 py-10 bg-white rounded-xl shadow-lg">
            <img src="<?= IMAGES . 'flag.png' ?>" alt="">
            <h2 class="text-center font-sans font-bold text-2xl">Reliablity & <br> Timely Deliveries</h2>
            <p class=" text-center font-sans text-[15px] leading-relaxed text-[#757575]">
                We understand the value and importance of your shipments, which is why we go the extra mile to
                ensure their safety
                throughout the entire journey.
            </p>
        </div>
        <div class="w-full md:w-1/3 flex justify-center items-center flex-col space-y-3 p-5 py-10 bg-white rounded-xl shadow-lg">
            <img src="<?= IMAGES . 'honour.png' ?>" alt="">
            <h2 class="text-center font-sans font-bold text-2xl">Reliablity & <br> Timely Deliveries</h2>
            <p class=" text-center font-sans text-[15px] leading-relaxed text-[#757575]">
                We value our customers and prioritize excellent customer service. Our support team is readily
                available to assist you
                throughout the delivery process.
            </p>
        </div>
    </div>
</section>

<!--- Footer --->
<footer class="bg-[#363636]">
    <div class="container__limiter mx-auto flex flex-col md:flex-row justify-around items-start md:space-x-10  md:p-10">
        <div class="md:w-1/4 space-y-5 p-5">
            <img src="<?= IMAGES . 'Logo_white.png' ?>" alt="">
            <p class="text-left font-sans text-[#CFCFCF] text-[15px]">Nwaniba, Uyo, Akwa Ibom State.
                info@swiftdeliva.com
                07055553109,
                09045553109
            </p>
            <div class="flex flex-col justify-center space-y-2">
                <a href="#" class="font-sans text-[12px] text-yellowColor">Terms and Conditions</a>
                <a href="#" class="font-sans text-[12px] text-yellowColor">Privacy Policies</a>
                <a href="#" class="font-sans text-[12px] text-yellowColor">Cookie Settings</a>
            </div>
            <div class="flex justify-start flex-row space-x-2">
                <a href="#">
                    <img src="<?= IMAGES . 'facebook.svg' ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?= IMAGES . 'twitter.svg' ?>images/twitter.svg" alt="" srcset="">
                </a>
                <a href="#">
                    <img src="<?= IMAGES . 'instagram.svg' ?>" alt="" srcset="">
                </a>
            </div>
        </div>
        <div class="md:w-[60%] flex flex-wrap md:flex-row space-y-5 md:space-y-0 space-x-12 md:space-x-24 p-10">
            <div class="space-y-3">
                <h1 class="text-left text-[15px] font-bold font-sans text-white">Company</h1>
                <div class="flex flex-col justify-center space-y-6">
                    <a href="#" class="font-sans text-[12px] font-thin text-white transition ease-linear duration-200 hover:translate-x-1">About</a>
                    <a href="#" class="font-sans text-[12px] font-thin text-white transition ease-linear duration-200 hover:translate-x-1">Mission</a>
                    <a href="#" class="font-sans text-[12px] font-thin text-white transition ease-linear duration-200 hover:translate-x-1">Vision</a>
                    <a href="#" class="font-sans text-[12px] font-thin text-white transition ease-linear duration-200 hover:translate-x-1">Join
                        Our webinar</a>
                </div>
            </div>
            <div class="space-y-3">
                <h1 class="text-left text-[15px] font-bold font-sans text-white">Quick Links</h1>
                <div class="flex flex-col justify-center space-y-6">
                    <a href="#" class="font-sans text-[12px] font-thin text-white transition ease-linear duration-200 hover:translate-x-1">Search
                        Deliveries</a>
                    <a href="#" class="font-sans text-[12px] font-thin text-white transition ease-linear duration-200 hover:translate-x-1">How
                        it works</a>
                    <a href="#" class="font-sans text-[12px] font-thin text-white transition ease-linear duration-200 hover:translate-x-1">Help</a>
                    <a href="#" class="font-sans text-[12px] font-thin text-white transition ease-linear duration-200 hover:translate-x-1">FaQs</a>
                </div>
            </div>
            <div class="space-y-3">
                <h1 class="text-left text-[15px] font-bold font-sans text-white">Resources</h1>
                <div class="flex flex-col justify-center space-y-6">
                    <a href="#" class="font-sans text-[12px] font-thin text-white transition ease-linear duration-200 hover:translate-x-1">Partner
                        program</a>
                    <a href="#" class="font-sans text-[12px] font-thin text-white transition ease-linear duration-200 hover:translate-x-1">Pricing</a>
                    <a href="#" class="font-sans text-[12px] font-thin text-white transition ease-linear duration-200 hover:translate-x-1">Our
                        services</a>
                    <a href="#" class="font-sans text-[12px] font-thin text-white transition ease-linear duration-200 hover:translate-x-1">Our
                        Branches</a>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>

</html>