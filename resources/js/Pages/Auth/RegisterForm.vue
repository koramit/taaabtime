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
            <h2 class="mt-6 text-center text-3xl font-pattaya tracking-tight text-slate-900">ลงทะเบียน</h2>
        </div>

        <div class="mt-8 mx-4 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow rounded-lg sm:px-10">
                <form class="space-y-6" @submit.prevent="form.post(registerStoreRoute)">
                    <div class="rounded-md border border-slate-300 px-3 py-2 shadow-sm focus-within:border-slate-600 focus-within:ring-1 focus-within:ring-slate-600">
                        <label for="full_name" class="block text-xs font-semibold text-slate-900">ชื่อ - สกุล</label>
                        <input type="text" name="full_name" id="full_name" class="block w-full border-0 p-0 text-slate-900 placeholder-slate-500 focus:ring-0 sm:text-sm" :value="employee.full_name" readonly>
                    </div>
                    <div class="rounded-md border border-slate-300 px-3 py-2 shadow-sm focus-within:border-slate-600 focus-within:ring-1 focus-within:ring-slate-600">
                        <label for="name" class="block text-xs font-semibold text-slate-900">นามแสดง</label>
                        <input type="text" name="name" id="name" class="block w-full border-0 p-0 text-slate-900 placeholder-slate-500 focus:ring-0 sm:text-sm" placeholder="ชื่อเล่นหรือชื่อใดก็ได้ตามต้องการ" v-model="form.name">
                    </div>
                    <p class="!mt-0 text-sm text-red-600">{{ form.errors.name }}</p>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="terms_and_policies_accepted" name="terms_and_policies_accepted" type="checkbox" class="h-4 w-4 rounded border-slate-300 text-slate-600 focus:ring-slate-500" v-model="form.terms_and_policies_accepted">
                            <label for="terms_and_policies_accepted" class="ml-2 block text-sm text-slate-900">ยอมรับข้อตกลงการใช้งาน</label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-slate-600 hover:text-slate-500 underline">อ่าน</a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" :disabled="!form.name || !form.terms_and_policies_accepted" class="flex w-full justify-center rounded-md border border-transparent bg-slate-600 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 disabled:bg-slate-400 disabled:text-slate-100">ยืนยัน</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</template>

<script setup>

import {InertiaHead, useForm} from "@inertiajs/inertia-vue3";

defineProps({
    registerStoreRoute: {type: String, required: true},
    employee: {type: Object, required: true},
})

const form = useForm({
    name: null,
    terms_and_policies_accepted: false,
})

</script>
