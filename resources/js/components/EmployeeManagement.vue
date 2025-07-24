<template>
  <div>
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">Employees</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all the employees in your company.</p>
      </div>
      <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <Button>Add employee</Button>
      </div>
    </div>
    <Card class="mt-8">
      <Table :headers="['Name', 'Email', 'Position']" :data="employees" />
    </Card>
  </div>
</template>

<script>
import Card from './UI/Card.vue';
import Button from './UI/Button.vue';
import Table from './UI/Table.vue';

export default {
  name: "EmployeeManagement",
  components: {
    Card,
    Button,
    Table,
  },
  data() {
    return {
      employees: [],
    };
  },
  methods: {
    getEmployees() {
      axios.get('/api/employees')
        .then(response => {
          this.employees = response.data.data;
        });
    },
  },
  mounted() {
    this.getEmployees();
  }
};
</script>
