<template>
  <div>
    <h1>Employee Management</h1>

    <!-- Employee List -->
    <ul>
      <li v-for="employee in employees" :key="employee.id">
        {{ employee.name }} - {{ employee.position }}
        <button @click="showMovementForm(employee)">Record Movement</button>
      </li>
    </ul>

    <!-- Movement Form -->
    <div v-if="selectedEmployee">
      <h2>Record Movement for {{ selectedEmployee.name }}</h2>
      <form @submit.prevent="recordMovement">
        <label>Type:</label>
        <select v-model="movement.type" required>
          <option value="promotion">Promotion</option>
          <option value="mutation">Mutation</option>
          <option value="resignation">Resignation</option>
          <option value="contract_extension">Contract Extension</option>
        </select>
        <br>
        <label>Description:</label>
        <textarea v-model="movement.description"></textarea>
        <br>
        <label>Effective Date:</label>
        <input type="date" v-model="movement.effective_date" required>
        <br>
        <button type="submit">Record</button>
        <button @click="cancelMovement">Cancel</button>
      </form>
    </div>

    <!-- Movement History -->
    <div v-if="selectedEmployee">
        <h3>Movement History for {{ selectedEmployee.name }}</h3>
        <ul>
            <li v-for="movement in movements" :key="movement.id">
                {{ movement.type }} - {{ movement.effective_date }}
            </li>
        </ul>
    </div>

  </div>
</template>

<script>
export default {
  name: "EmployeeManagement",
  data() {
    return {
      employees: [],
      selectedEmployee: null,
      movements: [],
      movement: {
        employee_id: null,
        type: 'promotion',
        description: '',
        effective_date: '',
      }
    };
  },
  methods: {
    getEmployees() {
      axios.get('/api/employees')
        .then(response => {
          this.employees = response.data;
        });
    },
    showMovementForm(employee) {
      this.selectedEmployee = employee;
      this.movement.employee_id = employee.id;
      this.getMovements(employee.id);
    },
    cancelMovement() {
      this.selectedEmployee = null;
      this.movement = {
        employee_id: null,
        type: 'promotion',
        description: '',
        effective_date: '',
      };
    },
    recordMovement() {
      axios.post('/api/employee-movements', this.movement)
        .then(response => {
          // Handle success
          this.cancelMovement();
        })
        .catch(error => {
          // Handle error
        });
    },
    getMovements(employeeId) {
        axios.get(`/api/employees/${employeeId}/movements`)
            .then(response => {
                this.movements = response.data;
            });
    }
  },
  mounted() {
    this.getEmployees();
  }
};
</script>
