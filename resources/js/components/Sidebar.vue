<template>
    <div style="position: sticky;top: 45px;">
      <div class="card">
      <div class="card-body">
            <h5 class="card-title">Filters</h5>
                   <Priceslider :categories="categories"></Priceslider>
                   <Categoryfilter :categories="categories" v-bind="$attrs"></Categoryfilter>
                   <Instore v-bind="$attrs"></Instore>
       </div>
    </div>
    </div>
</template>

<script>

import Priceslider from './Priceslider';
import Categoryfilter from './Categoryfilter';
import Instore from './Instore';
export default {
    name:"Sidebar",
    props:{
        categories:{
            type:Object
        },
        products:{
            type:Object
        }

    },
    components:{
        Priceslider,
        Categoryfilter,
        Instore
    },
}
</script>
