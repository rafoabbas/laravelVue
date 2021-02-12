<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body">
            <div class="row form-row">
              <div class="form-group col-md-3">
                <input type="text" class="form-control" v-model="search.name" placeholder="Name">
              </div>
              <div class="form-group col-md-2">
                <input type="number" class="form-control" v-model="search.bedrooms" placeholder="Bedrooms">
              </div>
              <div class="form-group col-md-2">
                <input type="number" class="form-control" v-model="search.bathrooms" placeholder="Bedrooms">
              </div>
              <div class="form-group col-md-2">
                <input type="number" class="form-control" v-model="search.storeys" placeholder="Storeys">
              </div>
              <div class="form-group col-md-2">
                <input type="number" class="form-control" v-model="search.garages" placeholder="Garages">
              </div>

            </div>
            <div class="row form-row">
              <div class="form-group col-md-2">
                <input type="number" class="form-control" v-model="search.price_one" placeholder="Price range">
              </div>
              <div class="form-group col-md-2">
                <input type="number" class="form-control" v-model="search.price_two" placeholder="Price range">
              </div>
              <div class="form-group col-md-2">
                <button class="btn  btn-success" @click="searchFunc">Search</button>
              </div>
            </div>

            <loading :active.sync="isLoading"
                     :can-cancel="true"
                     :on-cancel="onCancel"
                     :is-full-page="fullPage"></loading>

          </div>
          <div v-if="! homes.length" class="card-body">
            <div class="alert alert-danger">
              nothing found
            </div>
          </div>
          <div v-else class="table-responive">
            <table class="table">
              <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Bedrooms</th>
                <th scope="col">Bathrooms</th>
                <th scope="col">Storeys</th>
                <th scope="col">Garages</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="home in homes" :key="home.id">
                <th scope="row">{{  home.name }}</th>
                <td>{{  home.price }}</td>
                <td>{{  home.bedrooms }}</td>
                <td>{{  home.bathrooms }}</td>
                <td>{{  home.storeys }}</td>
                <td>{{  home.garages }}</td>
              </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// Import component
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
  data() {
    return {
      isLoading: true,
      fullPage: true,
      search: {
        name: '',
        price_one: '',
        price_two: '',
        bedrooms: '',
        bathrooms: '',
        storeys: '',
        garages: '',
      },
      homes: {},
    }
  },
  components: {
    Loading
  },
  methods: {
    getHome: function (){
      this.isLoading = true;

          axios.get('/api/home',{
        params: this.search
      }).then(response => {
            this.homes = response.data.data;
            this.isLoading = false;

          });
    },
    searchFunc: function (){
      this.getHome();
    },
    onCancel() {
      console.log('User cancelled the loader.')
    }
  },
  created(){
    this.getHome();
  },

}
</script>
