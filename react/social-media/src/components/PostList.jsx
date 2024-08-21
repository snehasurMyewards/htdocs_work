import { useContext, useEffect, useState } from "react";
import Post from "./Post";
import { PostList as PostListData } from "../store/post-list-store";
import WelcomeMessage from "./WelcomeMessage";
const PostList = () => {
  const { postList, addInitialPosts } = useContext(PostListData);
  useEffect(() => {
    fetch("https://dummyjson.com/posts")
      .then((res) => res.json())
      .then((data) => {
        addInitialPosts(data.posts);
      });
  }, []);
  // const [dataFetched, setDataFetched] = useState(false);
  // if (!dataFetched) {
  //   fetch("https://dummyjson.com/posts")
  //     .then((res) => res.json())
  //     .then((data) => {
  //       addInitialPosts(data.posts);
  //       setDataFetched(true);
  //     });
  // }
  //const handelGetPostsClick = () => {
  // console.log("Get Posts Clicked");
  // fetch("https://dummyjson.com/posts")
  //   .then((res) => res.json())
  //   //.then(console.log);
  //   .then((data) => {
  //     addInitialPosts(data.posts);
  //   });
  //};
  return (
    <>
      {postList.length === 0 && (
        <WelcomeMessage
        //onGetPostsClick={handelGetPostsClick}
        />
      )}
      {postList.map((post) => (
        <Post key={post.id} post={post} />
      ))}
    </>
  );
};

export default PostList;
