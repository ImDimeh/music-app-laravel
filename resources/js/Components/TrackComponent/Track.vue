<template>
  
   <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 overflow-hidden transform transition-transform hover:scale-105">
    <div class="h-2/5 overflow-hidden">
        <img class="w-full h-full object-cover" :src="`/storage/${track.image}`" alt="{{ track.title }}">
    </div>
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ track.title }}</div>
        <p class="text-gray-700 text-base">{{ track.artist }}</p>
    </div>
    <div class="flex justify-between items-center px-6 py-2 ">
        <button @click="handleClick" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Play</button>

        <Link v-if="$page.props.isAdmin" :href="route('tracks.edit', {track: track})" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Edit</Link>

        <Link v-if="$page.props.isAdmin" :href="route('tracks.destroy', {track: track})" method="delete" as="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</Link>
    </div>
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
