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
                    <th>USER ID</th>
                    <th>NAME</th>
                    <th>key</th>
                    <th> ACTIOB</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr v-for="( apiKey,i) in ApiKeys" 
                :key="apiKey.uuid" 
                >
                    <td> {{ i + 1  }}</td>
                    <td>{{ apiKey.name }}</td>
                    <td>{{ apiKey.key }}</td>
                    <td>
                     <Link v-if="$page.props.isAdmin" :href="route('api-keys.destroy', {api_key: api_key})" method="delete" as="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</Link>
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
    ApiKeys: Array,
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
