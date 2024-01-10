<template>
  
    <div
                  
                  class="max-w-sm rounded overflow-hidden shadow-lg cursor-pointer" 
                  :class="{ 'border border-blue-500': active } "
                  
                >
                <div class="w-full h-1/2">
                  <img class="w-full h-full" :src="`/storage/${track.image}`">
                </div>
                <div class="px-6 py-4">
                  <div class="font-bold text-xl mb-2">{{ track.title }}</div>
                  <small class="text-gray-700 text-base">
                    {{ track.artist }}
                  </small>
                </div>
                <button
                  @click="handleClick"
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                  Play
                </button>
                

                <button>
                  <Link
                  :href="route('tracks.edit', {track : track } ) "
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 rounded"
                  >edit
                </Link>
                </button>

                 <button>
                  <Link
                  :href="route('tracks.destroy', {track : track } ) "
                  class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-10 rounded"
                  >delete
                </Link>
                </button>
                
                
    </div>

  
</template>



<script>


export default {
  emits: ['Played'],

  props: {
    track: Object,
    active: {
      type: Boolean,
      default: false,
    },
  }, // Ajout de la virgule ici

  methods: {
    handleClick(track) {
      this.$emit('Played',  this.track ); // Suppression du "this" redondant
    },
  },
};
</script>
