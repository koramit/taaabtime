<template>
    <div v-if="routes.lineLink">
        <label class="font-semibold text-slate-600">เชื่อมต่อ LINE application</label>
        <p class="mt-8 md:mt-12 md:w-1/2 text-slate-800">
            เพื่อใช้ LINE ในการเข้าใช้งานระบบ รับการแจ้งเตือนข้อมูลทาบบัตร เรียกดูข้อมูลผ่าน LINE บอท โดยระบบจะเก็บข้อมูลโปรไฟล์ของท่านตามที่เลือกอนุญาตเท่านั้น เมื่อทำการเชื่อมต่อแล้ว ให้กดปุ่ม "เพิ่มเพื่อน" ที่จะปรากฏขึ้นภายหลังเพื่อเสร็จสิ้นการตั้งค่านี้ (ไม่บังคับ)
        </p>
        <a
            :href="routes.lineLink"
            class="mt-8 md:mt-12 flex w-full md:w-32 justify-center rounded-md border border-transparent bg-slate-600 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 disabled:bg-slate-400 disabled:text-slate-100"
        >
            เชื่อมต่อ
            <svg
                class="ml-2 w-6 h-6"
                viewBox="0 0 448 512"
            ><path
                fill="currentColor"
                d="M272.1 204.2v71.1c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.1 0-2.1-.6-2.6-1.3l-32.6-44v42.2c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.8 0-3.2-1.4-3.2-3.2v-71.1c0-1.8 1.4-3.2 3.2-3.2H219c1 0 2.1.5 2.6 1.4l32.6 44v-42.2c0-1.8 1.4-3.2 3.2-3.2h11.4c1.8-.1 3.3 1.4 3.3 3.1zm-82-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 1.8 1.4 3.2 3.2 3.2h11.4c1.8 0 3.2-1.4 3.2-3.2v-71.1c0-1.7-1.4-3.2-3.2-3.2zm-27.5 59.6h-31.1v-56.4c0-1.8-1.4-3.2-3.2-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 .9.3 1.6.9 2.2.6.5 1.3.9 2.2.9h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.7-1.4-3.2-3.1-3.2zM332.1 201h-45.7c-1.7 0-3.2 1.4-3.2 3.2v71.1c0 1.7 1.4 3.2 3.2 3.2h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2V234c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2v-11.4c-.1-1.7-1.5-3.2-3.2-3.2zM448 113.7V399c-.1 44.8-36.8 81.1-81.7 81H81c-44.8-.1-81.1-36.9-81-81.7V113c.1-44.8 36.9-81.1 81.7-81H367c44.8.1 81.1 36.8 81 81.7zm-61.6 122.6c0-73-73.2-132.4-163.1-132.4-89.9 0-163.1 59.4-163.1 132.4 0 65.4 58 120.2 136.4 130.6 19.1 4.1 16.9 11.1 12.6 36.8-.7 4.1-3.3 16.1 14.1 8.8 17.4-7.3 93.9-55.3 128.2-94.7 23.6-26 34.9-52.3 34.9-81.5z"
            /></svg>
        </a>
        <small class="text-sm text-slate-400">{{ $page.props.errors.status }}</small>
    </div>
    <div v-else-if="routes.lineAdd">
        <label class="font-semibold text-slate-600">เชื่อมต่อ LINE application</label>
        <p class="mt-8 md:mt-12 md:w-1/2 text-slate-800">
            กดปุ่ม "เพิ่มเพื่อน" เพื่อเสร็จสิ้นการตั้งค่านี้ (ไม่บังคับ)
        </p>
        <a
            :href="routes.lineAdd"
            class="mt-8 md:mt-12 flex w-full md:w-48 justify-center rounded-md border border-transparent bg-slate-600 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 disabled:bg-slate-400 disabled:text-slate-100"
        >
            เพิ่มเพื่อน
            <svg
                class="ml-2 w-6 h-6"
                viewBox="0 0 448 512"
            ><path
                fill="currentColor"
                d="M272.1 204.2v71.1c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.1 0-2.1-.6-2.6-1.3l-32.6-44v42.2c0 1.8-1.4 3.2-3.2 3.2h-11.4c-1.8 0-3.2-1.4-3.2-3.2v-71.1c0-1.8 1.4-3.2 3.2-3.2H219c1 0 2.1.5 2.6 1.4l32.6 44v-42.2c0-1.8 1.4-3.2 3.2-3.2h11.4c1.8-.1 3.3 1.4 3.3 3.1zm-82-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 1.8 1.4 3.2 3.2 3.2h11.4c1.8 0 3.2-1.4 3.2-3.2v-71.1c0-1.7-1.4-3.2-3.2-3.2zm-27.5 59.6h-31.1v-56.4c0-1.8-1.4-3.2-3.2-3.2h-11.4c-1.8 0-3.2 1.4-3.2 3.2v71.1c0 .9.3 1.6.9 2.2.6.5 1.3.9 2.2.9h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.7-1.4-3.2-3.1-3.2zM332.1 201h-45.7c-1.7 0-3.2 1.4-3.2 3.2v71.1c0 1.7 1.4 3.2 3.2 3.2h45.7c1.8 0 3.2-1.4 3.2-3.2v-11.4c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2V234c0-1.8-1.4-3.2-3.2-3.2H301v-12h31.1c1.8 0 3.2-1.4 3.2-3.2v-11.4c-.1-1.7-1.5-3.2-3.2-3.2zM448 113.7V399c-.1 44.8-36.8 81.1-81.7 81H81c-44.8-.1-81.1-36.9-81-81.7V113c.1-44.8 36.9-81.1 81.7-81H367c44.8.1 81.1 36.8 81 81.7zm-61.6 122.6c0-73-73.2-132.4-163.1-132.4-89.9 0-163.1 59.4-163.1 132.4 0 65.4 58 120.2 136.4 130.6 19.1 4.1 16.9 11.1 12.6 36.8-.7 4.1-3.3 16.1 14.1 8.8 17.4-7.3 93.9-55.3 128.2-94.7 23.6-26 34.9-52.3 34.9-81.5z"
            /></svg>
        </a>
        <small class="text-sm text-slate-400">{{ $page.props.errors.status }}</small>
    </div>
    <div v-else>
        <label class="font-semibold text-slate-600">เชื่อมต่อ LINE แล้ว 🎉</label>
    </div>
</template>

<script setup>
defineProps({
    routes: {type: Object, required:true}
});
</script>
