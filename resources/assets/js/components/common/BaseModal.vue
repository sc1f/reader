<template>
    <transition name="modal">
        <div class="modal__mask flex-container align-center-middle" @click="close" v-show="show">
            <div class="modal__container flex-container flex-dir-column" @click.stop>
                <slot></slot>
            </div>
        </div>
    </transition>
</template>
<script>
    let data = {};
    export default {
        data: () => data,
        methods: {
            close() {
                this.$emit('close');
            },

        },
        mounted() {
            document.addEventListener("keydown", (e) => {
                if (this.show && e.keyCode === 27) {
                    this.close();
                }
            });
        },
        props: ['show'],
    }
</script>