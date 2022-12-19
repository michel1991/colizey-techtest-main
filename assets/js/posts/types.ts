export type Author = {
  name: string,
}

export type Post = {
  id: string,
  title: string,
  description: string
  imageUrl: string,
  author: Author
}
