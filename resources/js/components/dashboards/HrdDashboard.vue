<template>
  <div>
    <h1>HRD Dashboard</h1>
    <employee-management></employee-management>
    <attendance-management></attendance-management>
    <leave-management></leave-management>
  </div>
</template>

<script>
import EmployeeManagement from '../EmployeeManagement.vue';
import AttendanceManagement from '../AttendanceManagement.vue';
import LeaveManagement from '../LeaveManagement.vue';

export default {
  name: "HrdDashboard",
  components: {
    EmployeeManagement,
    AttendanceManagement,
    LeaveManagement,
  }
};
</script>
