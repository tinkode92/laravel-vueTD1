<!-- <template>
    <MusicLayout>
        <template #title> Playlists </template>

        <template #action> </template>
        <Link
            :href="route('playlists.create')"
            class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
            aria-current="page"
            >Créer une playlist</Link
        >

        <template #content> </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";

export default {
    components: {
        MusicLayout,
    },
    props: {},
    computed: {},
    methods: {},
};
</script>
<style></style>
 -->

<template>
    <music-layout>
        <template #title> Playlists </template>

        <template #action>
            <Link
                :href="route('playlists.create')"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
            >
                ajouter une playlist
            </Link>
        </template>

        <template #content>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Nombre de musiques</th>
                        <th>Créé le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(playlist, i) in playlists" :key="playlist.uuid">
                        <td>{{ i + 1 }}</td>
                        <td>{{ playlist.title }}</td>
                        <td>
                            {{
                                $moment(playlist.created_at).format(
                                    "DD/MM/YYY hh:mm:ss"
                                )
                            }}
                        </td>
                        <td>
                            <Link
                                :href="
                                    route('playlists.show', {
                                        playlist: playlist,
                                    })
                                "
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                                >Voir</Link
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </template>
    </music-layout>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
export default {
    name: "PlaylistIndex",
    components: {
        MusicLayout,
    },
    props: {
        playlists: Array,
    },

    computed: {
        filteredPlaylistes() {
            return this.playlistes.filter((playliste) => {
                return playliste.title
                    .toLowerCase()
                    .includes(this.search.toLowerCase());
            });
        },
    },
    methods: {
        play(track) {
            if (this.audio) {
                this.audio.pause();
            }
            this.audio = new Audio("/storage/" + track.file);
            this.audio.play();
            this.curentTrack = track.uuid;
        },

        pause() {
            this.audio.pause();
        },
    },
};
</script>

<style scoped></style>
