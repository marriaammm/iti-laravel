<template>
    <div class="bg-gray-100 shadow-md rounded-lg p-6  flex items-center justify-between">
        <h2 class="text-3xl font-bold text-gray-900">
            ITI Blog -
            <Link href="/posts" class="text-blue-600 hover:underline">
            All Posts
            </Link>
        </h2>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: { Link },
};
</script>