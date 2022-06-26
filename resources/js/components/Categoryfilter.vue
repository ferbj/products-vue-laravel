<template>
<div v-if="loaded">
<label class="font-weight-bold ms-2">Categories</label>
<div class="form-check">
        <input class="form-check-input" id="all" type="checkbox" @change="selectAll()" v-model="allSelected">
        <label class="form-check-label" for="all">All</label>
</div>
<div v-for="(category, key, index) in selectedCategories" :key="index">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" :id="category.id" v-model="checksselected" @click="filterCategory($event)" :checked="category.checked" :value="category.id">
        <label class="form-check-label" :for="key"> {{ category.name }}</label>
    </div>
  </div>

</div>
</template>

<script>
import {ref,onMounted} from 'vue'

export default {
name:'Categoryfilter',
emits:['getCategory'],
inheritAttrs:false,
    props:{
        categories: {
            type: Object
        },

    },

    setup(props,context){
      const selected= ref([]);
      const checksselected = ref([]);
      const allSelected = ref(false);
      let loaded = ref(false);

    /*Capture event if the categories are checked or not*/
    const filterCategory = (e) => {
        allSelected.value=false
        if(e.target.checked){

            selected.value.push(Number(e.target.id))
            console.log('category filter',selected.value)
            context.emit('getCategory',selected.value)
        }
        else{
            selected.value.map((data) =>{
                let id = e.target.id;
                if(data == id){
                    const index = selected.value.indexOf(data)
                    selected.value.splice(index,1)
                    console.log('unchecked',selected.value)
                }
            });
            context.emit('getCategory',selected.value)
        }
    }

    /*select all checkboxs*/
    const selectAll = () => {
        if(allSelected.value){
            let categories = Object(props.categories)
            console.log('categories',categories)
            let selecteditem = categories.map((checks,index) => checks.id);
            console.log('selected-item',selecteditem)
            checksselected.value = (selecteditem)
            context.emit('getCategory',checksselected.value)
        }else{
            checksselected.value = []
            selected.value = []
            context.emit('getCategory',selected.value)

        }
    }

    /*check all checkboxs when the application is loaded*/
    const loadChecksbox = () => {
        setTimeout(() => {
            let categories = Object(props.categories)
        if (!allSelected.value) {
            allSelected.value=true;
                for (let category in categories) {
                    checksselected.value.push(categories[category].id);
                    selected.value.push(categories[category].id);
                }
                console.log('loadchecksbox',checksselected.value)
                context.emit('getCategory',checksselected.value)
            }
        },500);

    }

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
    onMounted(loadChecksbox)

    return {selected,filterCategory,selectAll,allSelected,checksselected,loaded,loadChecksbox}
    },

    /*computed property to filter categories*/
    computed:{
        selectedCategories() {
        return this.categories.filter(item => item)
          .map(item=> item)
        }
      },
    }


</script>

<style>

</style>
