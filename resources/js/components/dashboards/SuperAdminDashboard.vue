<template>
  <div>
    <h1>Super Admin Dashboard</h1>
    <shift-management></shift-management>
    <zone-management></zone-management>
  </div>
</template>

<script>
import ShiftManagement from '../ShiftManagement.vue';
import ZoneManagement from '../ZoneManagement.vue';

export default {
  name: "SuperAdminDashboard",
  components: {
    ShiftManagement,
    ZoneManagement,
  }
};
</script>
