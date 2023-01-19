<div>
    <div class="md:flex md:space-x-14">
        <div class="lg:mt-9 mt-5">

            <!-- course description -->
            <div class="space-y-5">
                <div>
                    <h3 class="font-semibold mb-2 text-xl"> Description </h3>
                    <p>
                        <?php echo $description; ?>
                    </p>
                </div>

                <!-- course Reviews -->
                <!--<div class="flex space-x-5 my-8" id="reviews">
                    <div class="w-full">
                        <div class="bg-blue-100 p-4 rounded-md border border-blue-200 text-center shadow-xs">
                            <h1 class="leading-none text-6xl"> <?php /*echo $review; */?></h1>
                            <div class="flex justify-center">
                                <?php
/*                                $star = (int)$review;
                                for ($i = 0; $i < $star; $i++) {
                                    */?>
                                    <svg class="w-5 h-5" fill="currentColor"
                                         viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <?php
/*                                }
                                for ($j = 0; $j < 5 - $star; $j++) {
                                    */?>
                                    <svg class="w-5 h-5 text-gray-400"
                                         fill="currentColor"
                                         viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <?php
/*                                }
                                */?>
                            </div>
                            <h5 class="text-base mb-0 mt-1 text-gray-800"> Company
                                Rating</h5>
                        </div>
                    </div>
                </div>-->
                <!--<div class="row">
                    <div class="col-lg-6">
                        <div class="w-full h-3 rounded-lg bg-gray-300 shadow-xs relative">
                            <div class="w-<?php /*echo $salary; */?>/12 h-3 rounded-lg bg-gray-800"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="flex">
                            <span class="ml-2"> Income Salary - <?php /*echo $salary; */?>/10</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="w-full h-3 rounded-lg bg-gray-300 shadow-xs relative">
                            <div class="w-<?php /*echo $hours */?>/12 h-3 rounded-lg bg-gray-800"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="flex">
                            <span class="ml-2"> Hours are reasonable - <?php /*echo $hours */?>/10</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="w-full h-3 rounded-lg bg-gray-300 shadow-xs relative">
                            <div class="w-<?php /*echo $promotion; */?>/12 h-3 rounded-lg bg-gray-800"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="flex">
                            <span class="ml-2"> Promotion Prospect - <?php /*echo $promotion; */?>/10</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="w-full h-3 rounded-lg bg-gray-300 shadow-xs relative">
                            <div class="w-<?php /*echo $happiness; */?>/12 h-3 rounded-lg bg-gray-800"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="flex">
                            <span class="ml-2">Happiness - <?php /*echo $happiness; */?>/10</span>
                        </div>
                    </div>
                </div>-->
                <div>
                    <h3 class="font-semibold mb-2 text-xl"> Income </h3>
                    <ul class="grid md:grid-cols-1">
                        <li><i class="uil-check text-xl font-bold mr-2"></i>
                            Company Establishment Year: <?php echo $experience; ?>
                        </li>
                        <li><i class="uil-check text-xl font-bold mr-2"></i>Monthly
                            Average Income: <?php echo $monthly_income; ?>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-xl mb-2"> Location of Company:</h3>
                    <ul class="list-disc ml-5">
                        <li><?php echo $location; ?></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-2 text-xl"> Reasonable working
                        Hours: </h3>
                    <p> <?php echo $working_hour ?></p>
                </div>
                <div>
                    <h3 class="font-semibold mb-2 text-xl"> Reasonable working
                        Days: </h3>
                    <p> <?php echo $working_day ?></p>
                </div>

                <p>Do you fell any of the informations here need to change? <a href="mailto:official@secrery.nftprj.com" style="color: #5c5cef">Contact Us</a></p>
            </div>


        </div>
    </div>
</div>