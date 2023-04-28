import { useState } from "react";
import "./App.css"
import SearchBar from "./components/SearchBar";
// import { useState } from "react";
import TaskItem from "./components/TaskItem/TaskItem";
import TaskList from "./components/TaskList/TaskList";
import { addTask, removeTask, completedFilter, activeFilter, updateTask } from "./service/TodoService";

function App() {
  const [taskListData, setTaskListData] = useState([
    {name: 'f', due_date: '', done: true, id_task: 777},
    {name: 'f', due_date: '', done: false, id_task: 999}]);
    const [taskListCopy, setTaskListCopy] = useState([taskListData]);
  
  let list = taskListData.map(task => <TaskItem key={task.id_task} listaTask={taskListData} parentRemoveTask={parentRemoveTask} id={task.id_task} done={task.done} nome_task={task.name}></TaskItem>);

  function parentAddTask(newTask) {
    const newTaskListData = addTask(newTask, taskListData);
    console.log(newTaskListData);
    setTaskListData(newTaskListData);
  }

  function parentRemoveTask(id_task) {
    console.log("parent remove");
    const result = removeTask(id_task, taskListData);
    setTaskListData(result);
  }

  function onShowCompleted() {
    const result = completedFilter(taskListData);
    console.log(result);
    setTaskListData(result);
  }

  function onShowActive() {
    const result = activeFilter(taskListData);
    console.log(result);
    setTaskListData(result);
  }

  function onShowAll() {
    setTaskListData(taskListData);
  }

  return (
    <main>
      <SearchBar parentAddTask={parentAddTask}></SearchBar>

      <input onClick={onShowCompleted} type="button" value="Completed" className="btn btn-primary btn-sm btn-add"></input>
      <input onClick={onShowActive} type="button" value="Active" className="btn btn-primary btn-sm btn-add"></input>
      <input onClick={onShowAll} type="button" value="All" className="btn btn-primary btn-sm btn-add"></input>

      {/* <button onClick={aggiungiTask}>Add Task</button> */}
      <TaskList header={'Cose da fare oggi'} task={taskListData}>
        {list}
      </TaskList>
      
    </main>
  );
}

export default App;
