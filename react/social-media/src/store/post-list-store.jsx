import { createContext, useReducer } from "react";

export const PostList = createContext({
  postList: [],
  addPost: () => {},
  deletePost: () => {}
})
const postListReducer = (currentPostList, action) => {
  // switch (action.type) {
  //   case "ADD_POST":
  //     return [...currentPostList, action.payload]
  //   case "DELETE_POST":
  //     return currentPostList.filter((post) => post.id !== action.payload)
  //   default:
      return currentPostList
  //}
}
export const PostListProvider = ({ children }) => {
 const [postList, dispatchPostList] = useReducer((postListReducer, DEFAULT_POST_LIST))
 const addPost = (post) => {
   //dispatchPostList({ type: "ADD_POST", payload: post })   
 }
 const deletePost = (id) => {
   //dispatchPostList({ type: "DELETE_POST", payload: id })
 }
  return (
    <PostList.Provider value={{
      postList,
      addPost,
      deletePost
    }}>
      {children}
    </PostList.Provider>
  )
} 
const DEFAULT_POST_LIST=[{
id:'1',
title:'Going to Mumbai',
body:'Hi friends,I am going to Mumbai for my vacation. I will be staying at the hotel. Thank you.',
reactions:2,
userId:'user-9',
tags:['vacation','Mumbai','Enjoying'],
},
{
id:'2',
title:'Going to London',
body:'Hi friends,I am going to London for my vacation. I will be staying at the hotel. Thank you.',
reactions:15,
userId:'user-9',
tags:['vacation','London','Visiting'],
}
]