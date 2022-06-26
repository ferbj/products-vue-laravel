<template>
<div v-if="loaded">
    <label class="font-weight-bold ms-2">In Store available</label>
    <div class="form-check">
            <input class="form-check-input" id="yes" type="checkbox" @change="selectYes($event)" v-model="filterYes" :false-value="0" :true-value="1">
            <label class="form-check-label" for="yes">Yes</label>
    </div>
</div>
</template>

<script>
import {onMounted, ref} from 'vue'
export default {

    name:'Instore',
    emit:['getStorecheck'],
    inheritAttrs:false,

    setup(props,context){
        const filterYes = ref(false);
        const loaded = ref(false)

        /*Capture event if the checkbox was changed*/
        const selectYes = (e) => {
            if(e.target.checked){
                console.log('Instore',filterYes.value)
                context.emit('getStorecheck',filterYes.value)
            }else{
                context.emit('getStorecheck',filterYes.value)
            }

        }
        /*check the checkbox when the application is loaded*/
        const loadCheck = () => {
            setTimeout(() => {
                filterYes.value = 1
                loaded.value=true
                context.emit('getStorecheck',filterYes.value)
            },500);
        }

        onMounted(loadCheck)
        return {selectYes,filterYes,loaded,loadCheck}

    },
}

</script>
