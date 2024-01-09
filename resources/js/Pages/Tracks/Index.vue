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
      <input type="text" v-model="search" placeholder="Rechercher une musique ou un artiste" class="border-2  border-green-300 bg-white h-10 px-5 my-10 pr-16 rounded-lg  color-white-500 text-sm focus:outline-none">
      <ul>
        
         <li v-for="track in filteredTracks" :key="track.uuid" :class="[track.id %2 ? 'text-red-400' : 'text-green-400' ] " > 
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
  data() {
    return {
      search: '',
      audio: null,
      currentTrack: null,
    }
  },
  components: {
    MusicLayout,
    Link
  },
  props: {
    tracks: Array
  },
  computed: {
    filteredTracks() {
      return this.tracks.filter(track => track.title.tolowerCase().includes(this.search.tolowerCase())) ||
        this.tracks.filter(track => track.artist.tolowerCase().includes(this.search.tolowerCase()));


    }
  },
  methods: {
    play(track) {
      const url = '/storage/' + track.music;

      if (this.currentTrack) {
        this.audio = new Audio(url);
       this.audio.play();
        
      } else if(this.currentTrack !== track.uuid) {
        this.audio.pause();
        this.audio.src = url;
        this.audio.play();
        
      } else if (this.audio.pause) {
        this.audio.pause();
      } else {
        this.audio.play();
      }
      this.currentTrack = track.uuid;
      this.audio.addevntListener('ended', () => {
        this.currentTrack = null;
      })

    }
  },
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
