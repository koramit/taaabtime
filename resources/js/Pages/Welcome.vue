<template>
    <h1 class="text-2xl text-amber-400 font-semibold">ทาบไทม์</h1>
    <InertiaLink :href="$page.props.routes.logout" method="delete" as="button" type="button">
        ออกจากระบบ
    </InertiaLink>
</template>

<script setup>
import {InertiaLink} from '@inertiajs/inertia-vue3';
</script>
