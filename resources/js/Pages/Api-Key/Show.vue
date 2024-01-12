<template>
    <MusicLayout>
        <template #title> Musiques </template>

        <template #action>
            <Link
                :href="route('tracks.create')"
                v-if="$page.props.isAdmin"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
                Créer une musique
            </Link>
        </template>

        <template #content>
          <h1> SHOW</h1>
        </template>
    </MusicLayout>
</template>
<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'


export default {
  components: {
    MusicLayout,
    
    },
  props: {
    ApiKeys: Object,
  },
}
</script>
<style scoped>
* {
    background-color: rgb(21, 132, 172);
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: rgb(21, 132, 172);
}
li {
    float: left;

    margin: 20px;
}
li:hover {
    background-color: rgb(21, 132, 172);
}
</style>
