<template>
    <MusicLayout>
        <template #title> Générer une key </template>

        <template #action> </template>
        <template #content>
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label
                        class="mt-6 block text-gray-700 text-sm font-bold mb-2"
                        for="title"
                    >
                        Key title
                    </label>
                    <input
                        id="name"
                        v-model="form.name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.name }"
                        type="text"
                        placeholder="Title"
                    />
                    <p class="text-red-500 text-xs italic">
                        {{ form.errors.name }}
                    </p>
                </div>

                <p class="text-red-500 text-xs italic">
                    {{ form.errors.apikeys }}
                </p>
                <input
                    type="submit"
                    class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                    value="generate key"
                />
            </form>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";

export default {
    components: {
        MusicLayout,
    },
    props: {
        apikeys: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: "",
                key: "",
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(route("apikey.store"));
        },
    },
};
</script>

<style></style>
