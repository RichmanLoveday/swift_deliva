<!-- Sidenav -->
<section id="sidenav-2"
    class="fixed left-0 top-16 z-[600] h-screen w-60 -translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='false']:translate-x-0 pt-10"
    data-te-sidenav-init data-te-sidenav-hidden="false" data-te-sidenav-mode="side" data-te-sidenav-content="#content">
    <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
        <li class="relative">
            <a href="<?= ROOT ?>dashboard"
                class="flex group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear hover:text-inherit hover:outline-none focus:bg-yellowColor focus:text-inherit focus:outline-none active:bg-yellowColor hover:bg-yellow-500 hover:text-white active:text-white active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref>
                <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                </span>
                <span>Dashboard</span>
                <span
                    class="absolute group-hover:translate-x-[5px] right-0 ml-auto mr-[0.8rem] transition-transform duration-300 ease-linear motion-reduce:transition-none [&>svg]:text-gray-600 rotate-[270deg]"
                    data-te-sidenav-rotate-icon-ref>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </a>
        </li>
        <?php if($role == ADMIN || $role == CUSTOMER): ?>
        <li class="relative">
            <a href="<?= ROOT ?>packages"
                class="flex group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear  hover:bg-yellow-500 hover:text-white hover:text-inherit hover:outline-none focus:bg-yel focus:text-inherit focus:outline-none active:bg-yellowColor active:text-white active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref>
                <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400">
                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                </span>
                <span>Create Package</span>
                <span
                    class="absolute group-hover:translate-x-[5px] right-0 ml-auto mr-[0.8rem] transition-transform duration-300 ease-linear motion-reduce:transition-none [&>svg]:text-gray-600 rotate-[270deg]"
                    data-te-sidenav-rotate-icon-ref>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </a>
        </li>
        <?php endif; ?>
        <?php if($role == DRIVER): ?>
        <li class="relative">
            <a href="<?= ROOT ?>dispatch"
                class="flex group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear  hover:bg-yellow-500 hover:text-white hover:text-inherit hover:outline-none focus:bg-yellowColor focus:text-inherit focus:outline-none active:bg-yellowColor active:text-white active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref>
                <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                </span>
                <span>Dispatch</span>
                <span
                    class="absolute group-hover:translate-x-[5px] right-0 ml-auto mr-[0.8rem] transition-transform duration-300 ease-linear motion-reduce:transition-none [&>svg]:text-gray-600 rotate-[270deg]"
                    data-te-sidenav-rotate-icon-ref>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </a>
        </li>
        <?php endif; ?>

        <?php if($role == ADMIN || $role == SUPER_ADMIN): ?>
        <li class="relative">
            <a href="<?= ROOT ?>order"
                class="flex group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear  hover:bg-yellow-500 hover:text-white hover:text-inherit hover:outline-none focus:bg-yel focus:text-inherit focus:outline-none active:bg-yellowColor active:text-white active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref>
                <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </span>
                <span>Manage Orders</span>
                <span
                    class="absolute group-hover:translate-x-[5px] right-0 ml-auto mr-[0.8rem] transition-transform duration-300 ease-linear motion-reduce:transition-none [&>svg]:text-gray-600 rotate-[270deg]"
                    data-te-sidenav-rotate-icon-ref>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </a>
        </li>
        <li class="relative">
            <a href="<?= ROOT ?>drivers"
                class="flex group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear  hover:bg-yellow-500 hover:text-white hover:text-inherit hover:outline-none focus:bg-yel focus:text-inherit focus:outline-none active:bg-yellowColor active:text-white active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref>
                <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400">
                    <i class="fa fa-car" aria-hidden="true"></i>
                </span>
                <span>Manage Drivers</span>
                <span
                    class="absolute group-hover:translate-x-[5px] right-0 ml-auto mr-[0.8rem] transition-transform duration-300 ease-linear motion-reduce:transition-none [&>svg]:text-gray-600 rotate-[270deg]"
                    data-te-sidenav-rotate-icon-ref>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </a>
        </li>
        <li class="relative">
            <a href="<?= ROOT ?>orders/payments"
                class="flex group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear  hover:bg-yellow-500 hover:text-white hover:text-inherit hover:outline-none focus:bg-yel focus:text-inherit focus:outline-none active:bg-yellowColor active:text-white active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref>
                <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400">
                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                </span>
                <span>Payments</span>
                <span
                    class="absolute group-hover:translate-x-[5px] right-0 ml-auto mr-[0.8rem] transition-transform duration-300 ease-linear motion-reduce:transition-none [&>svg]:text-gray-600 rotate-[270deg]"
                    data-te-sidenav-rotate-icon-ref>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </a>
        </li>
        <li class="relative">
            <a href="<?= ROOT ?>history"
                class="flex group h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear  hover:bg-yellow-500 hover:text-white hover:text-inherit hover:outline-none focus:bg-yel focus:text-inherit focus:outline-none active:bg-yellowColor active:text-white active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none"
                data-te-sidenav-link-ref>
                <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400">
                    <i class="fa fa-history" aria-hidden="true"></i>
                </span>
                <span>History</span>
                <span
                    class="absolute group-hover:translate-x-[5px] right-0 ml-auto mr-[0.8rem] transition-transform duration-300 ease-linear motion-reduce:transition-none [&>svg]:text-gray-600 rotate-[270deg]"
                    data-te-sidenav-rotate-icon-ref>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </a>
        </li>
        <?php endif; ?>
    </ul>
</section>
<!-- Sidenav -->