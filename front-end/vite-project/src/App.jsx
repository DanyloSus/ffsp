import { useEffect, useState } from "react";

const App = () => {
  const [posts, setPosts] = useState();

  useEffect(() => {
    fetch(
      "https://blog-d1e65-default-rtdb.europe-west1.firebasedatabase.app/posts.json"
    )
      .then((res) => res.json())
      .then((data) => setPosts(data));
  }, []);

  console.log(posts);

  const onSubmit = (e) => {
    e.preventDefault();

    const title = e.target.title.value;
    const content = e.target.content.value;

    fetch("http://localhost:8080/", {
      method: "post",
      body: [title, content],
    });
  };

  return (
    <>
      <form onSubmit={onSubmit}>
        <label htmlFor="title">Title</label>
        <input id="title" />
        <label htmlFor="content">Content</label>
        <input id="content" />
        <button type="submit">Submit</button>
      </form>
      {posts
        ? posts.map((e, index) => (
            <div key={index}>
              <h2>{e.title}</h2>
              <p>{e.body}</p>
            </div>
          ))
        : null}
    </>
  );
};

export default App;
