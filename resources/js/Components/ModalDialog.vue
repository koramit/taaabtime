<template>
    <Teleport to="body">
        <!-- backdrop -->
        <div
            v-show="show"
            class="inset-0 z-30 fixed flex items-center justify-center backdrop"
            :class="{ 'open': animate }"
            @click.stop="close"
        >
            <!-- modal -->
            <div
                v-if="show"
                class="bg-white rounded shadow-xl p-4 md:p-16 xl:p-24 modal-appear"
                :class="{
                    'open': animate,
                    'w-11/12 md:10/12': widthMode === 'document',
                    'w-11/12 sm:10/12 md:w-3/5 xl:w-2/5': widthMode === 'form-cols-1',
                }"
            >
                <!-- header -->
                <div class="flex justify-between items-center">
                    <div><slot name="header" /></div>
                    <button
                        @click="close()"
                        class="block p-2 rounded-full hover:bg-white bg-primary transition-colors ease-in-out duration-200"
                    >
                        <span class="sr-only">Close</span>
                        <svg
                            class="h-6 w-6 text-slate-600"
                            viewBox="0 0 512 512"
                        ><path
                            fill="currentColor"
                            d="M180.7 180.7C186.9 174.4 197.1 174.4 203.3 180.7L256 233.4L308.7 180.7C314.9 174.4 325.1 174.4 331.3 180.7C337.6 186.9 337.6 197.1 331.3 203.3L278.6 256L331.3 308.7C337.6 314.9 337.6 325.1 331.3 331.3C325.1 337.6 314.9 337.6 308.7 331.3L256 278.6L203.3 331.3C197.1 337.6 186.9 337.6 180.7 331.3C174.4 325.1 174.4 314.9 180.7 308.7L233.4 256L180.7 203.3C174.4 197.1 174.4 186.9 180.7 180.7zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 32C132.3 32 32 132.3 32 256C32 379.7 132.3 480 256 480C379.7 480 480 379.7 480 256C480 132.3 379.7 32 256 32z"
                        /></svg>
                    </button>
                </div>
                <!-- body -->
                <div><slot name="body" /></div>
                <!-- footer -->
                <div><slot name="footer" /></div>
            </div>
        </div>
    </Teleport>
</template>

<script setup>
import { ref } from 'vue';

const emit = defineEmits(['opened', 'closed']);

defineProps({
    widthMode: { type: String, default: 'document' }
});

const show = ref(false);
const animate = ref(false);

const doubleRequestAnimationFrame =  (callback) => {
    requestAnimationFrame(() => {
        requestAnimationFrame(callback);
    });
};
const openTransitionEnd = (event) => {
    if (event.target.tagName === 'DIV' && event.propertyName === 'transform') {
        emit('opened');
        document.removeEventListener('transitionend', openTransitionEnd);
    }
};
const closeTransitionEnd = (event) => {
    if (event.target.tagName === 'DIV' && event.propertyName === 'transform') {
        emit('closed');
        show.value = false;
        document.removeEventListener('transitionend', closeTransitionEnd);
    }
};

const open = () => {
    document.addEventListener('transitionend', openTransitionEnd);
    show.value = true;

    // wait for dom ready
    doubleRequestAnimationFrame(() => {
        animate.value = true;
    });
};
const close =  () => {
    document.addEventListener('transitionend', closeTransitionEnd);
    animate.value = false;
};

defineExpose({open, close});
</script>

<style scoped>
.modal-appear-from-top {
    opacity: 0;
    transform: translateY(-100%);
    transition: 0.2s all ease;
}
.modal-appear-from-top.open {
    opacity: 1;
    transform: translateY(0);
}
.modal-appear {
    opacity: 0;
    transform: scale(0.75);
    transition: 0.2s all ease-in;
}
.modal-appear.open {
    opacity: 1;
    transform: scale(1);
}
.backdrop {
    background-color: rgba(0, 0, 0, 0.0);
    transition: 0.2s background-color ease-out;
}
.backdrop.open {
    background-color: rgba(0, 0, 0, 0.5);
}
</style>
