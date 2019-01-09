<template>
  <div>

    <select v-model="category" v-on:change="onChange">
      <option>Choose</option>
      <option value="5">type1</option>
      <option value="6">type2</option>
      <option value="11">type3</option>
    </select>

    <select id="typselect" class="ignore-chosen">
      <option v-for="option in options" v-bind:value="option.value">{{ option.text }}</option>
    </select>

  </div>


</template>


<script>
var types = {
  5: [{
      value: '64',
      text: 'Text'
    }, {
      value: '57',
      text: 'Text'
    }, {
      value: '58',
      text: 'Text'
    }, {
      value: '59',
      text: 'Text'
    }, {
      value: '156',
      text: 'Text'
    }, {
      value: '60',
      text: 'Text'
    }, {
      value: '61',
      text: 'Text'
    }, {
      value: '62',
      text: 'Text'
    }, {
      value: '63',
      text: 'Text'
    }, {
      value: '157',
      text: 'Text'
    },

  ],
  6: [{
      value: '73',
      text: 'Text'
    }, {
      value: '68',
      text: 'Text'
    }, {
      value: '66',
      text: 'Text'
    }, {
      value: '70',
      text: 'Text'
    }, {
      value: '69',
      text: 'Text'
    }, {
      value: '71',
      text: 'Text'
    }, {
      value: '65',
      text: 'Text'
    }, {
      value: '67',
      text: 'Text'
    }, {
      value: '72',
      text: 'Text'
    },

  ],
  11: [{
      value: '117',
      text: 'Text'
    }, {
      value: '115',
      text: 'Text'
    }, {
      value: '116',
      text: 'Text'
    },

  ]
}
export default {

  data() {
    return {
    category: '5',
    }
  },

  computed: {
    options: function(event) {
			return types[this.category]
    }
  },

  methods: {
    onChange: function(e) {
      console.log(event.srcElement.value);
      this.options = this.options
    }
  }

}
</script>
