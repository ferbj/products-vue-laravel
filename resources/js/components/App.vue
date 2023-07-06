<template>
<div  v-if="loaded">
    <div class="row d-flex justify-content-arround flex-fill">
            <div class="col-lg-9 col-md-7 sm-12">
                <div class="card">
                    <div class="card-header bg-warning">Products List</div>
                        <div class="card-body">
                            <Product :products="products" :minmax="minmax" :categoryselected="categoryselected" @getCategory="getCategorySelected" @getStorecheck="getYesSelected" :yesselected="yesselected" v-bind="$attrs"></Product>
                            <Pagination :data="products" @pagination-change-page="getProducts"></Pagination>
                        </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 sm-12">
                <Sidebar @update="maxValupd" :products="products" :categories="categories" @getCategory="getCategorySelected" @getStorecheck="getYesSelected" ></Sidebar>
            </div>
    </div>
</div>
</template>

<script>
import {ref, onMounted} from 'vue';
import Product from './Product';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import Sidebar from './Sidebar.vue';
export default {
    name:'App',
    components:{
    Product,
    "Pagination": Bootstrap5Pagination,
    Sidebar
},
    setup(props,context){

        const products = ref([]);
        const minmax = ref(99);
        const categories = ref([]);
        const categoryselected = ref([]);
        const yesselected = ref();
        const loaded = ref(false);

        /*load products with pagination */
        const getProducts =  (page=1) => {
            let url = '/api/getproducts?page=' + page;
            axios.get(url).then((response)=> {
                products.value = response.data
                loaded.value = true
            }).catch((errors) =>{
                console.log(errors)
            });
        }

        /*load categories*/
        const getCategory = () => {
            let url = '/api/getcategories';
            axios.get(url).then((response) => {
                categories.value = response.data
                loaded.value = true
            }).catch((errors) => {
                console.log(errors)
            });

        }

        /*came from event update component Priceslider*/
        const maxValupd = (mimax) => {
            minmax.value = Number(mimax)
        }
        /*came fron event getCategory component Categoryfilter*/
        const getCategorySelected = (category) => {
            categoryselected.value = category
        }
        /*came from event getStorecheck component Instore*/
        const getYesSelected = (checkyes) =>{
            console.log('App',checkyes)
            yesselected.value = checkyes
        }

        /*load the function getproducts and getcategory from Api*/
        onMounted(getProducts)
        onMounted(getCategory)
        return {products,getProducts, maxValupd, minmax,getCategory,categories,categoryselected,getCategorySelected,loaded,getYesSelected,yesselected}
    }
}
</script>

<style>

</style>
