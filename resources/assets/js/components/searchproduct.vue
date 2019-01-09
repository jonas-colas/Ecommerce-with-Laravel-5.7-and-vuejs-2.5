<template>
    <div>
      <div class="form-group">
        <input type="text" v-model="q" class="form-control" placeholder="Search on posts"><br><hr>
      </div>

        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody v-for="(post, index) in posts">
              <tr>
                <td class="col-md-3">{{post.title}}</td>
                <td><a :href="`/admin/post/edit/${post.id}`"><button type="button" class="btn btn-info edit">Edit</button></a></td>
                <td><button type="button" class="btn btn-danger delete-category" @click="addToCount(post.id, $event)">Delete</button></td>
              </tr>
          </tbody>
        </table>
    </div>
</template>

<script>


export default {

  props: ['results'],
    data() {
        return {
            q: '',
            posts: this.results,
        };
    },


    watch: {
        q(after, before) {
            this.fetch();
        }
    },

    methods: {
        fetch() {
            axios.get('/admin/post/manage', { params: {q: this.q } })
                  .then((res) => {
                  this.posts = res.data.products
                  })
                .catch(error => {});
        },

        addToCount: function(event) {

          axios.delete('/admin/post/delete', { params: {product_id: event } })
                .then((res) => {
                  this.posts.splice(index, 1);
                })
              .catch(error => {});
        },
    }
}

</script>
