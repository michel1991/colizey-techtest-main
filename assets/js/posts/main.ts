import './main.css';
import {Post} from "./types";
import {fetchAllPosts} from "./fetchAllPosts";
import {createAllPostCard} from "./postCardFactory";


function getCardContainer(document: Document) : HTMLInputElement {
  return document.querySelector(".container");
}

function addPostToDOM(document: Document, posts: Array<Post>){
  const cardContainer  = getCardContainer(document);
  cardContainer.innerHTML = createAllPostCard(posts);
}

window.addEventListener("DOMContentLoaded", (event) => {
  const cardContainer  = getCardContainer(document);
  const urlToPost = cardContainer.getAttribute('data-url-to-posts');
  if(urlToPost){
    fetchAllPosts(urlToPost)
      .then(data => {
        addPostToDOM(document, data);
      })
      .catch(error => console.error(error));
  }
});

