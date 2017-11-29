<template>
  <md-part>
    <md-part-body>
      <md-card>
        <md-card-content>
          <md-toolbar md-theme="white">
            <span class="md-title">行业</span>
          </md-toolbar>
          <md-list>
            <md-list-item>Plain Text</md-list-item>
            <md-list-item>Link</md-list-item>
          </md-list>
          <md-divider></md-divider>
          <md-toolbar md-theme="white">
            <span class="md-title">地域</span>
          </md-toolbar>
          <md-list>
            <md-list-item>Plain Text</md-list-item>
            <md-list-item>Link</md-list-item>
          </md-list>
        </md-card-content>
      </md-card>
      <md-loading :loading="loading"></md-loading>
    </md-part-body>
  </md-part>
</template>
<script>
  import model from 'gmf/core/mixins/MdModel/MdModel';
  export default {
    data() {
      return {
      };
    },
    mixins: [model],
    computed: {
      canSave() {
        return this.validate(true);
      }
    },
    methods: {
      validate(notToast){
        var validator=this.$validate(this.model.main,{
          'code':'required',
          'name':'required',
          'country':'required',
        });
        var fail=validator.fails();
        if(fail&&!notToast){
          this.$toast(validator.errors.all());
        }
        return !fail;
      },
      initModel(){
        return {
          main:{'code':'','name':'','country':null,'is_effective':true}
        }
      },
      list() {
        this.$router.push({ name: 'module', params: { module: 'cbo.area.list' }});
      },
    },
    created() {
      this.route='cbo/areas';
    },
  };
</script>
