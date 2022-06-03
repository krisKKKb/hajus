<template>
    <form @submit="form.post(`/comment/${post?.id}`)">
        <input type="text" v-model="form.comment" />
        <button type="submit">Submit</button>
      </form>
</template>
<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

defineProps({
    post:{
        type: Object,
        default: null
    }
})

const form = useForm({
    comment: ""
})


</script>
