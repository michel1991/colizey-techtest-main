import './main.css';
window.addEventListener("DOMContentLoaded", (event) => {
  const searchButton : HTMLButtonElement = document.querySelector(".redirectToResult");
  searchButton.addEventListener('click', (event) => {
    const urlToResultPage = searchButton.getAttribute('data-url-to-result-page');
    if( urlToResultPage){
      window.location.href = urlToResultPage;
    }
  });
});



