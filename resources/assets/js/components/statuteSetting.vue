<template>
  <md-part>
      <md-card class="md-small">
        <md-card-content>
          <md-toolbar md-theme="white">
            <span class="md-title">设置</span>
          </md-toolbar>
          <md-list>
            <md-list-item>
              <md-input-container>
                <label>您将订阅哪些行业的知识或者资讯</label>
                <md-select multiple v-model="industrySelects">
                  <md-option v-for="item in industries" :key="item" :value="item">
                    {{ item.name }}
                  </md-option>
                </md-select>
              </md-input-container>
            </md-list-item>
            <md-list-item>
              <md-input-container>
                <label>您关注哪些区域的内容</label>
                <md-select multiple v-model="areaSelects">
                  <md-option v-for="option in areas" :key="option" :value="option">
                    {{ option.name }}
                  </md-option>
                </md-select>
              </md-input-container>
            </md-list-item>
          </md-list>
        </md-card-content>
      </md-card>
      <md-loading :loading="loading"></md-loading>
   
  </md-part>
</template>
<script>
  export default {
    data() {
      return {
        loading:0,
        areas: [
          { id: 1, name: '华北' },
          { id: 2, name: '华中' },
          { id: 3, name: '华西' },
          { id: 4, name: '华南' },
          { id: 5, name: '华东' }
        ],
        industries: [
          { id: 1, name: '冶金' },
          { id: 2, name: '新能源' },
          { id: 3, name: '计算机' },
        ],
        areaSelects: [],
        industrySelects: []
      };
    },
    methods: {

    },
    created() {
      
    },
  };
</script>
