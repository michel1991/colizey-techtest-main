import {Post} from "./types";

export async function fetchAllPosts(url: string): Promise<Array<Post>> {
  const response = await fetch(url);
  if (response.status === 200) {
    return response.json();
  } else {
    const error = new Error(`Some error occurred "${response.statusText}"`)
    return Promise.reject(error)
  }
}
