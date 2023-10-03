<?= $this->view('includes/app_header', $data); ?>
<?= $this->view('includes/side_bar', $data) ?>
<!-- Section body -->
<section class="py-5 bg-gray-500/5 overflow-y-scroll h-screen fixed top-16 w-full !pl-[260px] text-center" id="content">
    <div class="flex justify-between items-center mx-auto md:flex-row border-b-2 border-b-gray-600/30 px-10">
        <h3 class="font-sans font-semibold leading-8 text-2xl mb-5"><?=$page_title?></h3>

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
                                        Customer Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Amount Paid
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Payment Method
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Payment Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="parcels" class="divide-y divide-gray-200 pacel_body">
                                <?php if (isset($payments)) : ?>
                                <?php foreach ($payments as $pay) : ?>
                                <tr class="parcel_row">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">
                                        <?= $pay->fullName ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                                        <?= $pay->paymentAmount ?></td>
                                    <td class="px-6 py-4 whitespace
                                    -nowrap text-sm text-gray-800 ">
                                        <?= $pay->paymentMethod ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                                        <?= $pay->date ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else : ?>
                                <tr>
                                    <!-- - No pacel found --->
                                    <td colspan="10">
                                        <div
                                            class="flex flex-col items-center justify-center w-1/2 mx-auto space-y-2 p-5">
                                            <img src="<?= IMAGES ?>money.png" alt="">
                                            <h3
                                                class="font-sans text-2xl text-center leading-normal font-semibold text-gray-900/70">
                                                Nothing to
                                                see
                                                yet</h3>
                                            <p class="text-center text-[17px] leading-normal font-sans"> When payment is
                                                made you return here
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