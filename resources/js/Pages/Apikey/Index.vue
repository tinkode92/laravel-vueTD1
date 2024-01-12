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
        <template #title> Key generation </template>

        <template #action>
            <Link
                :href="route('apikey.create')"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
            >
                générer une key
            </Link>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom de la clé</th>
                            <th>Clé</th>
                            <th>Créé le</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(apikey, i) in apikeys" :key="apikey.uuid">
                            <td>{{ i + 1 }}</td>
                            <td>{{ apikey.name }}</td>
                            <td>{{ apikey.key }}</td>
                            <td>
                                {{
                                    $moment(apikey.created_at).format(
                                        "DD/MM/YYY hh:mm:ss"
                                    )
                                }}
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- <Link
                :href="route('playlists.create')"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
            >
                ajouter une playlist
            </Link> -->
        </template>

        <template #content> </template>
    </music-layout>
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

    methods: {},
};
</script>

<style scoped></style>
