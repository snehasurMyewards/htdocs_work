const Item =(props)=>{
  let {foodItem}=props;
  return(
    <li className="list-group-item">{foodItem}</li>
  )
}

export default Item