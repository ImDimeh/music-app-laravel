<template>
    <MusicLayout>
        <template #title> PLAYLIST </template>

        <template #action>
            <Link
                :href="route('playlists.create')"
                
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
                Créer une musique
            </Link>
        </template>

        <template #content>

          <h1>Playlist</h1>
          
          <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>TITRE</th>
                    <th>NOMBRE DE MUSIC</th>
                    <th>Créée le </th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="( playlist,i) in playlists" 
                :key="playlist.uuid" 
                >
                    <td> {{ i + 1  }}</td>
                    <td>{{ playlist.title }}</td>
                    <td>{{ playlist.tracks_count }}</td>
                    <td>
                        <Link :href="route('playlists.show', {playlist: playlist})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Voir
                        </Link>
                    </td>
                    

                    
                </tr>
            </tbody>
          </table>
            
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
    playlists: Array,
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
