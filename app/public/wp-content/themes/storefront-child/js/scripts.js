
 const testEl = document.querySelector('#test')

function fetchData() {
 fetch('/wp-json/wp/v2/posts')
 .then(response => {
 return response.json()
 })
 .then(data => {
 data.map(item => {
 const blogDiv = document.createElement('div')
 blogDiv.classList.add('test-class')
 blogDiv.innerText = item.id
 testEl.appendChild(blogDiv)
 })
 })
}
fetchData(); 


 /*
 const requestOptions = {
  method = 'GET',
  redirect = 'follow'
};

fetch("http://localhost:10008/wp-json/wp/v2/posts", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));  
 */

