<template>
    <InertiaHead :title="$page.props.flash.title" />
    <div class="flex min-h-screen flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="text-center">
                <svg
                    class="inline-block text-slate-600 h-12 w-12"
                    viewBox="0 0 512 512"
                ><path
                    fill="currentColor"
                    d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 202.7 16.28 153.2 44.15 112.2C49.12 104.9 59.07 103 66.37 108C73.68 112.1 75.58 122.9 70.61 130.2C46.24 166.1 32 209.4 32 256C32 379.7 132.3 480 256 480C379.7 480 480 379.7 480 256C480 137.7 388.2 40.77 272 32.56V112C272 120.8 264.8 128 256 128C247.2 128 240 120.8 240 112V16C240 7.164 247.2 0 256 0C397.4 0 512 114.6 512 256V256zM267.3 244.7C273.6 250.9 273.6 261.1 267.3 267.3C261.1 273.6 250.9 273.6 244.7 267.3L148.7 171.3C142.4 165.1 142.4 154.9 148.7 148.7C154.9 142.4 165.1 142.4 171.3 148.7L267.3 244.7z"
                /></svg>
            </div>
            <h2 class="mt-6 text-center text-3xl font-pattaya tracking-tight text-slate-900">
                ทาบไทม์
            </h2>
            <p class="mt-2 text-center text-sm text-slate-600 flex justify-center items-center">
                Everytap
                <svg
                    class="h-4 w-4 mx-1"
                    viewBox="0 0 384 512"
                ><path
                    fill="-currentColor"
                    d="M320 0H64C28.65 0 0 28.65 0 64v384c0 35.35 28.65 64 64 64h256c35.35 0 64-28.65 64-64V64C384 28.65 355.3 0 320 0zM352 448c0 17.64-14.36 32-32 32H64c-17.64 0-32-14.36-32-32V64c0-17.64 14.36-32 32-32h256c17.64 0 32 14.36 32 32V448zM192 288c35.35 0 64-28.65 64-64s-28.65-64-64-64S128 188.7 128 224S156.7 288 192 288zM192 192c17.64 0 32 14.36 32 32s-14.36 32-32 32S160 241.6 160 224S174.4 192 192 192zM224 320H160c-44.18 0-80 35.82-80 80C80 408.8 87.16 416 96 416c8.838 0 16-7.164 16-16C112 373.5 133.5 352 160 352h64c26.51 0 48 21.49 48 48c0 8.836 7.164 16 16 16c8.838 0 16-7.164 16-16C304 355.8 268.2 320 224 320zM144 96h96C248.8 96 256 88.84 256 80S248.8 64 240 64h-96C135.2 64 128 71.16 128 80S135.2 96 144 96z"
                /></svg>
                Anytime
                <svg
                    class="h-4 w-4 mx-1"
                    viewBox="0 0 384 512"
                ><path
                    fill="currentColor"
                    d="M168 256C168 242.7 178.7 232 192 232C205.3 232 216 242.7 216 256C216 269.3 205.3 280 192 280C178.7 280 168 269.3 168 256zM256 328C256 341.3 245.3 352 232 352C218.7 352 208 341.3 208 328C208 314.7 218.7 304 232 304C245.3 304 256 314.7 256 328zM128 328C128 314.7 138.7 304 152 304C165.3 304 176 314.7 176 328C176 341.3 165.3 352 152 352C138.7 352 128 341.3 128 328zM256 184C256 197.3 245.3 208 232 208C218.7 208 208 197.3 208 184C208 170.7 218.7 160 232 160C245.3 160 256 170.7 256 184zM128 184C128 170.7 138.7 160 152 160C165.3 160 176 170.7 176 184C176 197.3 165.3 208 152 208C138.7 208 128 197.3 128 184zM144 256C144 269.3 133.3 280 120 280C106.7 280 96 269.3 96 256C96 242.7 106.7 232 120 232C133.3 232 144 242.7 144 256zM240 256C240 242.7 250.7 232 264 232C277.3 232 288 242.7 288 256C288 269.3 277.3 280 264 280C250.7 280 240 269.3 240 256zM64 65.6V48C64 21.49 85.49 0 112 0H272C298.5 0 320 21.49 320 48V65.6C356.5 73.01 384 105.3 384 144V368C384 406.7 356.5 438.1 320 446.4V464C320 490.5 298.5 512 272 512H112C85.49 512 64 490.5 64 464V446.4C27.48 438.1 0 406.7 0 368V144C0 105.3 27.48 73.01 64 65.6zM96 64H288V48C288 39.16 280.8 32 272 32H112C103.2 32 96 39.16 96 48V64zM112 480H272C280.8 480 288 472.8 288 464V448H96V464C96 472.8 103.2 480 112 480zM32 144V368C32 394.5 53.49 416 80 416H304C330.5 416 352 394.5 352 368V144C352 117.5 330.5 96 304 96H80C53.49 96 32 117.5 32 144z"
                /></svg>
                At once
            </p>
        </div>

        <div class="mt-8 mx-4 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow rounded-lg sm:px-10">
                <form
                    class="space-y-6"
                    @submit.prevent="form.post(routes.login)"
                >
                    <div class="isolate -space-y-px rounded-md shadow-sm">
                        <div class="relative rounded-md rounded-b-none border border-slate-300 px-3 py-2 focus-within:z-10 focus-within:border-slate-600 focus-within:ring-1 focus-within:ring-slate-600">
                            <label
                                for="login"
                                class="block text-xs font-semibold text-slate-900"
                            >ชื่อบัญชี</label>
                            <input
                                type="text"
                                name="login"
                                id="login"
                                class="form-input block w-full border-0 p-0 text-slate-900 focus:ring-0 sm:text-sm"
                                v-model="form.login"
                            >
                        </div>
                        <div class="relative rounded-md rounded-t-none border border-slate-300 px-3 py-2 focus-within:z-10 focus-within:border-slate-600 focus-within:ring-1 focus-within:ring-slate-600">
                            <label
                                for="password"
                                class="block text-xs font-semibold text-slate-900"
                            >รหัสผ่าน</label>
                            <div class="relative mt-1 rounded-md">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-input block w-full border-0 p-0 text-slate-900 focus:ring-0 sm:text-sm"
                                    v-model="form.password"
                                >
                                <button
                                    v-show="form.password && form.login"
                                    class="block absolute inset-y-0 right-0 flex items-center pr-3"
                                >
                                    <svg
                                        class="h-5 w-5 p-1 rounded-full bg-slate-100 text-slate-600"
                                        viewBox="0 0 512 512"
                                    ><path
                                        fill="currentColor"
                                        d="M480 256C480 132.3 379.7 32 256 32C247.2 32 240 24.84 240 16C240 7.164 247.2 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C247.2 512 240 504.8 240 496C240 487.2 247.2 480 256 480C379.7 480 480 379.7 480 256zM346.6 244C350 247.1 352 251.4 352 256C352 260.6 350 264.9 346.6 267.1L202.6 395.1C196 401.8 185.9 401.2 180 394.6C174.2 388 174.8 377.9 181.4 372L293.9 271.1H16C7.164 271.1 0 264.8 0 255.1C0 247.2 7.164 239.1 16 239.1H293.9L181.4 139.1C174.8 134.1 174.2 123.1 180 117.4C185.9 110.8 196 110.2 202.6 116L346.6 244z"
                                    /></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <p class="!mt-2 text-sm text-red-600">
                        {{ form.errors.login }}
                    </p>
                </form>

                <div
                    class="mt-6"
                    v-if="routes.lineLogin"
                >
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-slate-300" />
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="bg-white px-2 text-slate-500">หรือเข้าสู่ระบบด้วย LINE application</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a
                            :href="routes.lineLogin"
                            class="inline-flex w-full justify-center rounded-md border border-slate-300 bg-white py-2 px-4 text-sm font-medium text-slate-500 shadow-sm hover:bg-slate-50"
                        >
                            <span class="sr-only">Sign in with LINE</span>
                            <svg
                                class="w-6 h-6"
                                viewBox="0 0 448 512"
                            ><path
                                fill="currentColor"
                                d="M272.1 204.2v71.1c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.1 0-2.1-.6-2.6-1.3l-32.6-44v42.2c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.8 0-3.2-1.4-3.2-3.2v-71.1c0-1.8 1.4-3.2 3.2-3.2H219c1 0 2.1.5 2.6 1.4l32.6 44v-42.2c0-1.8 1.4-3.2 3.2-3.2h11.4c1.8-.1 3.3 1.4 3.3 3.1zm-82-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 1.8 1.4 3.2 3.2 3.2h11.4c1.8 0 3.2-1.4 3.2-3.2v-71.1c0-1.7-1.4-3.2-3.2-3.2zm-27.5 59.6h-31.1v-56.4c0-1.8-1.4-3.2-3.2-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 .9.3 1.6.9 2.2.6.5 1.3.9 2.2.9h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.7-1.4-3.2-3.1-3.2zM332.1 201h-45.7c-1.7 0-3.2 1.4-3.2 3.2v71.1c0 1.7 1.4 3.2 3.2 3.2h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2V234c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2v-11.4c-.1-1.7-1.5-3.2-3.2-3.2zM448 113.7V399c-.1 44.8-36.8 81.1-81.7 81H81c-44.8-.1-81.1-36.9-81-81.7V113c.1-44.8 36.9-81.1 81.7-81H367c44.8.1 81.1 36.8 81 81.7zm-61.6 122.6c0-73-73.2-132.4-163.1-132.4-89.9 0-163.1 59.4-163.1 132.4 0 65.4 58 120.2 136.4 130.6 19.1 4.1 16.9 11.1 12.6 36.8-.7 4.1-3.3 16.1 14.1 8.8 17.4-7.3 93.9-55.3 128.2-94.7 23.6-26 34.9-52.3 34.9-81.5z"
                            /></svg>
                        </a>
                        <small class="text-sm text-slate-400">{{ $page.props.errors.status }}</small>
                        <small class="text-sm text-slate-400">{{ $page.props.errors.notice }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {InertiaHead, useForm} from '@inertiajs/inertia-vue3';

defineProps({
    routes: {type: Object, required: true}
});

const form = useForm({
    login: null,
    password: null,
});
</script>
