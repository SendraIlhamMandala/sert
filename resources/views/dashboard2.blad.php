<x-app-layout>


    <div id="__next">
        <div class="fixed z-50 top-0 w-full bg-white">
            <nav class="container flex justify-between items-center z-20">
                <div class="my-5 lg:my-6"><img src="/images/logo.svg" alt="easybank logo" /></div>
                <div class="hidden lg:block text-sm text-neutral-grayish-blue"><a
                        class="mx-3 py-5 hover:gradient-border-bottom" href="#">Home</a><a
                        class="mx-3 py-5 hover:gradient-border-bottom" href="#">About</a><a
                        class="mx-3 py-5 hover:gradient-border-bottom" href="#">Contact</a><a
                        class="mx-3 py-5 hover:gradient-border-bottom" href="#">Blog</a><a
                        class="mx-3 py-5 hover:gradient-border-bottom" href="#">Careers</a></div><button
                    class="hidden lg:block bg-primary-lime-green px-7 py-3 rounded-full text-neutral-white text-xs bg-gradient-to-r from-primary-lime-green to-primary-bright-cyan hover:button-brightness focus:outline-none focus:ring ring-green-400">Request
                    Invite</button><button class="lg:hidden focus:outline-none"><img class="false"
                        src="/icons/icon-hamburger.svg" alt="" /><img class="hidden" src="/icons/icon-close.svg"
                        alt="" /></button>
            </nav>
        </div>
        <div class="fixed inset-0 z-30 bg-gray-800 
    bg-opacity-50 hidden">
            <div class="bg-white text-primary-dark-blue flex flex-col text-center mx-5 my-20 py-4 rounded"><a
                    class="py-2" href="#">Home</a><a class="py-2" href="#">About</a><a class="py-2"
                    href="#">Contact</a><a class="py-2" href="#">Blog</a><a class="py-2"
                    href="#">Careers</a></div>
        </div>
        <div class="relative overflow-hidden">
            <div class="hidden lg:block w-full h-full absolute">
                <div
                    class="bg-image-mockups absolute z-20 w-full h-full bg-no-repeat bg-auto bg-right-top -right-72 xl:-right-28">
                </div>
            </div>
            <section id="hero" class="relative">
                <div
                    class="bg-header-mobile bg-custom-mobile-header-size absolute w-full h-full bg-no-repeat lg:hidden">
                </div>
                <div class="bg-header-desktop absolute w-full h-full bg-no-repeat hidden lg:block bg-left -right-42.6%">
                </div>
                <div
                    class="bg-image-mockups absolute z-20 w-full h-full bg-no-repeat bg-top -top-12 md:-top-16 bg-custom-mobile-mockup-size lg:hidden">
                </div>
                <div class="container h-screen relative z-20">
                    <div class="h-full flex flex-col justify-end pb-4 lg:pb-0 lg:w-96 lg:justify-center">
                        <div
                            class="h-1/2 flex flex-col justify-center items-center text-center lg:items-start lg:text-left">
                            <h1 class="text-4xl lg:text-5xl text-primary-dark-blue pb-5">Next generation digital banking
                            </h1>
                            <p class="text-neutral-grayish-blue text-xs lg:text-base leading-5 mb-7">Take your financial
                                life online. Your Easybank account will be a one-stop-shop for spending, saving,
                                budgeting, investing, and much more.</p><button
                                class="bg-primary-lime-green px-7 py-3 rounded-full text-neutral-white text-xs bg-gradient-to-r from-primary-lime-green to-primary-bright-cyan hover:button-brightness mb-7 focus:outline-none focus:ring ring-green-400">Request
                                Invite</button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-14 bg-neutral-light-grayish-blue lg:py-24">
                <div class="container text-center lg:text-left">
                    <div class="grid lg:grid-cols-2 mb-12 lg:mb-16">
                        <div class="col-span-1">
                            <h2 class="text-3xl lg:text-4xl text-primary-dark-blue pb-5">Why choose Easybank?</h2>
                            <p class="text-neutral-grayish-blue text-sm lg:text-base leading-5">We leverage Open Banking
                                to turn your bank account into your financial hub. Control your finances like never
                                before.</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-9 lg:gap-6 lg:grid-cols-4">
                        <div class="justify-center">
                            <div class="flex justify-center lg:justify-start"><img src="/icons/icon-online.svg"
                                    alt="" /></div>
                            <h2 class="text-lg text-primary-dark-blue py-4 lg:pt-9 lg:pb-6 lg:text-xl lg:font-bold">
                                Online Banking</h2>
                            <p class="text-neutral-grayish-blue text-sm font-light lg:text-base leading-5">Our modern
                                web and mobile applications allow you to keep track of your finances wherever you are in
                                the world.</p>
                        </div>
                        <div class="justify-center">
                            <div class="flex justify-center lg:justify-start"><img src="/icons/icon-budgeting.svg"
                                    alt="" /></div>
                            <h2 class="text-lg text-primary-dark-blue py-4 lg:pt-9 lg:pb-6 lg:text-xl lg:font-bold">
                                Simple Budgeting</h2>
                            <p class="text-neutral-grayish-blue text-sm font-light lg:text-base leading-5">See exactly
                                where your money goes each month. Receive notifications when you’re close to hitting
                                your limits.</p>
                        </div>
                        <div class="justify-center">
                            <div class="flex justify-center lg:justify-start"><img src="/icons/icon-onboarding.svg"
                                    alt="" /></div>
                            <h2 class="text-lg text-primary-dark-blue py-4 lg:pt-9 lg:pb-6 lg:text-xl lg:font-bold">
                                Fast Onboarding</h2>
                            <p class="text-neutral-grayish-blue text-sm font-light lg:text-base leading-5">We don’t do
                                branches. Open your account in minutes online and start taking control of your finances
                                right away.</p>
                        </div>
                        <div class="justify-center">
                            <div class="flex justify-center lg:justify-start"><img src="/icons/icon-api.svg"
                                    alt="" /></div>
                            <h2 class="text-lg text-primary-dark-blue py-4 lg:pt-9 lg:pb-6 lg:text-xl lg:font-bold">
                                Open API</h2>
                            <p class="text-neutral-grayish-blue text-sm font-light lg:text-base leading-5">Manage your
                                savings, investments, pension, and much more from one account. Tracking your money has
                                never been easier.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section class="py-14 lg:py-24">
            <div class="container">
                <h2 class="text-center text-3xl lg:text-4xl text-primary-dark-blue mb-5 lg:text-left lg:mb-10">Latest
                    Articles</h2>
                <div class="grid grid-cols-1 gap-5 lg:gap-7 lg:grid-cols-4">
                    <article class="bg-white">
                        <div class="aspect-w-16 aspect-h-10 lg:aspect-w-4 lg:aspect-h-3"><img class="object-cover"
                                src="/images/image-currency.jpg"
                                alt="multiple bills with different values and currencies" /></div>
                        <div class="px-7 pt-5 pb-10 lg:p-6"><span class="text-neutral-grayish-blue text-xs">By Claire
                                Robinson</span>
                            <h4 class="text-primary-dark-blue text-sm py-2 hover:text-green-400"><a
                                    href="#">Receive money in any currency with no fees</a></h4>
                            <p class="text-neutral-grayish-blue text-xs">The world is getting smaller and we’re
                                becoming more mobile. So why should you be forced to only receive money in a single …
                            </p>
                        </div>
                    </article>
                    <article class="bg-white">
                        <div class="aspect-w-16 aspect-h-10 lg:aspect-w-4 lg:aspect-h-3"><img class="object-cover"
                                src="/images/image-restaurant.jpg"
                                alt="someone eating a hamburguer in a restaurant" /></div>
                        <div class="px-7 pt-5 pb-10 lg:p-6"><span class="text-neutral-grayish-blue text-xs">By Wilson
                                Hutton</span>
                            <h4 class="text-primary-dark-blue text-sm py-2 hover:text-green-400"><a
                                    href="#">Treat yourself without worrying about money</a></h4>
                            <p class="text-neutral-grayish-blue text-xs">Our simple budgeting feature allows you to
                                separate out your spending and set realistic limits each month. That means you …</p>
                        </div>
                    </article>
                    <article class="bg-white">
                        <div class="aspect-w-16 aspect-h-10 lg:aspect-w-4 lg:aspect-h-3"><img class="object-cover"
                                src="/images/image-plane.jpg" alt="A plane in the sky" /></div>
                        <div class="px-7 pt-5 pb-10 lg:p-6"><span class="text-neutral-grayish-blue text-xs">By Wilson
                                Hutton</span>
                            <h4 class="text-primary-dark-blue text-sm py-2 hover:text-green-400"><a
                                    href="#">Take your Easybank card wherever you go</a></h4>
                            <p class="text-neutral-grayish-blue text-xs">We want you to enjoy your travels. This is why
                                we don’t charge any fees on purchases while you’re abroad. We’ll even show you …</p>
                        </div>
                    </article>
                    <article class="bg-white">
                        <div class="aspect-w-16 aspect-h-10 lg:aspect-w-4 lg:aspect-h-3"><img class="object-cover"
                                src="/images/image-confetti.jpg" alt="Falling confetti" /></div>
                        <div class="px-7 pt-5 pb-10 lg:p-6"><span class="text-neutral-grayish-blue text-xs">By Claire
                                Robinson</span>
                            <h4 class="text-primary-dark-blue text-sm py-2 hover:text-green-400"><a href="#">Our
                                    invite-only Beta accounts are now live!</a></h4>
                            <p class="text-neutral-grayish-blue text-xs">After a lot of hard work by the whole team,
                                we’re excited to launch our closed beta. It’s easy to request an invite through the site
                                ...</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <footer class="bg-primary-dark-blue py-10">
            <div class="container">
                <div class="text-center grid grid-cols-1 justify-items-center gap-6 lg:grid-cols-12 lg:gap-0">
                    <div class="flex flex-col justify-between lg:justify-self-start lg:col-span-3"><img class="mb-7"
                            src="images/logo-white.svg" alt="easybank logo" />
                        <div class="flex justify-between items-center"><svg
                                class="text-white hover:text-green-400 fill-current cursor-pointer"
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                <title>Facebook</title>
                                <path
                                    d="M18.896 0H1.104C.494 0 0 .494 0 1.104v17.793C0 19.506.494 20 1.104 20h9.58v-7.745H8.076V9.237h2.606V7.01c0-2.583 1.578-3.99 3.883-3.99 1.104 0 2.052.082 2.329.119v2.7h-1.598c-1.254 0-1.496.597-1.496 1.47v1.928h2.989l-.39 3.018h-2.6V20h5.098c.608 0 1.102-.494 1.102-1.104V1.104C20 .494 19.506 0 18.896 0z">
                                </path>
                            </svg><svg class="text-white hover:text-green-400 fill-current cursor-pointer"
                                xmlns="http://www.w3.org/2000/svg" width="21" height="20">
                                <title>Youtube</title>
                                <path
                                    d="M10.333 0c-5.522 0-10 4.478-10 10 0 5.523 4.478 10 10 10 5.523 0 10-4.477 10-10 0-5.522-4.477-10-10-10zm3.701 14.077c-1.752.12-5.653.12-7.402 0C4.735 13.947 4.514 13.018 4.5 10c.014-3.024.237-3.947 2.132-4.077 1.749-.12 5.651-.12 7.402 0 1.898.13 2.118 1.059 2.133 4.077-.015 3.024-.238 3.947-2.133 4.077zM8.667 8.048l4.097 1.949-4.097 1.955V8.048z">
                                </path>
                            </svg><svg class="text-white hover:text-green-400 fill-current cursor-pointer"
                                xmlns="http://www.w3.org/2000/svg" width="21" height="18">
                                <title>Twitter</title>
                                <path
                                    d="M20.667 2.797a8.192 8.192 0 01-2.357.646 4.11 4.11 0 001.804-2.27 8.22 8.22 0 01-2.606.996A4.096 4.096 0 0014.513.873c-2.649 0-4.595 2.472-3.997 5.038a11.648 11.648 0 01-8.457-4.287 4.109 4.109 0 001.27 5.478A4.086 4.086 0 011.47 6.59c-.045 1.901 1.317 3.68 3.29 4.075a4.113 4.113 0 01-1.853.07 4.106 4.106 0 003.834 2.85 8.25 8.25 0 01-6.075 1.7 11.616 11.616 0 006.29 1.843c7.618 0 11.922-6.434 11.662-12.205a8.354 8.354 0 002.048-2.124z">
                                </path>
                            </svg><svg class="text-white hover:text-green-400 fill-current cursor-pointer"
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                <title>Pinterest</title>
                                <path
                                    d="M10 0C4.478 0 0 4.477 0 10c0 4.237 2.636 7.855 6.356 9.312-.088-.791-.167-2.005.035-2.868.182-.78 1.172-4.97 1.172-4.97s-.299-.6-.299-1.486c0-1.39.806-2.428 1.81-2.428.852 0 1.264.64 1.264 1.408 0 .858-.545 2.14-.828 3.33-.236.995.5 1.807 1.48 1.807 1.778 0 3.144-1.874 3.144-4.58 0-2.393-1.72-4.068-4.177-4.068-2.845 0-4.515 2.135-4.515 4.34 0 .859.331 1.781.745 2.281a.3.3 0 01.069.288l-.278 1.133c-.044.183-.145.223-.335.134-1.249-.581-2.03-2.407-2.03-3.874 0-3.154 2.292-6.052 6.608-6.052 3.469 0 6.165 2.473 6.165 5.776 0 3.447-2.173 6.22-5.19 6.22-1.013 0-1.965-.525-2.291-1.148l-.623 2.378c-.226.869-.835 1.958-1.244 2.621.937.29 1.931.446 2.962.446 5.522 0 10-4.477 10-10S15.522 0 10 0z">
                                </path>
                            </svg><svg class="text-white hover:text-green-400 fill-current cursor-pointer"
                                xmlns="http://www.w3.org/2000/svg" width="21" height="20">
                                <title>Instagram</title>
                                <path
                                    d="M10.333 1.802c2.67 0 2.987.01 4.042.059 2.71.123 3.976 1.409 4.1 4.099.048 1.054.057 1.37.057 4.04 0 2.672-.01 2.988-.058 4.042-.124 2.687-1.386 3.975-4.099 4.099-1.055.048-1.37.058-4.042.058-2.67 0-2.986-.01-4.04-.058-2.717-.124-3.976-1.416-4.1-4.1-.048-1.054-.058-1.37-.058-4.041 0-2.67.01-2.986.058-4.04.124-2.69 1.387-3.977 4.1-4.1 1.054-.048 1.37-.058 4.04-.058zm0-1.802C7.618 0 7.278.012 6.211.06 2.579.227.56 2.242.394 5.877.345 6.944.334 7.284.334 10s.011 3.057.06 4.123c.166 3.632 2.181 5.65 5.816 5.817 1.068.048 1.408.06 4.123.06 2.716 0 3.057-.012 4.124-.06 3.628-.167 5.651-2.182 5.816-5.817.049-1.066.06-1.407.06-4.123s-.011-3.056-.06-4.122C20.11 2.249 18.093.228 14.458.06 13.39.01 13.049 0 10.333 0zm0 4.865a5.135 5.135 0 100 10.27 5.135 5.135 0 000-10.27zm0 8.468a3.333 3.333 0 110-6.666 3.333 3.333 0 010 6.666zm5.339-9.87a1.2 1.2 0 10-.001 2.4 1.2 1.2 0 000-2.4z">
                                </path>
                            </svg></div>
                    </div>
                    <div
                        class="grid grid-cols-1 gap-2 py-1 lg:grid-rows-3 text-white text-sm lg:text-left lg:justify-self-start lg:col-span-5 lg:gap-x-24 lg:grid-flow-col-dense">
                        <a class="hover:text-green-400" href="#">About Us</a><a class="hover:text-green-400"
                            href="#">Contact</a><a class="hover:text-green-400" href="#">Blog</a><a
                            class="hover:text-green-400" href="#">Careers</a><a class="hover:text-green-400"
                            href="#">Support</a><a class="hover:text-green-400" href="#">Privacy
                            Policy</a></div>
                    <div
                        class="flex flex-col justify-between items-center lg:items-end lg:justify-self-end lg:col-span-4">
                        <button
                            class="bg-primary-lime-green px-7 py-3 rounded-full text-neutral-white text-xs bg-gradient-to-r from-primary-lime-green to-primary-bright-cyan hover:button-brightness mb-7 focus:outline-none focus:ring ring-green-400">Request
                            Invite</button>
                        <p class="text-neutral-grayish-blue text-sm">© Easybank. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script id="__NEXT_DATA__" type="application/json">{"props":{"pageProps":{}},"page":"/","query":{},"buildId":"dm-xaioalcRNq1bFR9fto","runtimeConfig":{},"nextExport":true,"autoExport":true,"isFallback":false}</script>
    <script nomodule="" src="/_next/static/chunks/polyfills-aa54647e89713304033b.js"></script>
    <script src="/_next/static/chunks/main-d7a573496f563bf175de.js" async=""></script>
    <script src="/_next/static/chunks/webpack-50bee04d1dc61f8adf5b.js" async=""></script>
    <script src="/_next/static/chunks/framework.abffcf18e526b7c0dbcd.js" async=""></script>
    <script src="/_next/static/chunks/f6078781a05fe1bcb0902d23dbbb2662c8d200b3.8835e33749f1f58f5fef.js" async=""></script>
    <script src="/_next/static/chunks/pages/_app-9839d5a34f4924ffef42.js" async=""></script>
    <script src="/_next/static/chunks/pages/index-7b37e09f1337dcb88190.js" async=""></script>
    <script src="/_next/static/dm-xaioalcRNq1bFR9fto/_buildManifest.js" async=""></script>
    <script src="/_next/static/dm-xaioalcRNq1bFR9fto/_ssgManifest.js" async=""></script>
</body>

</x-app-layout>