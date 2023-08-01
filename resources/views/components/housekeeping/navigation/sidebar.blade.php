<nav id="sidebar-menu" x-description="Mobile menu" x-bind:aria-expanded="open"
     :class="{ 'w-64 md:w-0': open, 'w-0 md:w-64': !(open) }"
     class="fixed w-64 transition-all duration-500 ease-in-out h-screen bg-white dark:bg-gray-800 shadow-sm">
    <div class="h-full overflow-y-auto scrollbars">
        <!--logo-->
        <div class="mh-18 text-center py-5">
            <a href="#" class="relative flex justify-center">
                <img class="w-[60%]" src="https://camo.githubusercontent.com/7eee0fb997c509b4c3532420beeb9a90a89b64aca4110c846fdbd5cacf4f4062/68747470733a2f2f692e696d6775722e636f6d2f3965504e644a342e706e67" alt="">
            </a>
        </div>

        <!-- Sidebar menu -->
        <ul id="side-menu" x-data="{selected: 0}"
            class="w-full float-none flex flex-col font-medium ltr:pl-1.5 rtl:pr-1.5">
            <li>
                <a
                    :class="{ 'text-indigo-500 dark:text-gray-300': selected == 0 }"
                    class="block py-2.5 px-6 hover:text-indigo-500 dark:hover:text-gray-300"
                   href="calendar.html">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         class="inline-block h-4 w-4 ltr:mr-2 rtl:ml-2 bi bi-house-door" viewBox="0 0 16 16">
                        <path
                            d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                    </svg>
                    <!-- <i class="mr-2 fas fa-calendar-alt"></i> -->
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- dropdown -->
            <li class="relative">
                <a :class="{ 'text-indigo-500 dark:text-gray-300': selected == 1 }"
                   @click="selected !== 1 ? selected = 1 : selected = null"
                   class="block py-2.5 px-6 hover:text-indigo-500 dark:hover:text-gray-300"
                   href="javascript:;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         class="inline-block h-4 w-4 ltr:mr-2 rtl:ml-2 bi bi-house-door" viewBox="0 0 16 16">
                        <path
                            d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                    </svg>
                    <!-- <i class="ltr:mr-2 rtl:ml-2 fas fa-home"></i> -->
                    <span>Articles</span>
                    <!-- caret -->
                    <span class="inline-block ltr:float-right rtl:float-left">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     class="transform transition duration-300 mt-1.5 bi bi-chevron-down"
                                     :class="{ 'rotate-0': selected == 1, 'ltr:-rotate-90 rtl:rotate-90': !(selected == 1) }"
                                     width=".8rem" height=".8rem" viewBox="0 0 16 16">
									<path fill-rule="evenodd"
                                          d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
								</svg>
                        <!-- <i class="transform transition duration-300 fas fa-chevron-down" :class="{ 'rotate-0': selected == 1, 'ltr:-rotate-90 rtl:rotate-90': !(selected == 1) }"></i> -->
							</span>
                </a>

                <!-- dropdown menu -->
                <ul x-show="selected == 1" x-transition:enter="transition-all duration-200 ease-out"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    class="block rounded rounded-t-none top-full z-50 ltr:pl-7 rtl:pr-7 py-0.5 ltr:text-left rtl:text-right mb-1 font-normal">
                    <li class="relative">
                        <a class="text-indigo-500 dark:text-gray-300 block w-full py-2 px-6 clear-both whitespace-nowrap hover:text-indigo-500 dark:hover:text-gray-300"
                           href="index.html">All articles</a>
                    </li>
                    <li class="relative">
                        <a class="text-indigo-500 dark:text-gray-300 block w-full py-2 px-6 clear-both whitespace-nowrap hover:text-indigo-500 dark:hover:text-gray-300"
                           href="index.html">Create article</a>
                    </li>
                </ul>
            </li>

            <!-- dropdown -->
            <li class="relative">
                <a :class="{ 'text-indigo-500 dark:text-gray-300': selected == 2 }"
                   @click="selected !== 2 ? selected = 2 : selected = null"
                   class="block py-2.5 px-6 hover:text-indigo-500 dark:hover:text-gray-300"
                   href="javascript:;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         class="inline-block h-4 w-4 ltr:mr-2 rtl:ml-2 bi bi-list-nested" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    <!-- <i class="mr-2 fas fa-stream"></i> -->
                    <span>Multi Level</span>
                    <!-- caret -->
                    <span class="inline-block ltr:float-right rtl:float-left">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     class="transform transition duration-300 mt-1.5 bi bi-chevron-down"
                                     :class="{ 'rotate-0': selected == 2, 'ltr:-rotate-90 rtl:rotate-90': !(selected == 2) }"
                                     width=".8rem" height=".8rem" viewBox="0 0 16 16">
									<path fill-rule="evenodd"
                                          d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
								</svg>
                        <!-- <i class="transform transition duration-300 fas fa-chevron-down" :class="{ 'rotate-0': selected == 2, 'ltr:-rotate-90 rtl:rotate-90': !(selected == 2) }"></i> -->
							</span>
                </a>
                <ul x-show="selected == 2" x-transition:enter="transition-all duration-200 ease-out"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    class="block rounded rounded-t-none top-full z-50 ltr:pl-7 rtl:pr-7 py-0.5 ltr:text-left rtl:text-right mb-1 font-normal">
                    <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false"
                        @click.away="open = false">
                        <a :class="{ 'text-indigo-500': open }" @click="open = !open" aria-haspopup="true"
                           x-bind:aria-expanded="open" id="mobiledrop-91"
                           class="block py-2.5 px-6 hover:text-indigo-500 dark:hover:text-gray-300"
                           href="javascript:;">
                            Second Level
                            <!-- caret -->
                            <span class="inline-block ltr:float-right rtl:float-left">
										<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             class="transform transition duration-300 mt-1.5 bi bi-chevron-down"
                                             :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }"
                                             width=".8rem" height=".8rem" viewBox="0 0 16 16">
											<path fill-rule="evenodd"
                                                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
										</svg>
                                <!-- <i class="transform transition duration-300 fas fa-chevron-down" :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }"></i> -->
									</span>
                        </a>
                        <ul class="block rounded rounded-t-none top-full z-50 ltr:pl-7 rtl:pr-7 py-0.5 ltr:text-left rtl:text-right mb-1 font-normal"
                            x-show="open" x-transition:enter="transition-all duration-200 ease-out"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100" role="menu"
                            aria-orientation="vertical" aria-labelledby="mobiledrop-91">
                            <li class="relative">
                                <a class="block w-full py-2 px-6 clear-both whitespace-nowrap hover:text-indigo-500 dark:hover:text-gray-300"
                                   href="#">Item 1</a>
                            </li>
                            <li class="relative">
                                <a class="block w-full py-2 px-6 clear-both whitespace-nowrap hover:text-indigo-500 dark:hover:text-gray-300"
                                   href="#">Item 2</a>
                            </li>
                        </ul>
                    </li>
                    <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false"
                        @click.away="open = false">
                        <a :class="{ 'text-indigo-500': open }" @click="open = !open" aria-haspopup="true"
                           x-bind:aria-expanded="open" id="mobiledrop-92"
                           class="block py-2.5 px-6 hover:text-indigo-500 dark:hover:text-gray-300"
                           href="javascript:;">
                            Third Level
                            <!-- caret -->
                            <span class="inline-block ltr:float-right rtl:float-left">
										<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             class="transform transition duration-300 mt-1.5 bi bi-chevron-down"
                                             :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }"
                                             width=".8rem" height=".8rem" viewBox="0 0 16 16">
											<path fill-rule="evenodd"
                                                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
										</svg>
                                <!-- <i class="transform transition duration-300 fas fa-chevron-down" :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }"></i> -->
									</span>
                        </a>
                        <ul class="block rounded rounded-t-none top-full z-50 ltr:pl-7 rtl:pr-7 py-0.5 ltr:text-left rtl:text-right mb-1 font-normal"
                            x-show="open" x-transition:enter="transition-all duration-200 ease-out"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100" role="menu"
                            aria-orientation="vertical" aria-labelledby="mobiledrop-92">
                            <li class="relative">
                                <a class="block w-full py-2 px-6 clear-both whitespace-nowrap hover:text-indigo-500 dark:hover:text-gray-300"
                                   href="#">Item 1</a>
                            </li>
                            <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false"
                                @click.away="open = false">
                                <a :class="{ 'text-indigo-500': open }" @click="open = !open"
                                   aria-haspopup="true" x-bind:aria-expanded="open" id="mobiledrop-93"
                                   class="block py-2.5 px-6 hover:text-indigo-500 dark:hover:text-gray-300"
                                   href="javascript:;">
                                    <span> Item 2 </span>
                                    <!-- caret -->
                                    <span class="inline-block ltr:float-right rtl:float-left">
												<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                     class="transform transition duration-300 mt-1.5 bi bi-chevron-down"
                                                     :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }"
                                                     width=".8rem" height=".8rem" viewBox="0 0 16 16">
													<path fill-rule="evenodd"
                                                          d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
												</svg>
                                        <!-- <i class="transform transition duration-300 fas fa-chevron-down" :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }"></i> -->
											</span>
                                </a>
                                <ul class="block rounded rounded-t-none top-full z-50 ltr:pl-7 rtl:pr-7 py-0.5 ltr:text-left rtl:text-right mb-1 font-normal"
                                    x-show="open" x-transition:enter="transition-all duration-200 ease-out"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100" role="menu"
                                    aria-orientation="vertical" aria-labelledby="mobiledrop-93">
                                    <li class="relative">
                                        <a class="block w-full py-2 px-6 clear-both whitespace-nowrap hover:text-indigo-500 dark:hover:text-gray-300"
                                           href="#">Item 2.1</a>
                                    </li>
                                    <li class="relative">
                                        <a class="block w-full py-2 px-6 clear-both whitespace-nowrap hover:text-indigo-500 dark:hover:text-gray-300"
                                           href="#">Item 2.2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
