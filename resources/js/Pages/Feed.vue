<template>
    <div>
        <Head title="Test" />
        <div>
            <div v-if="files.length > 0">
                <div class="container mb-2 flex mx-auto w-full items-center justify-center">
                    <ul class="flex flex-col p-4">
                        <!-- <li 
                            v-for="x in files" 
                            class="border-gray-400 flex flex-row my-5">
                            <div class="select-none flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-2 rounded-2xl border-2 p-6 hover:shadow-2xl border-red-400">
                                <div class="flex-1 pl-1">
                                        <player :track="x"/>
                                </div>
                            </div>
                        </li> -->

                        <li v-for="(x, k) in files" >
                            <player v-if="k == currentPlaying" :track="x" :numb="k" :rn="playing" current/>
                            <player v-else :track="x" :numb="k" />
                        </li>
                    </ul>
                </div>

                
                
            </div>
            <hr>
            {{files[currentPlaying].is_beat.title}} - {{files[currentPlaying].is_beat.from_user.username}}
            <br>
            /storage/uploads/{{files[currentPlaying].name}}
            
            <audio style="display:none" ref="player"  preload="metadata">
                    <source :src="'/storage/uploads/'+files[currentPlaying].name" type="audio/mp3" />
            </audio>

            <div class="flex justify-around items-center mt-8">
                <div class="text-grey-darker">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6.59 12.83L4.4 15c-.58.58-1.59 1-2.4 1H0v-2h2c.29 0 .8-.2 1-.41l2.17-2.18 1.42 1.42zM16 4V1l4 4-4 4V6h-2c-.29 0-.8.2-1 .41l-2.17 2.18L9.4 7.17 11.6 5c.58-.58 1.59-1 2.41-1h2zm0 10v-3l4 4-4 4v-3h-2c-.82 0-1.83-.42-2.41-1l-8.6-8.59C2.8 6.21 2.3 6 2 6H0V4h2c.82 0 1.83.42 2.41 1l8.6 8.59c.2.2.7.41.99.41h2z"/></svg>
                </div>
                <div class="text-grey-darker">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 5h3v10H4V5zm12 0v10l-9-5 9-5z"/></svg>
                </div>
                <div class="text-white p-8 rounded-full bg-red-light shadow-lg" @click="play" >
                    <svg v-if="playing" class="w-8 h-8" fill="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 4h3v12H5V4zm7 0h3v12h-3V4z"/></svg>
                    <svg v-else class="w-8 h-8" fill="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M 5 4 l 10 6 l -10 6 z z"/></svg>
                </div>
                <div class="text-grey-darker">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 5h3v10h-3V5zM4 5l9 5-9 5V5z"/></svg>
                </div>
                <div class="text-grey-darker">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 4a2 2 0 0 0-2 2v6H0l4 4 4-4H5V6h7l2-2H5zm10 4h-3l4-4 4 4h-3v6a2 2 0 0 1-2 2H6l2-2h7V8z"/></svg>
                </div>
            </div>
            <slider v-model="audio.curLength.sum" :max="audio.length.sum" @update="updateCurTime"/>
            {{audio.length.min}}:{{audio.length.sec}}
            <!-- <div class="flex  w-64 m-auto items-center h-32 justify-center">
				<div class="py-1 relative min-w-full">
					<div class="h-2 bg-gray-200 rounded-full">
						<div class="absolute h-2 rounded-full bg-teal-600 w-0" style="width: 58.5714%;"></div>
						<div class="absolute h-4 flex items-center justify-center w-4 rounded-full bg-white shadow border border-gray-300 -ml-2 top-0 cursor-pointer" unselectable="on" onselectstart="return false;" style="left: 58.5714%;">
							<div class="relative -mt-2 w-1">
								<div class="absolute z-40 opacity-100 bottom-100 mb-2 left-0 min-w-full" style="margin-left: -20.5px;">
									<div class="relative shadow-md">
										<div class="bg-black -mt-8 text-white truncate text-xs rounded py-1 px-4">92</div>
										<svg class="absolute text-black w-full h-2 left-0 top-100" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve">
											<polygon class="fill-current" points="0,0 127.5,127.5 255,0"></polygon>
										</svg>
									</div>
								</div>
							</div>
						</div>
						<div class="absolute text-gray-800 -ml-1 bottom-0 left-0 -mb-6">0</div>
						<div class="absolute text-gray-800 -mr-1 bottom-0 right-0 -mb-6">{{audio.length.min}}:{{audio.length.sec}}</div>
					</div>
				</div>
			</div> -->

            <div>
                <vue-tags-input
                v-model="tag"
                :tags="tags"
                @tags-changed="newTags => tags = newTags"
                :max-tags="5"
                />
            </div>

            
        </div>
    </div>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Player from '@/Components/Player.vue';
import VueTagsInput from '@sipec/vue3-tags-input';
  import Slider from '@vueform/slider'

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Player,
        VueTagsInput,
        Slider,
    },

    props: { 
        files: Array,
        paths: Array,
     },

    data() {
        return {
            loadedBeats: false,
            playing: false,
            currentPlaying: 0,
            tag: '',
            tags: [],
            audio: {
                length: {min:0,sec:0, sum:0},
                curLength: {min:0,sec:0, sum:0}},
            value: 20,
        };
    },
    methods: {
        play(){
            this.playing = !this.playing;
            this.toggleAudio();
        },

        toggleAudio(){
            var audio = this.$refs.player;
            if (audio.paused) {audio.play()}
            else {audio.pause()}
        },

        getLength(){
            var sis = this;
            this.$refs.player.onloadedmetadata = function() {
                var min = Math.trunc(this.duration/60)
                var sec = (Math.trunc(this.duration) - min*60 ).toFixed(0)
                console.log(min+':'+sec)
                sis.audio.length.sum = this.duration
                sis.audio.length.min = min
                sis.audio.length.sec = sec
                
            }
            // this.audio.length = this.$refs.player.duration/60
        },

        getCurrentTime(){
            var min = Math.trunc(this.$refs.player.currentTime/60)
            var sec = (Math.trunc(this.$refs.player.currentTime) - min*60 ).toFixed(0)
            // console.log(min+':'+sec)
            this.audio.curLength.sum = this.$refs.player.currentTime
            this.audio.curLength.min = min
            this.audio.curLength.sec = sec
        },

        updateCurTime($event){
            console.log($event);
            this.$refs.player.currentTime = $event;
            // this.getCurrentTime()
        },
    },
    created(){
    },
    mounted() { 
        
        this.getCurrentTime();
        setInterval(this.getCurrentTime, 500);


        this.getLength();
        this.emitter.on("test-emit", text => {
            this.playing = !this.playing;
            // console.log(text);
        });
        this.emitter.on("play-pause", numb => {
            if(this.currentPlaying == numb || !this.playing){
                this.playing = !this.playing;
                this.toggleAudio();
            }
            this.currentPlaying = numb;
            // console.log(text);
        });
        this.$watch('currentPlaying', () => {
                this.$refs.player.load()
                console.log('heyy');
                this.playing = true;
                this.toggleAudio();
            })
    }
};
</script>

<style src="@vueform/slider/themes/default.css"></style>