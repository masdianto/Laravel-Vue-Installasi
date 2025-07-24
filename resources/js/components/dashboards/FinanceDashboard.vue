<template>
  <div>
    <h1>Finance Dashboard</h1>
    <payroll-management></payroll-management>
  </div>
</template>

<script>
import PayrollManagement from '../PayrollManagement.vue';

export default {
  name: "FinanceDashboard",
  components: {
    PayrollManagement,
  }
};
</script>
