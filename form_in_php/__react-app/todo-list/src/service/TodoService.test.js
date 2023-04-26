import { activeFilter, addTask, completedFilter, removeTask, updateTask } from "./TodoService.js";

const taskList = [
    {
        id_task: 31,
        id_user: 12,
        name: "comprare il latte",
        due_date: "2023-04-25",
        done: true
    },
    {
        id_task: 32,
        id_user: 12,
        name: "comprare il dentifricio",
        due_date: "2023-04-25",
        done: true
    },
    {
        id_task: 33,
        id_user: 12,
        name: "comprare la farina",
        due_date: "2023-04-22",
        done: false
    }
]

const activeTaskList = activeFilter(taskList);

//console.log(activeTaskList);

if(!(activeTaskList.length == 1)) {
    console.log("test activeTaskList fallito");
}

const completedTask = completedFilter(taskList);

if(!(activeTaskList.length == 2)) {
    console.log("test completedTaskList fallito");
}

//console.log(completedTask);

const newTask = {
    id_user: 12,
    name: "fare i compiti",
    due_date: "2000-03-01",
    done: false
}

const newTaskList = addTask(newTask, taskList);

console.log("Nuova lista: ")
console.log(newTaskList);
console.log("---------")
// console.log(taskList);

if(!(newTaskList.length == 4)) {
    console.log("test addTask fallito");
}

const id_task = 32;
const removedTaskList = removeTask(id_task, taskList);
console.log(removedTaskList);

const taskToUpdate = {
    name: "nuovo nome task",
    id_task: 31
}
const updatedTaskList = updateTask(taskToUpdate, taskList);

console.log()
