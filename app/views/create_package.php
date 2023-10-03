<?= $this->view('includes/app_header', $data); ?>
<?= $this->view('includes/side_bar', $data) ?>
<!-- Section body -->
<section class="py-5 bg-gray-500/5 overflow-y-scroll h-screen fixed top-16 w-full !pl-[260px] text-center" id="content">
    <div class="flex justify-between items-center mx-auto md:flex-row border-b-2 border-b-gray-600/30 px-10">
        <h3 class="font-sans font-semibold leading-8 text-2xl"><?=$page_title?></h3>
        <div class="flex justify-around items-center space-x-4 p-4">
            <a onclick="changeBtn()" href=" #" data-te-toggle="modal" data-te-target="#createPackage"
                data-te-ripple-init data-te-ripple-color="light"
                class="border border-yellowColor px-3 py-1 text-center w-full rounded-lg bg-yellowColor text-white transition duration-150 hover:ease-in "><img
                    src="<?= IMAGES ?>Add.png" class="inline-block -mt-1 mr-1" alt=""> Create Pascel</a>
        </div>
    </div>

    <div class="mt-5 px-2 mb-32">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-scroll">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border overflow-y-visible">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-500/5">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Package Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Recipent Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Recipent contact
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Pickup Date
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Delivery Date
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Delivery Location
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Payment Method
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
                            <tbody id="parcels" class="divide-y divide-gray-200 pacel_body">
                                <?php if (isset($pacakges)) : ?>
                                <?php foreach ($pacakges as $package) : ?>
                                <tr class="parcel_row">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">
                                        <?= $package->packageDescription ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                                        <?= $package->receiverName ?></td>
                                    <td class="px-6 py-4 whitespace
                                    -nowrap text-sm text-gray-800 ">
                                        <?= $package->receiverContact ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                                        <?= $package->pickUpDate ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                                        <?= $package->deliveryDate ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                                        <?= $package->receiverAddress ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                                        <?= $package->paymentMethod ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                                        <span
                                            class="inline-block whitespace-nowrap rounded-[0.27rem] bg-<?= $package->statusCol ?>-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-<?= $package->statusCol ?>-700">
                                            <?= $package->packageStatus ?>
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
                                                cancel_parcaria-labelledby="dropdownMenuButton1"
                                                data-te-dropdown-menu-ref>
                                                <?php if ($package->packageStatus == 'pending') : ?>
                                                <li>
                                                    <a onclick="populate_package_form('<?=ROOT?>packages/retrive_package','<?=$package->packageID?>')"
                                                        data-url="<?= ROOT ?>edit_package"
                                                        class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 edit_parcel"
                                                        href="#" data-te-dropdown-item-ref data-te-toggle="modal"
                                                        data-te-target="#createPackage" data-te-ripple-init
                                                        data-te-ripple-color="light"><i
                                                            class="fa fa-pencil text-yellowColor mr-2"
                                                            aria-hidden="true"></i>Edit Package
                                                    </a>
                                                </li>
                                                <?php endif; ?>
                                                <li>
                                                    <a target="_blank"
                                                        href="<?= ROOT ?>packages/track_package/<?=$package->trackingID?>"
                                                        class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400"><img
                                                            src="<?= IMAGES ?>track.png" class="inline-block h-5 w-5"
                                                            alt="">Track package
                                                    </a>
                                                </li>
                                                <?php if ($package->packageStatus == 'pending') : ?>
                                                <li>
                                                    <a data-url="<?= ROOT ?>packages/cancel_order"
                                                        data-package="<?= $package->packageID ?>"
                                                        data-order="<?= $package->orderID ?>"
                                                        class="block cancel_parcel w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 el"
                                                        href="#" data-te-dropdown-item-ref><i
                                                            class="fa fa-ban text-yellowColor mr-2 "
                                                            aria-hidden="true"></i>Cancel Order</a>
                                                </li>
                                                <?php endif; ?>
                                                <?php if ($package->packageStatus == 'delivered' || $package->packageStatus == 'cancelled') : ?>
                                                <li>
                                                    <a data-url="<?= ROOT ?>packages/delete_package"
                                                        data-id="<?= $package->packageID ?>"
                                                        class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 delete_parcel"
                                                        href="#" data-te-dropdown-item-ref><i
                                                            class="fa fa-trash text-yellowColor mr-2"
                                                            aria-hidden="true"></i> Delete
                                                        Package</a>
                                                </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else : ?>
                                <tr>
                                    <!-- - No pacel found --->
                                    <td colspan="10">
                                        <div
                                            class="flex flex-col items-center justify-center w-1/2 mx-auto space-y-2 p-5">
                                            <img src="<?= IMAGES ?>empty_box.png" alt="">
                                            <h3
                                                class="font-sans text-2xl text-center leading-normal font-semibold text-gray-900/70">
                                                Nothing to
                                                see
                                                yet</h3>
                                            <p class="text-center text-[17px] leading-normal font-sans"> Create a parcel
                                                and we'll notify you when
                                                your package has
                                                been reviewed and acknowledged
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
    <?= $this->view('includes/modals/createPackageModal', $data); ?>
</section>
<?= $this->view('includes/footer', $data) ?>
<!-- Section body -->