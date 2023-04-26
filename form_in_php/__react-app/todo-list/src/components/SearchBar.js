import { useState } from "react";

const SearchBar = () => {

    const [taskName, setTaskName] = useState('Aggiungi una Task');
    const [taskDueDate, setTaskDueDate] = useState('');

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
            <input type="button" name="add-task" value="Add" className="btn btn-primary btn-sm btn-add" />
        </form>
    )
}

export default SearchBar;