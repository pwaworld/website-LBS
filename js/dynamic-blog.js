document.addEventListener("DOMContentLoaded", function () {

	'use strict';

console.log("blog loaded ");

var dataListContainer = document.getElementById("data-list");

//var apiUrlLbs = 'http://localhost/web/website-LBS/admin/api-all-blogs.php';

var apiUrlLbs = 'https://littleblackstarfx.com/admin/api-all-blogs.php';


sendGetRequest(apiUrlLbs, function(error, data) {
  if (error) {
    console.error('Error:', error);
  } else {
    console.log('blog Data:', data);

    var blogPostsDataList = data;
    //console.log('postsDataList :', postsDataList);

     // Loop through the data array and create list items
     for (var i = 0; i < blogPostsDataList.length; i++) {
                
          
          var title = blogPostsDataList[i].title;
          var m_description1 = blogPostsDataList[i].m_description1;
          var datee = blogPostsDataList[i].created_at;


          document.getElementById("ptitle").innerHTML = title;
          document.getElementById("pdate").innerHTML = datee;

          document.getElementById("p1").innerHTML = m_description1;
          document.getElementById("p2").innerHTML = blogPostsDataList[i].m_description2;
          document.getElementById("p3").innerHTML = blogPostsDataList[i].m_description3;
          document.getElementById("p4").innerHTML = blogPostsDataList[i].m_description4;

          //console.log('title  :', title);
         
          console.log('title :', title);
          console.log('Date posted  :', datee);
          console.log('m_description1 :  :', m_description1);



    }

  }
});







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




