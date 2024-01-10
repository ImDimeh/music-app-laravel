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
            <div>
                <input
                    id="search"
                    class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-5"
                    v-model="search"
                    type="search"
                    name="search"
                />

                <div class="grid grid-cols-4 gap-4">
                    <!-- component location-->
                    <Track
                        v-for="track in filteredTracks"
                        :key="track.uuid"
                        :track="track"
                        :active="currentTrack === track.uuid"
                        @Played="play"
                    />
                </div>
            </div>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'
import Track from '@/Components/TrackComponent/Track.vue'

export default {
  components: {
    MusicLayout,
    Track,
  },
  props: {
    tracks: Array,
  },
  data() {
    return {
      search: '',
      audio: null,
      currentTrack: null,
    }
  },
  computed: {
    filteredTracks() {
      return this.tracks.filter(track =>
        track.title.toLowerCase().includes(this.search.toLowerCase())
        || track.artist.toLowerCase().includes(this.search.toLowerCase())
      );
    }
  },
  methods: {
    play(track) {
      const url = '/storage/' + track.music;

      if(!this.currentTrack) {
        this.audio = new Audio(url);
        this.audio.play();
      } else if (this.currentTrack !== track.uuid) {
        this.audio.pause();
        this.audio.src = url;
        this.audio.play();
      } else if (!this.audio.paused) {
        this.audio.pause();
      } else {
        this.audio.play();
      }

      this.currentTrack = track.uuid;
      this.audio.addEventListener('ended', () => this.currentTrack = null);
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
