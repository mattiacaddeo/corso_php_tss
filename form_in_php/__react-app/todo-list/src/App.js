import "./App.css"
import SearchBar from "./components/SearchBar";
// import { useState } from "react";
import TaskItem from "./components/TaskItem/TaskItem";
import TaskList from "./components/TaskList/TaskList";

function App() {

  // const taskListData = [
  //   {
  //     id_task: 21,
  //     id_user: 4,
  //     name: "comprare il pane",
  //     due_date: "2021-06-06",
  //     done: 0
  //   },
  //   {
  //     id_task: 23,
  //     id_user: 4,
  //     name: "leggere un manuale",
  //     due_date: "2019-05-01",
  //     done: 1
  //   }
  // ]
  const taskListData = [];
  const list = taskListData.map(task => <TaskItem key={task.id_task} done={task.done} nome_task={task.name}></TaskItem>);

  return (
    <main>
      <SearchBar></SearchBar>
      {/* <button onClick={aggiungiTask}>Add Task</button> */}
      <TaskList header={'Cose da fare oggi'} task={taskListData}>
        {list}
      </TaskList>
      <TaskList header={'Cose da fare domani'} task={taskListData}>
        {list}
      </TaskList>
    </main>
  );
}

export default App;
