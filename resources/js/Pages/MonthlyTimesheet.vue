<!--suppress JSUnresolvedVariable -->
<template>
    <div class="rounded-md border border-slate-300 px-3 py-2 shadow-sm focus-within:border-slate-600 focus-within:ring-1 focus-within:ring-slate-600">
        <label
            for="month"
            class="block text-xs font-semibold text-slate-900"
        >เดือน</label>
        <select
            id="month"
            name="month"
            class="block w-full border-0 p-0 text-slate-900 placeholder-slate-500 focus:ring-0 sm:text-sm"
            v-model="monthSelected"
        >
            <option
                v-for="month in [...months].reverse()"
                :key="month.value"
                :value="month.value"
            >
                {{ month.label }}
            </option>
        </select>
    </div>
    <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
        <div
            v-for="stat in stats"
            :key="stat.label"
            class="p-4 rounded border shadow-sm"
        >
            <p class="text-sm text-slate-500">
                {{ stat.label }}
            </p>
            <p
                class="text-4xl font-semibold text-slate-700"
                :class="{'animate-bounce': stat.data > 0 && !animationTimeout}"
            >
                {{ stat.data }}
            </p>
        </div>
    </div>
    <div
        class="mt-6 space-y-4 md:space-y-8"
    >
        <div class="p-2 md:px-8 font-pattaya flex text-slate-600 text-center">
            <p class="w-2/12 md:w-1/12">
                วันที่
            </p>
            <p class="w-10/12 md:w-11/12">
                หมายเหตุ
            </p>
        </div>
        <div
            v-for="timesheet in timesheets"
            :key="timesheet.day"
            class="p-2 md:px-8 shadow-sm rounded flex items-center space-x-4"
        >
            <div class="w-1/12 text-center">
                <span
                    class="inline-block h-6 w-6 rounded-full bg-slate-600 text-white text-center"
                >
                    {{ timesheet.day }}
                </span>
            </div>
            <span class="inline-block h-10 p-2 rounded bg-slate-50 w-11/12">
                {{ timesheet.remark }}
            </span>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref, watch} from 'vue';
import {Inertia} from '@inertiajs/inertia';

const props = defineProps({
    months: {type: Array, required: true},
    noTimestamp: {type: Object, required: true},
    leave: {type: Object, required: true},
    late: {type: Object, required: true},
    timesheets: {type: Array, required: true},
    monthSelected: {type: [String, null], required: true},
});

const monthSelected = ref(props.monthSelected ?? props.months[props.months.length - 1].value);
const animationTimeout = ref(false);
watch(
    () => monthSelected.value,
    (val) => {
        Inertia.get(location.pathname, {month: val}, {
            preserveState: false,
            onSuccess: () => {
                animationTimeout.value = false;
                setTimeout(() => animationTimeout.value = true, 3000);
            }
        });
    },
);

const stats = ref([
    {label: 'ไม่ทาบเข้า', data: props.noTimestamp.in},
    {label: 'ไม่ทาบออก', data: props.noTimestamp.out},
    {label: 'ไม่ทาบเข้า-ออก', data: props.noTimestamp.both},
    {label: 'ลากิจ', data: props.leave.business},
    {label: 'ลาป่วย', data: props.leave.sick},
    {label: 'ลาพักผ่อน', data: props.leave.vacation},
    {label: 'เข้าสาย', data: props.late.in},
    {label: 'ออกก่อน', data: props.late.out},
]);

onMounted(() => setTimeout(() => animationTimeout.value = true, 3000));
</script>
<script>
import AppLayout from '../Components/Layouts/AppLayout.vue';
export default {
    layout: AppLayout,
};
</script>
