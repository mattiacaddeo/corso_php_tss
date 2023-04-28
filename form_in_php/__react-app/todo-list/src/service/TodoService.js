
export const addTask = (newTask, todos) => {

    if(newTask.name === undefined || newTask.name.trim() === "") {
        throw new Error("Il nome non è stato inserito");
    }

    //! shallow copy della task list
    //react lavora per differenze
    const newTodos = [...todos];
    const newTaskCopy = {...newTask, ...{name: newTask.name.trim()}};
    //* Oppure 
    //const newTaskCopy = {...newTask}; 
    //newTaskCopy.name = newTaskCopy.name.trim();
    newTaskCopy.id_task = (new Date).getTime();
    newTodos.push(newTaskCopy);
    return newTodos;
}

export const removeTask = (id_task, todos) => {
    const newTodos = [...todos];
    const indexToRemove = newTodos.findIndex(task => id_task==task.id_task);
    newTodos.splice(indexToRemove, 1);
    return newTodos;
}

export const updateTask = (taskToUpdate, todos) => {
    const newTodos = [...todos];
    return (newTodos.map(task => {
        if(task.id_task === taskToUpdate.id_task) {
            return {...task, ...taskToUpdate};
        }
        return task;
    }));
}

export const activeFilter = (todos) => {
    const newTodos = todos.filter(task => !task.done);
    return newTodos;
}

export const completedFilter = todos => todos.filter((task) => task.done);

export const dateFilter = () => {
    
}