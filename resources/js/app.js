/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

import EmployeeManagement from './components/EmployeeManagement.vue';
import AttendanceManagement from './components/AttendanceManagement.vue';
import LeaveManagement from './components/LeaveManagement.vue';
import PayrollManagement from './components/PayrollManagement.vue';

const app = createApp({});

app.component('employee-management', EmployeeManagement);
app.component('attendance-management', AttendanceManagement);
app.component('leave-management', LeaveManagement);
app.component('payroll-management', PayrollManagement);

import RoleManagement from './components/RoleManagement.vue';
app.component('role-management', RoleManagement);

import Dashboard from './components/Dashboard.vue';
app.component('dashboard', Dashboard);

app.mount('#app');
