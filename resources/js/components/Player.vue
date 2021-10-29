<template>
    <div>
        <div class="w-full">
  <div class="h-2 bg-red-light"></div>
	<div class="flex items-center justify-center bg-red-lightest">
		<div class="bg-white shadow-lg rounded-lg" style="width: 45rem !important;">
			<div class="flex">
				<div>
					{{numb}}
					<img class="w-full rounded hidden md:block" :src="'/storage/covers/'+track.is_beat.get_cover.name" alt="Album Pic">
				</div>
				<div class="w-full p-8">
					<div class="flex justify-between">
						<div>
							<h3 class="text-2xl text-grey-darkest font-medium">{{track.is_beat.title}}</h3>
							<p class="text-sm text-grey mt-1">{{track.is_beat.from_user.username}}</p>

						</div>
						<div class="text-red-lighter">
							<svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z"/></svg>
						</div>
					</div>
					<div class="flex justify-between items-center mt-8">
						<!-- <div class="text-grey-darker">
							<svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6.59 12.83L4.4 15c-.58.58-1.59 1-2.4 1H0v-2h2c.29 0 .8-.2 1-.41l2.17-2.18 1.42 1.42zM16 4V1l4 4-4 4V6h-2c-.29 0-.8.2-1 .41l-2.17 2.18L9.4 7.17 11.6 5c.58-.58 1.59-1 2.41-1h2zm0 10v-3l4 4-4 4v-3h-2c-.82 0-1.83-.42-2.41-1l-8.6-8.59C2.8 6.21 2.3 6 2 6H0V4h2c.82 0 1.83.42 2.41 1l8.6 8.59c.2.2.7.41.99.41h2z"/></svg>
						</div>
						<div class="text-grey-darker">
							<svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 5h3v10H4V5zm12 0v10l-9-5 9-5z"/></svg>
						</div> -->
						<div class="text-white p-8 rounded-full bg-red-light shadow-lg" @click="testEmit" >
							<svg v-if="rn" class="w-8 h-8" fill="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 4h3v12H5V4zm7 0h3v12h-3V4z"/></svg>
							<svg v-else class="w-8 h-8" fill="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M 5 4 l 10 6 l -10 6 z z"/></svg>
						</div>
						
						<!-- <div class="text-grey-darker">
							<svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 5h3v10h-3V5zM4 5l9 5-9 5V5z"/></svg>
						</div>
						<div class="text-grey-darker">
							<svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 4a2 2 0 0 0-2 2v6H0l4 4 4-4H5V6h7l2-2H5zm10 4h-3l4-4 4 4h-3v6a2 2 0 0 1-2 2H6l2-2h7V8z"/></svg>
						</div> -->
					</div>
				</div>
			</div>

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
						<div class="absolute text-gray-800 -mr-1 bottom-0 right-0 -mb-6">150</div>
					</div>
				</div>
			</div>

			<div class="mx-8 py-4">
				<div class="flex justify-between text-sm text-grey-darker">
					<p>0:40</p>
					<p>4:20</p>
				</div>
				<div class="mt-1">
					<div class="h-1 bg-grey-dark rounded-full">
						<div class="w-1/5 h-1 bg-red-light rounded-full relative">
							<span class="w-4 h-4 bg-red absolute pin-r pin-b -mb-1 rounded-full shadow"></span>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</div>
    </div>
</template>



<script>    
export default {
    name: 'Player',
    
    props: {
        track: Object,
		current: Boolean,
		numb: Number,
		rn: {Boolean, default: false},
    },
	data() {
		return{
			hover: false,
		}
	},
	created() {
	},
	methods: {
		testEmit() {
			// console.log('yaay');
			this.emitter.emit("play-pause", this.numb);
		},
	}
}
</script>

<style scoped>
.active {
  background: green;
}
</style>