import TodoItem from "./TodoItem"
const TodoItems = ({todoItems}) => {
  return (
    <div className="container">
      <TodoItem todoName="Buy Milk" todoDate="4/10/2023"/>
      <TodoItem todoName="Buy Bread" todoDate="4/10/2023"/>
    </div>
  )
}