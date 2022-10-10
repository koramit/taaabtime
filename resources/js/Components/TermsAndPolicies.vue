<template>
    <ModalDialog
        ref="modal"
    >
        <template #header>
            <div class="font-semibold text-slate-600">
                <h2>ข้อตกลงการใช้งานและนโยบายความเป็นส่วนตัว</h2>
            </div>
        </template>
        <template #body>
            <div class="mt-8 md:mt-16 max-h-96 overflow-y-scroll">
                <h3 class="font-semibold text-lg">
                    การใช้งานระบบในช่วงของการทดสอบ
                </h3>
                <p class="mt-4 md:mt-8">
                    ในช่วงการทดสอบระบบนี้อาจมีการลบข้อมูลของท่านโดยไม่มีการแจ้งให้ทราบล่วงหน้า ทำให้ต้องลงทะเบียนใหม่หากต้องการทดลองใช้งานต่อไป
                </p>

                <h3 class="mt-12 md:mt-20 font-semibold text-lg">
                    ข้อตกลงการใช้งาน
                </h3>
                <p class="mt-4 md:mt-8">
                    ช่วงทดสอบนี้ใช้ไปเถอะ เต็มที่
                </p>

                <h3 class="mt-12 md:mt-20 font-semibold text-lg">
                    นโยบายความเป็นส่วนตัว
                </h3>
                <p class="mt-4 md:mt-8">
                    <ol class="list-decimal ml-6 space-y-4 md:space-y-6">
                        <li>เราเก็บข้อมูลส่วนตัวของท่านได้แก่ ชื่อ รหัสพนักงาน ตำแหน่ง สังกัด ประเภทการจ้างงาน ข้อมูลการลา ข้อมูลการทาบบัตร เพื่อใช้ประมวลผลอำนวยความสะดวกในการเรียกดูข้อมูลโดยท่านเองและเพื่อทำรายงานที่เกี่ยวข้องกับเวลาการปฏิบัติงานโดยเจ้าหน้าที่ที่เกี่ยวข้อง</li>
                        <li>กรณีที่ท่านทำการ Link LINE application เราจะเก็บข้อมูล profile ตามที่ท่านอนุญาตเท่านั้น เพื่อใช้ในการ login และแจ้งเตือนด้วย LINE application</li>
                    </ol>
                </p>
            </div>
        </template>
    </ModalDialog>
</template>

<script setup>
import {ref} from 'vue';
import ModalDialog from './ModalDialog.vue';

const modal = ref(null);

const open = () => {
    modal.value.open();
};
defineExpose({ open });
</script>
