export default function navMenu() {
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