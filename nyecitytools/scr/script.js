var app = new Vue({
    el: '#nyelvBtn',
    data: {
      message: 'Nyelvek'
    },
    methods: {
        clicked: function() {
            this.message = 'clicked';
        }
    }
  });