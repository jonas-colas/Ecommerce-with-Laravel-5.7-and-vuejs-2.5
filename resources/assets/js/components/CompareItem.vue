<template>
    <div>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="width:100%; margin-top:50px;"><span class="badge">{{compareItems.length}}</span> Compare</button>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog" style="width:90%">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Compared items</h4>
              </div>
              <div class="modal-body">
                <table>
                    <tbody>
                        <tr class="active">
                            <td ></td>
                            <td v-for="product in compareItems"><img :src="`/storage/product_feature_images/${product.featureimage.featureimage}`" class="img-responsive" style="width:100px; height:100px" ></td>
                        </tr>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td v-for="product in compareItems">{{product.title}}</td>
                        </tr>

                        <tr class="active">
                            <td><strong>Price</strong></td>
                            <td v-for="product in compareItems">{{product.price}}</td>
                        </tr>

                        <tr>
                            <td><strong>Size</strong></td>
                            <td v-for="product in compareItems">{{product.screen_size}}</td>
                        </tr>

                        <tr class="active">
                            <td><strong>Action</strong></td>
                            <td v-for="product in compareItems"><button class="button" @click="removeItem(product)">Remove</button></td>
                        </tr>
                    </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
    </div>
</template>


<script>
    export default {
        data(){
            return {
                compareItems:[]
            }
        },
        methods:{
            removeItem(item){
                const index= this.compareItems.findIndex((compareItem)=>{
                    return compareItem.id===item.id;
                });
                this.compareItems.splice(index,1);
                localStorage.setItem('compareitems',JSON.stringify(this.compareItems));
            }
        },
        mounted(){
            let items=localStorage.getItem('compareitems');
            if(items){
                this.compareItems=JSON.parse(items);
            }
        },
        created(){
            bus.$on('added-to-compare',(e)=>{
                console.log('on emit shirt',e);
                this.compareItems.push(e);
                localStorage.setItem('compareitems',JSON.stringify(this.compareItems));
            });
        }
    }
</script>
