<x-app-layout>
    <div class="lg:pb-12">
        <div class="relative font-inter antialiased">
            <main class="relative flex flex-col justify-center bg-slate-50 overflow-hidden">
                <div class="w-full">
                    <div class="flex justify-center pb-6">
                        <div class="w-full mx-auto text-center" x-data="carousel">
                            <div class="w-full transition-all duration-150 delay-300 ease-in-out">
                                <div class="relative flex flex-col w-full" x-ref="items">
                                    <template x-for="(item, index) in items" :key="index">
                                        <div x-show="active === index" class="relative w-full">
                                            <!-- Image -->
                                            <img class="w-full h-auto lg:max-h-[540px] lg:min-h-[540px] max-h-[300px] min-h-[300px] object-cover" :src="item.img"
                                                :alt="'Game Image ' + (index + 1)">

                                            <!-- Dark Overlay -->
                                            <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>

                                            <!-- Text Overlay -->
                                            <div class="absolute inset-0 flex flex-col justify-center items-center text-center lg:px-4 px-2 z-20">
                                                <p class="lg:text-sm text-xs uppercase tracking-widest text-yellow-400 lg:mb-2 font-titillium font-bold" x-text="item.category"></p>
                                                <h2 class="lg:text-4xl text-3xl font-extrabold text-white drop-shadow-lg font-titillium tracking-wider" x-text="item.title"></h2>
                                                <p class="mt-4 text-sm text-white max-w-2xl font-round lg:leading-6" x-text="item.description"></p>
                                                <div class="lg:mt-6 mt-3 flex lg:space-x-8 gap-5">
                                                    <template x-for="btn in item.buttons">
                                                        <a :href="btn.link" class="lg:px-6 py-2 text-white border-b font-semibold hover:border-yellow-400 hover:text-yellow-400 transition" x-text="btn.label"></a>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- Dots Navigation -->
                            <div class="flex justify-center -mt-10 space-x-2 relative z-30">
                                <template x-for="(item, index) in items" :key="index">
                                    <button class="lg:w-3 lg:h-3 w-1 h-1 rounded-full transition-all duration-300"
                                        :class="active === index ? 'bg-yellow-500' : 'bg-gray-300 hover:bg-gray-500'"
                                        @click="active = index">
                                    </button>
                                </template>
                            </div>
                        </div>

                        <!-- Alpine.js Carousel Script -->
                        <script>
                            document.addEventListener('alpine:init', () => {
                                Alpine.data('carousel', () => ({
                                    duration: 5000,
                                    active: 0,
                                    progress: 0,
                                    firstFrameTime: 0,
                                    items: [{
                                            img: 'https://demo.gloriathemes.com/wp/cloux/wp-content/uploads/2017/12/nfs-slider.jpg',
                                            category: 'Origin, PlayStation 4 · Racing',
                                            title: 'NEED FOR SPEED',
                                            description: 'Race through the streets with adrenaline-pumping speed and unmatched realism. Customize, compete, and conquer.',
                                            buttons: [{
                                                    label: 'Game Details',
                                                    link: '#'
                                                },
                                                {
                                                    label: 'Buy Now',
                                                    link: '#'
                                                }
                                            ]
                                        },
                                        {
                                            img: 'https://image.api.playstation.com/vulcan/ap/rnd/202010/2822/qWKmaOpyeibmiuEbzPxRYCVl.png?w=1920&thumb=false',
                                            category: 'Steam, PlayStation 5 · Action',
                                            title: 'Injustice 2',
                                            description: "Injustice 2 is a 2017 fighting video game. It is the sequel to 2013's Injustice: Gods Among Us and the second installment in the Injustice series which is based on the DC Universe.",
                                            buttons: [{
                                                    label: 'Game Info',
                                                    link: '#'
                                                },
                                                {
                                                    label: 'Buy Now',
                                                    link: '#'
                                                }
                                            ]
                                        },
                                        {
                                            img: 'https://www.callofduty.com/content/dam/atvi/callofduty/cod-touchui/legacy/modern-warfare/features/multiplayer/Doorkick.jpg',
                                            category: 'Xbox, PC · Warzone',
                                            title: 'CALL OF DUTY',
                                            description: 'Call of Duty: Modern Warfare is a 2019 first-person shooter game developed by Infinity Ward and published by Activision.',
                                            buttons: [{
                                                    label: 'Explore Game',
                                                    link: '#'
                                                },
                                                {
                                                    label: 'Buy Now',
                                                    link: '#'
                                                }
                                            ]
                                        },
                                        {
                                            img: 'https://i.ytimg.com/vi/GcGJ4fe0iNk/maxresdefault.jpg',
                                            category: 'PC, PS5 · Sports',
                                            title: 'FIFA 2025',
                                            description: 'Experience realistic football simulation with your favorite clubs, leagues, and players.',
                                            buttons: [{
                                                    label: 'Game Details',
                                                    link: '#'
                                                },
                                                {
                                                    label: 'Buy Now',
                                                    link: '#'
                                                }
                                            ]
                                        },
                                    ],
                                    init() {
                                        this.startAnimation()
                                        this.$watch('active', () => {
                                            cancelAnimationFrame(this.frame)
                                            this.startAnimation()
                                        })
                                    },
                                    startAnimation() {
                                        this.progress = 0
                                        this.$nextTick(() => {
                                            this.firstFrameTime = performance.now()
                                            this.frame = requestAnimationFrame(this.animate.bind(this))
                                        })
                                    },
                                    animate(now) {
                                        let timeFraction = (now - this.firstFrameTime) / this.duration
                                        if (timeFraction <= 1) {
                                            this.progress = timeFraction * 100
                                            this.frame = requestAnimationFrame(this.animate.bind(this))
                                        } else {
                                            this.active = (this.active + 1) % this.items.length
                                        }
                                    }
                                }))
                            })
                        </script>
                    </div>
                </div>
            </main>
        </div>
    </div>

    @include('section.card')
    @include('section.about')
    @include('section.game')
    @include('section.footer')

</x-app-layout>
