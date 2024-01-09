<template>
  <MusicLayout>
    <template #title>
      MUSIQUE

    
        
      
    </template>

    <template #action>
      <Link :href="route('tracks.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        CREER UNE MUSIQUE
      </Link>

      

    </template>


    <template #content >
      <ul>
        
        <li v-for="track in tracks" :key="track.id" :class="[track.id %2 ? 'text-red-400' : 'text-green-400' ]">
          {{ track.title }}
        </li>
      </ul>

    </template>

    
    
  </MusicLayout>

</template>
<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link }  from '@inertiajs/vue3' 

export default {
    components: {
    MusicLayout,
      Link 
    },
    props: {
      tracks: Array
    }
  }
</script>
<style scoped>
*{
  background-color: rgb(21, 132, 172);
  
  
  }

  ul{
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: rgb(21, 132, 172);

  }
  li{
    float: left;
    
    margin: 20px;

  
  }
  li:hover{
    background-color: rgb(21, 132, 172);

    


  }
</style>
