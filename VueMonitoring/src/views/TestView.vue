<script setup>
import HeaderView from '@/views/partials/HeaderView.vue'
import DetailViewTable from '@/components/DetailViewTable.vue'

</script>

<template>
  <div class="about">
    <h1>Test page</h1>
    <DetailViewTable>

    </DetailViewTable>
    <HeaderView></HeaderView>
  </div>
</template>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>

