require('./bootstrap');

import { createApp } from 'vue'
import AppContainer from './components/AppContainer';
import Card from './components/Tasks/Card';
import Task from './components/Tasks/Task';
import PercentageBar from './components/Tasks/PercentageBar';
import CsrfTokenInput from './components/CsrfTokenInput';
import AddTask from './components/Tasks/AddTask';
import AddCard from './components/Tasks/AddCard';

const app = createApp({})

app.component('app-container', AppContainer);
app.component('Card', Card);
app.component('Task', Task);
app.component('PercentageBar', PercentageBar);
app.component('CsrfTokenInput', CsrfTokenInput);
app.component('AddTask', AddTask);
app.component('AddCard', AddCard);

app.mount('#app')