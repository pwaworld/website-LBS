document.addEventListener("DOMContentLoaded", function () {

	'use strict';

console.log("blog loaded ");

var dataListContainer = document.getElementById("data-list");


// Example usage
var apiUrl = 'https://public-api.wordpress.com/rest/v1/read/tags/wordpress/posts/?number=9';
sendGetRequest(apiUrl, function(error, data) {
  if (error) {
    console.error('Error:', error);
  } else {
    console.log('Data:', data);

    var date_rangeData = data.date_range;
    console.log('date_rangeData :', date_rangeData);

    
    var countOfPosts = data.number;
    console.log('countOfPosts :', countOfPosts);

    
    var postsDataList = data.posts;
    //console.log('postsDataList :', postsDataList);

     // Loop through the data array and create list items
     for (var i = 0; i < postsDataList.length; i++) {
          var listItem = document.createElement("li");        
          
          var title = postsDataList[i].title;
          //console.log('title  :', title);
          listItem.textContent = postsDataList[i].title;
          dataListContainer.appendChild(listItem);

          var URL = postsDataList[i].URL;
          console.log('title , URL  :', title, URL);


          var post_thumbnail = postsDataList[i].post_thumbnail;
          console.log('post_thumbnail  :', post_thumbnail);


    }


  }
});




function sendGetRequest(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Request was successful, parse response and pass it to the callback
        var response = JSON.parse(xhr.responseText);
        callback(null, response);
      } else {
        // Request failed, pass an error to the callback
        callback(new Error('Request failed with status: ' + xhr.status));
      }
    }
  };
  
  xhr.send();
}





});




