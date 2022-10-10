<template>
    <InertiaHead :title="$page.props.flash.title" />
    <div class="min-h-full bg-slate-50">
        <div class="bg-slate-800 pb-32">
            <nav class="bg-slate-800">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="border-b border-slate-700">
                        <div class="flex h-16 items-center justify-between px-4 sm:px-0">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg
                                        class="inline-block text-white h-8 w-8"
                                        viewBox="0 0 512 512"
                                    ><path
                                        fill="currentColor"
                                        d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 202.7 16.28 153.2 44.15 112.2C49.12 104.9 59.07 103 66.37 108C73.68 112.1 75.58 122.9 70.61 130.2C46.24 166.1 32 209.4 32 256C32 379.7 132.3 480 256 480C379.7 480 480 379.7 480 256C480 137.7 388.2 40.77 272 32.56V112C272 120.8 264.8 128 256 128C247.2 128 240 120.8 240 112V16C240 7.164 247.2 0 256 0C397.4 0 512 114.6 512 256V256zM267.3 244.7C273.6 250.9 273.6 261.1 267.3 267.3C261.1 273.6 250.9 273.6 244.7 267.3L148.7 171.3C142.4 165.1 142.4 154.9 148.7 148.7C154.9 142.4 165.1 142.4 171.3 148.7L267.3 244.7z"
                                    /></svg>
                                </div>
                                <div class="hidden md:block">
                                    <div class="ml-10 flex items-baseline space-x-4">
                                        <!-- Current: "bg-slate-900 text-white", Default: "text-slate-300 hover:bg-slate-700 hover:text-white" -->
                                        <a
                                            href="#"
                                            class="bg-slate-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                                            aria-current="page"
                                        >ข้อมูลทาบบัตร</a>

                                        <a
                                            href="#"
                                            class="text-slate-300 hover:bg-slate-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                                        >ตั้งค่า</a>
                                    </div>
                                </div>
                            </div>
                            <!-- navbar right menu-->
                            <div class="hidden md:block">
                                <div class="ml-4 flex items-center md:ml-6">
                                    <span class="mr-6 rounded-full bg-white p-1 text-slate-400">
                                        <!--  profile picture-->
                                        <svg
                                            class="w-6 h-6"
                                            viewBox="0 0 448 512"
                                        ><path
                                            fill="currentColor"
                                            d="M288 128H160C124.8 128 96 156.8 96 192v16C96 269.8 146.2 320 208 320h32c61.75 0 112-50.25 112-112V192C352 156.8 323.2 128 288 128zM320 208C320 252.1 284.1 288 240 288h-32C163.9 288 128 252.1 128 208V192c0-17.62 14.25-32 32-32h128c17.75 0 32 14.38 32 32V208zM304 400h-160C117.5 400 96 421.5 96 448v48C96 504.8 103.2 512 111.1 512C120.8 512 128 504.8 128 496V448c0-8.8 7.2-16 16-16h160c8.8 0 16 7.2 16 16v48C320 504.8 327.2 512 336 512s16-7.2 16-15.1V448C352 421.5 330.5 400 304 400zM272 448c-8.75 0-16 7.25-16 16s7.25 16 16 16s16-7.25 16-16S280.8 448 272 448zM176 448C167.3 448 160 455.2 160 464v32C160 504.8 167.2 512 175.1 512C184.8 512 192 504.8 192 496V464C192 455.2 184.8 448 176 448zM359.2 328.2C379.5 308.2 395.1 283.5 404.8 256H416c8.8 0 16-7.2 16-16v-96C432 135.2 424.8 128 416 128h-11.25C378.5 53.5 307.6 0 224 0S69.5 53.5 43.25 128H32C23.2 128 16 135.2 16 144v96C16 248.8 23.2 256 32 256h11.25c9.625 27.5 25.38 52.25 45.63 72.25C37.13 347 0 396.2 0 454.4v41.63C0 504.8 7.2 512 15.1 512S32 504.8 32 496v-41.63c0-51.62 38.5-94 88.25-101C150.2 372.8 185.8 384 224 384s73.75-11.25 103.8-30.62C377.5 360.2 416 402.8 416 454.4v41.63C416 504.8 423.2 512 432 512s16-7.2 16-15.1v-41.63C448 396.2 410.9 347 359.2 328.2zM224 352c-88.25 0-160-71.75-160-160s71.75-160 160-160s160 71.75 160 160S312.2 352 224 352z"
                                        /></svg>
                                    </span>
                                    <InertiaLink
                                        :href="$page.props.routes.logout"
                                        method="delete"
                                        as="button"
                                        type="button"
                                        class="rounded-full bg-slate-800 p-1 text-slate-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-800 cursor-pointer"
                                    >
                                        <span class="sr-only">logout</span>
                                        <svg
                                            class="w-6 h-6"
                                            viewBox="0 0 512 512"
                                        ><path
                                            fill="currentColor"
                                            d="M176 448h-96C53.53 448 32 426.5 32 400v-288C32 85.53 53.53 64 80 64h96C184.8 64 192 56.84 192 48S184.8 32 176 32h-96C35.88 32 0 67.88 0 112v288C0 444.1 35.88 480 80 480h96C184.8 480 192 472.8 192 464S184.8 448 176 448zM502.6 233.4l-128-128c-9.156-9.156-22.91-11.91-34.88-6.938C327.8 103.4 320 115.1 320 128l.0918 63.1L176 192C149.5 192 128 213.5 128 240v32C128 298.5 149.5 320 176 320l144.1-.001L320 384c0 12.94 7.797 24.62 19.75 29.56c11.97 4.969 25.72 2.219 34.88-6.938l128-128C508.9 272.4 512 264.2 512 256S508.9 239.6 502.6 233.4zM352 384V288H176C167.2 288 160 280.8 160 272v-32C160 231.2 167.2 224 176 224H352l-.0039-96l128 128L352 384z"
                                        /></svg>
                                    </InertiaLink>
                                </div>
                            </div>
                            <!-- Mobile menu button -->
                            <div class="-mr-2 flex md:hidden">
                                <button
                                    type="button"
                                    class="inline-flex items-center justify-center rounded-md bg-slate-800 p-2 text-slate-400 hover:bg-slate-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-800"
                                    aria-controls="mobile-menu"
                                    aria-expanded="false"
                                    @click="showMobileMenu = !showMobileMenu"
                                >
                                    <span class="sr-only">Open main menu</span>
                                    <svg
                                        class="h-6 w-6"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        aria-hidden="true"
                                        v-if="!showMobileMenu"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                        />
                                    </svg>
                                    <svg
                                        class="h-6 w-6"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        aria-hidden="true"
                                        v-else
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu, show/hide based on menu state. -->
                <div
                    class="border-b border-slate-700 md:hidden"
                    id="mobile-menu"
                    v-show="showMobileMenu"
                >
                    <div class="space-y-1 px-2 py-3 sm:px-3">
                        <!-- Current: "bg-slate-900 text-white", Default: "text-slate-300 hover:bg-slate-700 hover:text-white" -->
                        <a
                            href="#"
                            class="bg-slate-900 text-white block px-3 py-2 rounded-md text-base font-medium"
                            aria-current="page"
                        >ข้อมูลทาบบัตร</a>

                        <a
                            href="#"
                            class="text-slate-300 hover:bg-slate-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium"
                        >ตั้งค่า</a>
                    </div>
                    <div class="border-t border-slate-700 pt-4 pb-3">
                        <div class="flex items-center px-5">
                            <div class="flex-shrink-0">
                                <!--  profile picture-->
                                <svg
                                    class="w-8 h-8 text-slate-400 bg-white rounded-full p-1"
                                    viewBox="0 0 448 512"
                                ><path
                                    fill="currentColor"
                                    d="M288 128H160C124.8 128 96 156.8 96 192v16C96 269.8 146.2 320 208 320h32c61.75 0 112-50.25 112-112V192C352 156.8 323.2 128 288 128zM320 208C320 252.1 284.1 288 240 288h-32C163.9 288 128 252.1 128 208V192c0-17.62 14.25-32 32-32h128c17.75 0 32 14.38 32 32V208zM304 400h-160C117.5 400 96 421.5 96 448v48C96 504.8 103.2 512 111.1 512C120.8 512 128 504.8 128 496V448c0-8.8 7.2-16 16-16h160c8.8 0 16 7.2 16 16v48C320 504.8 327.2 512 336 512s16-7.2 16-15.1V448C352 421.5 330.5 400 304 400zM272 448c-8.75 0-16 7.25-16 16s7.25 16 16 16s16-7.25 16-16S280.8 448 272 448zM176 448C167.3 448 160 455.2 160 464v32C160 504.8 167.2 512 175.1 512C184.8 512 192 504.8 192 496V464C192 455.2 184.8 448 176 448zM359.2 328.2C379.5 308.2 395.1 283.5 404.8 256H416c8.8 0 16-7.2 16-16v-96C432 135.2 424.8 128 416 128h-11.25C378.5 53.5 307.6 0 224 0S69.5 53.5 43.25 128H32C23.2 128 16 135.2 16 144v96C16 248.8 23.2 256 32 256h11.25c9.625 27.5 25.38 52.25 45.63 72.25C37.13 347 0 396.2 0 454.4v41.63C0 504.8 7.2 512 15.1 512S32 504.8 32 496v-41.63c0-51.62 38.5-94 88.25-101C150.2 372.8 185.8 384 224 384s73.75-11.25 103.8-30.62C377.5 360.2 416 402.8 416 454.4v41.63C416 504.8 423.2 512 432 512s16-7.2 16-15.1v-41.63C448 396.2 410.9 347 359.2 328.2zM224 352c-88.25 0-160-71.75-160-160s71.75-160 160-160s160 71.75 160 160S312.2 352 224 352z"
                                /></svg>
                                <!--                                <img
                                    class="h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt=""
                                >-->
                            </div>
                            <div class="ml-3">
                                <div class="text-base font-medium leading-none text-white">
                                    {{ $page.props.user.name }}
                                </div>
                                <div class="text-sm font-medium leading-none text-slate-400">
                                    {{ $page.props.user.job_title }}
                                </div>
                            </div>
                            <InertiaLink
                                :href="$page.props.routes.logout"
                                method="delete"
                                as="button"
                                type="button"
                                class="ml-auto flex-shrink-0 rounded-full bg-slate-800 p-1 text-slate-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-800 cursor-pointer"
                            >
                                <span class="sr-only">logout</span>
                                <svg
                                    class="w-6 h-6"
                                    viewBox="0 0 512 512"
                                ><path
                                    fill="currentColor"
                                    d="M176 448h-96C53.53 448 32 426.5 32 400v-288C32 85.53 53.53 64 80 64h96C184.8 64 192 56.84 192 48S184.8 32 176 32h-96C35.88 32 0 67.88 0 112v288C0 444.1 35.88 480 80 480h96C184.8 480 192 472.8 192 464S184.8 448 176 448zM502.6 233.4l-128-128c-9.156-9.156-22.91-11.91-34.88-6.938C327.8 103.4 320 115.1 320 128l.0918 63.1L176 192C149.5 192 128 213.5 128 240v32C128 298.5 149.5 320 176 320l144.1-.001L320 384c0 12.94 7.797 24.62 19.75 29.56c11.97 4.969 25.72 2.219 34.88-6.938l128-128C508.9 272.4 512 264.2 512 256S508.9 239.6 502.6 233.4zM352 384V288H176C167.2 288 160 280.8 160 272v-32C160 231.2 167.2 224 176 224H352l-.0039-96l128 128L352 384z"
                                /></svg>
                            </InertiaLink>
                        </div>
                    </div>
                </div>
            </nav>
            <header class="py-10">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-pattaya tracking-tight text-white">
                        ข้อมูลทาบบัตร
                    </h1>
                </div>
            </header>
        </div>

        <main class="-mt-32">
            <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                <div class="rounded-lg bg-white px-5 py-6 shadow sm:px-6">
                    <slot />
                </div>
                <!-- /End replace -->
            </div>
        </main>
    </div>
</template>

<script setup>
import {InertiaHead, InertiaLink} from '@inertiajs/inertia-vue3';
import {onBeforeUnmount, onMounted, ref} from 'vue';

onMounted(() => {
    document.body.classList.add('bg-slate-50');
});

onBeforeUnmount(() => {
    document.body.classList.remove('bg-slate-50');
});

const showMobileMenu = ref(false);
</script>

<style scoped>
</style>
