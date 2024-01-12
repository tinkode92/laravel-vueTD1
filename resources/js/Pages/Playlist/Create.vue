<template>
    <MusicLayout>
        <template #title> Musiques </template>

        <template #action> </template>
        <template #content>
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label
                        class="mt-6 block text-gray-700 text-sm font-bold mb-2"
                        for="title"
                    >
                        Titre
                    </label>
                    <input
                        id="title"
                        v-model="form.title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.title }"
                        type="text"
                        placeholder="Title"
                    />
                    <p class="text-red-500 text-xs italic">
                        {{ form.errors.title }}
                    </p>
                </div>
                <div v-for="track in tracks" :key="track.uuid">
                    <input
                        :value="track.uuid"
                        v-model="form.tracks"
                        type="checkbox"
                        name="tracks"
                        :id="track.uuid"
                    />

                    <label :for="track.uuid" class="ml-5" />
                    {{ track.title }}
                </div>
                <p class="text-red-500 text-xs italic">
                    {{ form.errors.tracks }}
                </p>
                <input
                    type="submit"
                    class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                    value="créer la playlist"
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
        tracks: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: "",
                tracks: [],
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(route("playlists.store"));
        },
    },
};
</script>

<style></style>
