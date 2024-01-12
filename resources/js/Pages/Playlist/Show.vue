<template>
    <MusicLayout>
        <template #title> Playlist {{ playlist.title }} </template>

        <template #action> </template>
        <template #content>
            <Link
                :href="route('playlists.index')"
                class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                aria-current="page"
                >retour</Link
            >

            <div>
                <div class="card__section">
                    <div class="card__container">
                        <Track
                            v-for="track in playlist.tracks"
                            :key="track.uuid"
                            :track="track"
                            @played="play"
                        />
                    </div>
                </div>
            </div>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import Track from "@/Components/Track/Track.vue";

export default {
    components: {
        MusicLayout,
        Track,
    },
    props: {
        playlist: Object,
    },
};
</script>

<style>
.card__section {
    margin-top: 100px;
}

.card__container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
}

.card {
    padding: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    justify-content: left;

    width: 250px;
    height: 250px;
    border-radius: 15px;
    border: solid 1px rgb(47, 62, 84);
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 15px 0px;

    transition: ease-in-out 0.2s;

    &:hover {
        box-shadow: rgba(54, 54, 60, 0.337) 0px 7px 20px 0px;
        transition: ease-in-out 0.2s;
    }
}

.image__container {
    position: relative;
    width: 100px;
    height: 100px;
}

.image__container img {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.flex_illustration {
    display: flex;
    justify-content: center;
    align-items: first baseline;
    gap: 10px;
}

.svg__illustration {
    width: 5px;
    height: 5px;
    border-radius: 10px;
    background-color: rgb(47, 62, 84);
}

.card__description {
    margin-top: 20px;
}

.flex_illustration h3 {
    font-size: 18px;
    font-weight: 600;
}

.card__description p {
    font-size: 14px;
    font-weight: 400;
}
</style>
