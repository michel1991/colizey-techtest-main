import {Post} from "./types";

function createPostCard(post: Post): string {
  return `<section class="card">
            <img src="${post.imageUrl}" alt="Post image">
            <div class="texts">
                <h4>${post.title}</h4>
                <p>${post.description} </p>
                 <button type="submit">${post.author.name}</button>
            </div>
        </section>`;
}

export function createAllPostCard(posts: Array<Post>): string {
  return posts.map(createPostCard).join(' ');
}
