import React, { useState, useEffect } from 'react';
import appSettings from './appSettings';
import axios from 'axios';

const App = () => {
  const [text, setText] = useState("");
  const [stateTodoList, setTodoList] = useState([]);

  useEffect(() => {

    getTodoList();
  }, []);

  // gets data from the phpServer
  const getTodoList = async () => {

    try {
      const response = await axios.get(appSettings.routerUrl);
      setTodoList(response.data);

    } catch (error) {
      console.error('GET ERROR:', error);
    }
  };

  // sends data to the phpServer using POST
  const handlePostRequest = async () => {

    try {
      const response = await axios.post(appSettings.routerUrl, { text });
      addNewTodo(response.data);

    } catch (error) {
      console.error('POST ERROR:', error);
    }
  };

  // adds the typed text into the todo list
  const addNewTodo = (newTodo) => {

    setTodoList((prevTodos) => [...prevTodos, newTodo]);
  };


  return (
    <div className="container">

      <form onSubmit={(e) => { e.preventDefault(); handlePostRequest(); }}>
        <input type="text" value={text} onChange={(e) => setText(e.target.value)} />
        <button type="submit">+</button>
      </form>

      <div>
        <ul>
          {
              stateTodoList.map((item, index) => (
                <li key={index}>{item.text}</li>
              ))
          }
        </ul>
      </div>

    </div>
  );
};

export default App;
