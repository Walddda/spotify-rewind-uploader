<template>
    <Head title="Test" />
    <div>
        <div v-if="beats.length > 0">
            <hr />
            Test:
            {{ beats[0] }}
            <ul>
                <li v-for="x in beats">
                    {{x.title}} Lol HalloAdam &lt;3
                    </li>
            </ul>
            <!-- <div  :v-if="beats" :v-for="beat in beats" :key="beat.title">
                {{ beat.title }}
            </div> -->
            <!-- <test-comp-vue :v-if="beats.length" :v-for="(n, i) in beats" :beats="beats[i]"></test-comp-vue> -->
            <hr />

        </div>
        <!-- <div>
            Loading
        </div> -->
    </div>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },

    props: { beats: Array },

    data() {
        return {
            loadedBeats: false,
        };
    },
    methods: {
        loadBeats() {},
    },
};
</script>
