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
      <h1> creer une musique</h1>
      <input type="text"  v-model="test"  > 
      Ma variable est : {{ test }}
       <form @submit.prevent="submit">
        <div class="mb-3">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
            Titre
          </label>
          <input
              id="title"
              v-model="form.title"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-blue-500"
              type="text"
              :class="{ 'border-red-500': form.errors.title }"
              placeholder="Title"
          >
          <p class="text-red-500 text-xs italic">{{ form.errors.title }}</p>
        </div>
        <div class="mb-3">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
            ARTISTE
          </label>
          <input
              id="artist"
              v-model="form.artist"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-blue-500"
              type="text"
              :class="{ 'border-red-500': form.errors.artist }"
              placeholder="artist"
          >
          <p class="text-red-500 text-xs italic">{{ form.errors.title }}</p>
        </div>
        <div class="mb-3">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
            Miniature
          </label>
          <input
              id="image"
              @click="form.image = $event.target.files[0]"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-blue-500"
              type="file"
              :class="{ 'border-red-500': form.errors.image }"
              placeholder="image"
          >
          <p class="text-red-500 text-xs italic">{{ form.errors.image }}</p>
        </div>
        <div class="mb-3">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
            Music
          </label>
          <input
              id="music"
              @click="form.music = $event.target.files[0]"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-blue-500"
              type="file"
              :class="{ 'border-red-500': form.errors.music }"
              placeholder="music"
          >
          <p class="text-red-500 text-xs italic">{{ form.errors.music }}</p>
        </div>
        
        <div class="mb-3">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="display">
            DISPLAY
          </label>
          <select v-model="form.display">
            <option :value="true">Oui</option>
            <option :value="false">NON</option>


          </select>
             
          <p class="text-red-500 text-xs italic">{{ form.errors.display }}</p>
        </div>
        <input type="submit" value="CREER LA MUSIC" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      
      </form>
        {{ form.errors }}
    </template>


    
    
  </MusicLayout>

</template>
<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
export default {
    components: {
    MusicLayout
    },
    props: {
      tracks: Array
  },
  data() {
      
    return {
        test : '',
        form: this.$inertia.form({
         
          title: '',
          artist: '',
          image: null,
          music: null,
          display : true ,

        })
        
      }
  },
  methods: {
    submit() {
      this.form.post(route('tracks.store'), {
        onSuccess: () => this.$emit('close'),
      });
      console.log('submitted')
    },
  },
  }



</script>
<style scoped>
</style>
