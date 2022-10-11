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
            <div class="flex items-baseline">
                <p
                    class="text-4xl font-semibold text-slate-700"
                    :class="{'animate-bounce': stat.data > 0 && !animationTimeout}"
                >
                    {{ stat.data }}
                </p>
                <button
                    v-if="stat.data > 0"
                    @click="toggleTag(stat.tag)"
                    class="ml-4 md:ml-8"
                >
                    <svg
                        class="h-4 w-4 text-slate-600"
                        viewBox="0 0 512 512"
                        v-if="selectedTags.includes(stat.tag)"
                    ><path
                        fill="currentColor"
                        d="M0 71.53C0 49.7 17.7 32 39.53 32H472.5C494.3 32 512 49.7 512 71.53C512 80.73 508.8 89.64 502.9 96.73L320 317.8V446.1C320 464.8 304.8 480 286.1 480C278.6 480 271.3 477.5 265.3 472.9L204.4 425.4C196.6 419.4 192 410.1 192 400.2V317.8L9.076 96.73C3.21 89.64 0 80.73 0 71.53V71.53zM39.53 64C35.37 64 32 67.37 32 71.53C32 73.28 32.61 74.98 33.73 76.33L220.3 301.8C222.7 304.7 224 308.3 224 312V400.2L284.1 447.6C285.3 447.9 285.7 448 286.1 448C287.2 448 288 447.2 288 446.1V312C288 308.3 289.3 304.7 291.7 301.8L478.3 76.33C479.4 74.98 480 73.28 480 71.53C480 67.37 476.6 64 472.5 64H39.53z"
                    /></svg>
                    <svg
                        v-else
                        class="h-4 w-4 text-slate-600"
                        viewBox="0 0 640 512"
                    ><path
                        fill="currentColor"
                        d="M633.9 483.4C640.9 488.9 642 498.1 636.6 505.9C631.1 512.9 621 514 614.1 508.6L6.086 28.56C-.8493 23.08-2.033 13.02 3.443 6.086C8.918-.8493 18.98-2.033 25.91 3.443L633.9 483.4zM566.9 96.73L430.4 261.6L405.3 241.8L542.3 76.33C543.4 74.98 544 73.28 544 71.53C544 67.37 540.6 64 536.5 64H180.1L139.6 32H536.5C558.3 32 576 49.7 576 71.53C576 80.73 572.8 89.64 566.9 96.73L566.9 96.73zM352 362.8L384 388.1V446.1C384 464.8 368.8 480 350.1 480C342.6 480 335.3 477.5 329.3 472.9L268.4 425.4C260.6 419.4 255.1 410.1 255.1 400.2V287L287.1 312.3V400.2L348.1 447.6C349.3 447.9 349.7 448 350.1 448C351.2 448 352 447.2 352 446.1V362.8z"
                    /></svg>
                </button>
            </div>
        </div>
    </div>
    <div
        class="mt-6 space-y-4 md:space-y-8"
        id="timesheet-container"
    >
        <div class="p-2 md:px-8 font-pattaya flex text-slate-600 text-center">
            <p class="w-2/12 md:w-1/12">
                วันที่
            </p>
            <p class="w-10/12 md:w-11/12">
                หมายเหตุ
            </p>
        </div>
        <transition-group name="flip-list">
            <div
                v-for="timesheet in timesheetsFiltered"
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
        </transition-group>
    </div>
</template>

<script setup>
import {computed, nextTick, onMounted, ref, watch} from 'vue';
import {Inertia} from '@inertiajs/inertia';

const props = defineProps({
    months: {type: Array, required: true},
    stats: {type: Array, required: true},
    timesheets: {type: Array, required: true},
    monthSelected: {type: [String, null], required: true},
});

const selectedTags = ref([]);
const toggleTag = (tag) => {
    if (! selectedTags.value.includes(tag)) {
        selectedTags.value.push(tag);
        // nextTick(() => {
        //     document.querySelector('#timesheet-container').scrollIntoView({
        //         behavior: 'smooth'
        //     });
        // });
    } else {
        let index = selectedTags.value.indexOf(tag);
        selectedTags.value.splice(index, 1);
    }
};

const timesheetsFiltered = computed(() => {
    if (!selectedTags.value.length) {
        return props.timesheets;
    }

    return props.timesheets.filter(ts => {
        if (!ts.tags.length) {
            return false;
        }

        return (ts.tags.filter(t => selectedTags.value.includes(t))).length;
    });
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

onMounted(() => setTimeout(() => animationTimeout.value = true, 3000));
</script>

<style scoped>
.flip-list-move {
    transition: transform 0.3s ease;
}

.flip-list-move,
    /* apply transition to moving elements */
.flip-list-enter-active,
.flip-list-leave-active {
    transition: transform 0.3s ease;
}

.flip-list-enter-from,
.flip-list-leave-to {
    opacity: 0;
    transform: translateX(30px);
}

/* ensure leaving items are taken out of layout flow so that moving
   animations can be calculated correctly. */
.flip-list-leave-active {
    position: absolute;
}
</style>
