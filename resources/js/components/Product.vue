<template>
<div class="table-responsive" >
        <table class="table table-striped table-bordered table-hover" aria-hidden="true">
            <thead class="bg-dark text-light align-middle text-center"   style="position:sticky;top: 0px">
                <th>#</th>
                <th>Name</th>
                <th>$ Price</th>
                <th>Description</th>
                <th>Category</th>
                <th>In Store Available</th>
            </thead>
            <tbody>
                <template v-for="(product) in products.data" :key="product.id" class="d-flex mb-3 align-items-center">
                     <tr v-if="(product.price<=Number(minmax)) && (categoryselected.join(' ').includes(product.category.id)) && (product.available==yesselected)">
                        <td>{{ product.id}}</td>
                        <td>{{ product.name }}</td>
                        <td>{{ fixdecimals(product.price) }}</td>
                        <td>{{ product.description }}</td>
                        <td>{{ product.category.name }}</td>
                        <td v-if="product.available==1">{{'Yes'}}</td>
                        <td v-else>{{'No'}}</td>
                    </tr>
                </template>
                <template v-if="products.data.length==0">
                        <h4 class="text-red">No Results</h4>
                </template>

            </tbody>
        </table>
</div>
</template>

<script>

export default {
    name:'Product',
    props: {
        products: {
            type: Object
        },
        minmax:{
            type:Number
        },
        categoryselected:{
            type:Array
        },
        yesselected:{
            type:Number
        }
    },
    setup(props){
        /*fix the Price decimals*/
        const fixdecimals = (price)  => {
            return parseFloat(price).toFixed(2)
        }
        return {fixdecimals}
    }

}
</script>
