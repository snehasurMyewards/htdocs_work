import Item from "./Item";
const FoodItems=()=>{
  let foodItems=['Dal','Green Vegetable','Roti','Salad','Milk'];

  return  (
      <ul className="list-group">
       {foodItems.map((foodItem)=>(
         <Item key={foodItem} foodItem={foodItem}/>
       )
      )}
      </ul>
      );
}

export default FoodItems;