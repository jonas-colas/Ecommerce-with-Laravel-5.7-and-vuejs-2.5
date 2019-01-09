<template>

    <!-- Content page -->
  		<div class="container">

  			<div class="row">
  				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
  					<div class="leftbar p-r-20 p-r-0-sm">

						<div class="search-product pos-relative bo4 of-hidden ">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" v-model="q" placeholder="Search Products...">

						</div>
            <hr>
  						<!--  -->
  						<h4 class="m-text14 p-b-7">
  							Categories
  						</h4>
  						<ul class="p-b-54">
  							<li class="p-t-4">
  								<a href="#" class="s-text13 active1">
  									All
  								</a>
  							</li>

                <div v-for="category in categories">
                  <li class="p-t-4">
                    <input type="checkbox"
                     :value="category.name"
                      v-bind:value='category.name'
                      v-model="categoryname"
                      @change="filterByCategory($event)"
                      >
                      {{category.name}}
                  </li>
                </div>

  						</ul>

  						<!--  -->
  						<h4 class="m-text14 p-b-32">
  							Filters
  						</h4>
              <div class="filter-price p-t-22 p-b-50 bo3">
  							<div class="m-text15 p-b-17">
  								Resolution
  							</div>
                <div v-for="resolutions in productResolution">
                  <input type="checkbox"
                   :value="resolutions"
                    v-bind:value='resolutions'
                    v-model="resolution"
                    @change="filterByCategory($event)"
                    >
                    {{resolutions}}
                </div>
              </div>

              <div class="filter-price p-t-22 p-b-50 bo3">
                <div class="m-text15 p-b-17">
                  Model year
                </div>
                <div v-for="model_years in productModelYear">
                  <input type="checkbox"
                   :value="model_years"
                    v-bind:value='model_years'
                    v-model="model_year"
                    @change="filterByCategory($event)"
                    >
                    {{model_years}}
                </div>
              </div>

              <div class="filter-price p-t-22 p-b-50 bo3">
                <div class="m-text15 p-b-17">
                  Screen size
                </div>
                <div v-for="screen_sizes in productScreenSize">
                  <input type="checkbox"
                   :value="screen_sizes"
                    v-bind:value='screen_sizes'
                    v-model="screen_size"
                    @change="filterByCategory($event)"
                    >
                    {{screen_sizes}}
                </div>
              </div>


              <compare-item></compare-item>

  					</div>
  				</div>

  				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
  					<!--  -->
  					<div class="flex-sb-m flex-w p-b-35">
  						<div class="flex-w">
  							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
  								<select class="selection-2" name="sorting" v-model="selected" @change="filterByCategory($event)">
  									<option>Price: low to high</option>
  									<option>Price: high to low</option>
  								</select>
  							</div>

  						</div>

  					</div>

  					<!-- Product -->
  					<div class="row">
              <div class="col-sm-12 col-md-6 col-lg-4 p-b-50" v-for="product in products">
  							<!-- Block2 -->
  							<div class="block2">
  								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                    <img :src="`/storage/product_feature_images/${product.featureimage.featureimage}`" :alt="`${product.title}`">
  									<div class="block2-overlay trans-0-4">
  										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
  											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
  											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
  										</a>

  										<div class="block2-btn-addcart w-size1 trans-0-4">
  											<!-- Button -->
                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4"  @click="addToCompare(product)">
                          Add to compare
                        </button>
  										</div>
  									</div>
  								</div>

  								<div class="block2-txt p-t-20">
  									<a :href="`/shop/product/${product.id}`" class="block2-name dis-block s-text3 p-b-5">
  										{{product.title}}
  									</a>

  									<span class="block2-price m-text6 p-r-5">
  										${{product.price}}
  									</span>
  								</div>
  							</div>
  						</div>
  					</div>
            <!--end product-->
          </div>
        </div>
      </div>

</template>

<script>

import CompareItem from './CompareItem.vue';

import uniq from 'lodash/uniq'

export default {

  components:{CompareItem},

  props: ['product','category', 'filter'],

  data() {
    return {
      q:'',
      products: this.product,
      categories: this.category,
      filters:this.filter,
      categoryname: [],
      resolution: [],
      model_year: [],
      screen_size: [],
      selected: '',
      low_high:''
    }
  },

  watch: {
      q(after, before) {
          this.filterByCategory();
        }
  },

  computed: {
    //filter by model year
    productModelYear () {
      return uniq(this.filters.map(p => p.model_year))
    },

    //filter by screensize
    productScreenSize () {
      return uniq(this.filters.map(p => p.screen_size))
    },

    //filter by screensize
    productResolution () {
      return uniq(this.filters.map(p => p.resolution))
    }
},

  methods: {
      filterByCategory : function(e) {
        var categoryname = this.categoryname;
        var resolution = this.resolution;
        var model_year = this.model_year;
        var screen_size = this.screen_size;
        var selected= this.selected
        var q = this.q;
        axios.get('/shop', { params: { categoryname:categoryname, resolution:resolution, model_year:model_year, screen_size:screen_size, selected:selected, q:q} })
              .then((res) => {
              this.products = res.data.products,
              this.categories = res.data.categories
              })
            .catch(error => {});

    },

    addToCompare: function(e){
        bus.$emit('added-to-compare',e);
    },

  }
}

</script>
