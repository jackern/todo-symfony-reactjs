import React, {Component, createContext} from 'react';

export const TodoContext = createContext(undefined);

class TodoContextProvider extends Component {
  constructor(props) {
    super(props);
    this.createTodo = this.createTodo.bind(this);
    this.updateTodo = this.updateTodo.bind(this);
    // this.deleteTodo = this.deleteTodo().bind(this);
    this.state = {
      todos: [
        {id: 0, name: 'do something'},
        {id: 1, name: 'do something'},
        {id: 2, name: 'do something'},
        {id: 3, name: 'do something'},
        {id: 4, name: 'do something'},
      ],
    };
  }

  // create
  createTodo(event, todo) {
    if (typeof event !== 'undefined') {
      console.log('creating');
      event.preventDefault();
      let data = [...this.state.todos];
      data.push(todo);
      this.setState({
        todos: data
      });
    }
  }
  // read
  readTodo() {
    console.log('reading');
  }
  // update
  updateTodo(data) {
    let todos = [...this.state.todos];
    let todo = todos.find(todo => {
      return todo.id === data.id
    });

    todo.name = data.name;

    this.setState({
      todos: todos,
    });

  }
  // delete
  deleteTodo() {
    console.log('deleting');
  }

  
  render() {
    return (
      <TodoContext.Provider value={{
        ...this.state,
        createTodo: this.createTodo,
        updateTodo: this.updateTodo,
        // deleteTodo: this.deleteTodo(),
      }}>
        {this.props.children}
      </TodoContext.Provider>
    );
  }
}

export default TodoContextProvider;