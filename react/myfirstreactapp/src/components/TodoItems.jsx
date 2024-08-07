import TodoItem from "./TodoItem"
const TodoItems = ({todoItems}) => {
  return (
    <div className="items-container">
      {todoItems.map((item)=>(<TodoItem todoName={item.name} todoDate={item.date} />))}
      {/* <TodoItem todoName="Buy Milk" todoDate="4/10/2023"/>
      <TodoItem todoName="Buy Bread" todoDate="4/10/2023"/> */}
    </div>
  )
}

export default TodoItems