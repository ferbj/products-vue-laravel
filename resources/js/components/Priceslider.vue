<template>
    <div v-if="loaded">
        <label class="font-weight-bold ms-2" for="max">Price Min/Max</label>
        <div class="input-group">
            <label class="label-control-text mx-2 text-center" :style="{'width': '60px'}" id="max" disabled>$ {{minmax}}</label>
        </div>
        <input type="range" class="w-100" v-model="minmax" min="0" max="200" step="0.1" @change="$.parent.emit('update',minmax)">
    </div>
</template>

<script>
import { ref,onMounted } from 'vue';
export default {
    name:'Priceslider',
    props:{
        categories:{
            type:Object
        }
    },
    setup(props){
        const minmax = ref(99);
        const loaded = ref(false);

        /*check if all categories are loaded*/
        const checkisLoaded = () => {
        setTimeout(() => {
            let categories = Object(props.categories)
            if(categories.length>0){
                loaded.value = true
            }
        },500)

    }

        onMounted(checkisLoaded)
        return {minmax,loaded,checkisLoaded}
    }
}
</script>

<style>

</style>
