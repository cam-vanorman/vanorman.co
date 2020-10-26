<section
	x-data="navMenu.slideout()"
	x-cloak
	@open-menu.window="open = $event.detail.open"
	@keydown.window.tab="usedKeyboard = true"
	@keydown.escape="open = false"
	x-init="init()">
	<div
		x-show.transition.opacity.duration.500="open"
		@click="open = false"
		class="fixed inset-0 bg-black bg-opacity-25 z-50"></div>
	<div
		class="nav-menu transition shadow-2xl"
		:class="{'translate-x-full': !open}">
		<button
			@click="open = false"
			x-ref="closeButton"
			:class="{'focus:outline-none': !usedKeyboard}"
			class="absolute top-0 right-0 mr-4 mt-2">
            <span class="text-xs text-black pr-2 uppercase">Close Menu</span>
            <svg
                class="inline-block fill-current text-black h-9 w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 36 30"
            >
                <polygon points="32.8,4.4 28.6,0.2 18,10.8 7.4,0.2 3.2,4.4 13.8,15 3.2,25.6 7.4,29.8 18,19.2 28.6,29.8 32.8,25.6 22.2,15 "/>
            </svg>
        </button>

        <nav class="py-16">
            <ul class="list-reset text-center">
                <li>
                    <a
                        title="{{ $page->site['name'] }} Projects"
                        href="/projects"
                        class="nav-menu__item transition duration-300"
                    >Projects</a>
                </li>
                <li>
                    <a
                        title="{{ $page->site['name'] }} Contact"
                        href="/contact"
                        class="nav-menu__item transition duration-300"
                    >Contact</a>
                </li>
            </ul>
        </nav>
        <div class="absolute bottom-0 left-0 right-0 p-6">
            <p class="mb-0 mx-auto text-center text-xs">&copy; {{ $page->site['name'] }}</p>
        </div>
	</div>
</section>