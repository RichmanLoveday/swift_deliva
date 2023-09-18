<?= $this->view('includes/app_header', $data); ?>
<?= $this->view('includes/side_bar', $data) ?>
<!-- Section body -->
<section class="py-5 bg-gray-500/5 overflow-y-scroll h-screen fixed top-16 w-full !pl-[260px] text-center" id="content">
    <div class="flex justify-between items-center mx-auto md:flex-row border-b-2 border-b-gray-600/30 px-10">
        <h3 class="font-sans font-semibold leading-8 text-2xl"><?= $page_title ?></h3>
        <div class="flex justify-around items-center space-x-4 p-4">
            <div class="flex justify-center items-center">
                <img class="border h-8 border-gray-500/50 py-[8px] pl-[8px] rounded-l-md border-r-0"
                    src="<?= IMAGES ?>search.png" alt="">
                <input
                    class="h-8 focus:outline-none  focus:border-gray-500/50 focus:ring-0 border-0 border-y border-r border-r-gray-500/50 border-y-gray-500/50 rounded-r-md bg-gray-500/0"
                    id="search" type="text" placeholder="Search pascel">
            </div>
            <a href=" #" data-te-toggle="modal" data-te-target="#registerDriver" data-te-ripple-init
                data-te-ripple-color="light"
                class="border border-yellowColor px-3 py-1 text-center w-full rounded-lg bg-yellowColor text-white transition duration-150 hover:ease-in"><img
                    src="<?= IMAGES ?>Add.png" class="inline-block -mt-1 mr-1" alt=""> Register Driver</a>
        </div>
    </div>

    <div class="mt-5 px-2 mb-10 ">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-hidden">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-scroll h-screen ">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-500/5">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Driver Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Phone Number
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody id="drivers" class="divide-y divide-gray-200">
                                <?php if (isset($drivers) && is_array($drivers)) : ?>
                                <?php foreach ($drivers as $driver) : ?>
                                <?php
                                        $statusCol = '';
                                        $status = '';
                                        $display = '';
                                        $showDisable = '';
                                        $showEnable = '';
                                        
                                        if ($driver->status ==  0) {
                                            $statusCol = 'warning';
                                            $status = 'offline';
                                            $display = 'block';
                                            $showDisable = 'block';
                                            $showEnable = 'hidden';                
                                        }

                                        if ($driver->status == 1) {
                                            $statusCol = 'success';
                                            $status = 'on-duty';
                                            $display = 'block';
                                            $showDisable = 'block';
                                            $showEnable = 'hidden'; 
                                        }

                                        if($driver->status == 3) {
                                            $statusCol = 'danger';
                                            $status = 'disabled';
                                            $display = 'hidden';
                                            $showDisable = 'hidden';
                                            $showEnable = 'block';
                                        }

                                        
                                ?>
                                <tr class="row_datas">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800  row_fullname">
                                        <?= $driver->fullName ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800  row_phone">
                                        <?= $driver->phone ?? 'N/A' ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800  row_email">
                                        <?= $driver->email ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800  row_status">
                                        <span
                                            class="inline-block whitespace-nowrap rounded-[0.27rem] bg-<?= $statusCol ?>-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-<?= $statusCol ?>-700">
                                            <?= $status ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="relative" data-te-dropdown-ref>
                                            <button class="" type="button" id="dropdownMenuButton1"
                                                data-te-dropdown-toggle-ref aria-expanded="false" data-te-ripple-init
                                                data-te-ripple-color="light">
                                                <img src="<?= IMAGES ?>dropdown.png" alt="">
                                            </button>
                                            <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg [&[data-te-dropdown-show]]:block"
                                                aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                                                <li>
                                                    <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 view_details"
                                                        href="#" data-te-dropdown-item-ref data-te-toggle="modal"
                                                        data-url="<?= ROOT ?>drivers/view_details"
                                                        data-id="<?= $driver->driverName ?>"
                                                        data-te-target="#viewDetails" data-te-ripple-init
                                                        data-te-ripple-color="light"><img
                                                            src="<?= IMAGES ?>view_details.png"
                                                            class="inline-block h-5 w-5 mr-2 -mt-1" alt="">View Details
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 edit_driver"
                                                        disa href="#" data-te-dropdown-item-ref data-te-toggle="modal"
                                                        data-id="<?= $driver->driverName ?>"
                                                        data-url="<?= ROOT ?>drivers/view_details"
                                                        data-te-target="#registerDriver" data-te-ripple-init
                                                        data-te-ripple-color="light"><img src="<?= IMAGES ?>edit.png"
                                                            class="inline-block h-5 w-5 mr-2 -mt-1" alt="">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 reset_password"
                                                        data-te-dropdown-item-ref data-te-toggle="modal"
                                                        data-id="<?= $driver->driverName ?>"
                                                        data-url="<?= ROOT ?>drivers/reset_password"
                                                        data-te-target="#resetPassword" data-te-ripple-init
                                                        data-te-ripple-color="light"><img src="<?= IMAGES ?>padlock.png"
                                                            class="inline-block h-5 w-5 -mt-1 mr-1" alt="">
                                                        Reset Password
                                                    </a>
                                                </li>
                                                <li class="<?=$showEnable?>">
                                                    <a onclick="enable_driver(this)" class="block w-full whitespace-nowrap bg-transparent
                                                    px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100
                                                    active:text-neutral-800 active:no-underline
                                                    disabled:pointer-events-none disabled:bg-transparent
                                                    disabled:text-neutral-400" href="#" data-te-dropdown-item-ref
                                                        data-id="<?= $driver->driverName ?>"
                                                        data-url="<?= ROOT ?>drivers/enable_driver"><img
                                                            src="<?= IMAGES ?>permit.png"
                                                            class="inline-block h-5 w-5 -mt-1 mr-1" alt="">
                                                        Enable
                                                    </a>
                                                </li>
                                                <li class="<?=$showDisable?>">
                                                    <a onclick="disable_driver(this)"
                                                        class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400"
                                                        href="#" data-te-dropdown-item-ref
                                                        data-id="<?= $driver->driverName ?>"
                                                        data-url="<?= ROOT ?>drivers/disable_driver"><i
                                                            class="fa fa-ban text-yellowColor mr-2"
                                                            aria-hidden="true"></i>
                                                        Disable
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 delete_driver"
                                                        href="#" data-te-dropdown-item-ref
                                                        data-id="<?= $driver->driverName ?>"
                                                        data-url="<?= ROOT ?>drivers/delete_driver"><i
                                                            class="fa fa-trash text-yellowColor mr-2"
                                                            aria-hidden="true"></i>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else : ?>
                                <tr class="empty_carrier">
                                    <td colspan="5">
                                        <div
                                            class="flex flex-col items-center justify-center w-1/2 mx-auto space-y-2 p-5">
                                            <img src="<?= IMAGES ?>carrier.png" alt="">
                                            <h3
                                                class="font-sans text-2xl text-center leading-normal font-semibold text-gray-900/70">
                                                Nothing to
                                                see
                                                yet</h3>
                                            <p class="text-center text-[17px] leading-normal font-sans">Have a Driver
                                                registered
                                                first
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>


<!---- My modals -->
<section>
    <?= $this->view('includes/modals/registerDriver', $data); ?>
    <?= $this->view('includes/modals/driverDetails', $data); ?>
    <?= $this->view('includes/modals/resetDriverPassword', $data); ?>
</section>
<?= $this->view('includes/footer', $data) ?>
<!-- Section body -->