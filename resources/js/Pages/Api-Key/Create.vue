<template>
    <MusicLayout>
        <template #title> CREATION API KEY </template>

        <template #action>
            <Link
                :href="route('playlists.create')"
                
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
                Créer une musique
            </Link>
        </template>

        <template #content>

          <h1>API KEY createur </h1>
          

        <form 
        @submit.prevent="submit" >
             <div class="mb-3">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            name
          </label>
          <input
              id="name"
              v-model="form.name"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-blue-500"
              type="text"
              :class="{ 'border-red-500': form.errors.name }"
              placeholder="name"
          >
          <p class="text-red-500 text-xs italic">{{ form.errors.title }}</p>
        </div>

         
        {{ form }}
        <input type="submit" value="CREER LA MUSIC" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        </form>


            
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'



export default {
  components: {
    MusicLayout,
    
    },props: {
        ApiKeys: Object,
      },
    
  data() {
      return {
        form : this.$inertia.form({
          'name': '',
            'user_id': this.$page.props.auth.user.id,
           
        })
        
    }
    },
  methods: {
    submit() {
        this.form.post(route('api-keys.store'))
    }
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
