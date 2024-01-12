<template>
    <MusicLayout>
        <template #title> Modifier une musique {{ track.title }} </template>

        <template #action>
            <Link :href="route('tracks.index')"> Retour </Link>
        </template>
        <template #content>
            <form @submit="submit">
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

                    <label
                        class="mt-6 block text-gray-700 text-sm font-bold mb-2"
                        for="artist"
                    >
                        Artist
                    </label>
                    <input
                        id="artist"
                        v-model="form.artist"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.artist }"
                        type="text"
                        placeholder="Artist"
                    />
                    <p class="text-red-500 text-xs italic">
                        {{ form.errors.artist }}
                    </p>
                    <label
                        class="mt-6 block text-gray-700 text-sm font-bold mb-2"
                        for="display"
                    >
                        Display
                    </label>

                    <select v-model="form.display" name="display" id="display">
                        <option disabled value="">Choisissez</option>
                        <option :value="true">On</option>
                        <option :value="false">Off</option>
                    </select>

                    <p class="text-red-500 text-xs italic">
                        {{ form.errors.display }}
                    </p>

                    <button
                        @click.prevent="submit"
                        class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                        type="submit"
                    >
                        Submit
                    </button>
                </div>
            </form>
        </template>
    </MusicLayout>
</template>

<script>
import { Link } from "@inertiajs/vue3";
import MusicLayout from "@/Layouts/MusicLayout.vue";

export default {
    components: {
        MusicLayout,
        Link,
    },
    props: {
        track: {
            type: Object,
        },
    },
    data() {
        return {
            form: this.$inertia.form({
                title: this.track.title,
                artist: this.track.artist,
                display: this.track.display ? true : false,
            }),
        };
    },
    methods: {
        submit() {
            this.form.put(route("tracks.update", { track: this.track }));
        },
    },
};
</script>

<style></style>
