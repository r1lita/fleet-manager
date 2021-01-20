<template>
    <div class="wrapper">
      <SiteHeader />
      <LeftSidebar />
      <router-view />
    </div>
</template>

<script>

  import SiteHeader from './SiteHeader'
  import LeftSidebar from './LeftSidebar'
  import Homepage from './Homepage'

  export default {
      name: "App",
      components: {
        SiteHeader: SiteHeader,
        LeftSidebar: LeftSidebar,
        Homepage: Homepage
      }
  }
</script>