<button
    class="md:hidden block flex justify-center items-center h-10 px-3 rounded-full focus:outline-none"
    x-data="{usedKeyboard: false}"
    @keydown.window.tab="usedKeyboard = true"
    @click="$dispatch('open-menu', { open: true })"
    :class="{'focus:outline-none': !usedKeyboard}"
>
    <span class="text-xs text-white pr-2 uppercase">Menu</span>
    <svg
        id="js-nav-menu-show"
        class="fill-current text-white h-9 w-4"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 32 32"
    >
        <path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/>
    </svg>
</button>

@push('scripts')
<script>
    const navMenu = {
        slideout() {
            return {
                open: false,
                usedKeyboard: false,
                init() {
                this.$watch('open', value => {
                    value && this.$refs.closeButton.focus()
                    this.toggleOverlay()
                })
                this.toggleOverlay()
                },
                toggleOverlay() {
                document.body.classList[this.open ? 'add' : 'remove']('overflow-hidden')
                }
            }
        }
    }
</script>
@endpush

