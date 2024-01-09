<template>
  <MusicLayout>
    <template #title>
      CREER UNE MUSIQUE

    
        
      
    </template>

    <template #action>
       <Link :href="route('tracks.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        CREER UNE MUSIQUE
      </Link>

    </template>


    <template #content >
      

    </template>

    
    
  </MusicLayout>

</template>
<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';



</script>
<style scoped>
</style>
