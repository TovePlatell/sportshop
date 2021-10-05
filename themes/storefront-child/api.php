<?php
/* Template Name: api*/
get_header();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>sportshop</title>
</head>

<body>

    <div id="test">hej

    </div>

</body>

<script>
const testEl = document.querySelector('#test')

function fetchData() {
    fetch('http://localhost:10008/wp-json/wp/v2/posts')
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
</script>



</html>

<? get_footer(); ?>