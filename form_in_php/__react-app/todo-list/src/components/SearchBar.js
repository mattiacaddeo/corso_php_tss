import { useState } from "react";

const SearchBar = (props) => {

    //* Hook useState, permette di gestire lo statto del componente, lo stato attuale dei dati del componente
    //* taskName è la variabile che contiene lo stato attuale
    //* setTaskName è la variabile che contiene la funzione che devo chiamare ogni volta che devo comunicare a react
    //* che il valore di taskName è cambiato
    const [taskName, setTaskName] = useState('');
    const [taskDueDate, setTaskDueDate] = useState('');
    
    function onAddTask() {
        const newTask = {
            name: taskName.trim(),
            due_date: taskDueDate,
            done: false
        }
        props.parentAddTask(newTask);
        setTaskName("");
    }

    return (
        <form className="">
        {/* <pre>
            {taskName}
            {taskDueDate}
        </pre> */}
            <input type="text" id="task" name="task" value={taskName} 
                   onChange={event => setTaskName(event.target.value)} className="form-control" />
            <br></br>
            <label htmlFor="due_date" className="form-label">Data di scadenza</label>
            <br></br>
            <input type="date" value={taskDueDate} className="form-control date-picker" 
                   onChange={event => setTaskDueDate(event.target.value)} name="due_date" id="due_date" />
            <br></br>
            <input disabled={taskName.trim().length > 0 ? false:true} onClick={onAddTask} type="button" name="add-task" value="Add" className="btn btn-primary btn-sm btn-add" />
        </form>
    )
}

export default SearchBar;