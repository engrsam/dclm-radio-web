<!--
https://dev.to/dev_amaz/using-fetch-api-to-get-and-post--1g7d
https://www.techiediaries.com/javascript/document-ready-vs-window-onload-vs-window-load/

-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Get It Now</title>

  <link rel="stylesheet" type="text/css" href="assets/css/util.css"/>
  <style>
    body {
      text-align: center;
      margin: auto;
    }
    div {
      border-style: solid;
      border-color: coral;
    }
  </style>
</head>

<body>

<div> <?php var_dump(openssl_get_cert_locations()); ?> </div>

<div> <?php
require __DIR__ . '/vendor/autoload.php';
$api = \AzuraCast\Api\Client::create(
	'<IP-Address | Host>',
	'<API Key>'
);

$nowPlaying = $api->nowPlaying();
echo $nowPlaying->getCurrentSong()->getSong()->getTitle();

?> </div>









</body>

<script>
window.addEventListener('load',
function radioInfo(){
// code to execute
fetch('https://stat1.dclm.org/api/nowplaying')
.then((res) => { return res.json() })
.then((data) => {
    let result = `<h2> DCLM Radio Info</h2>`;
    data.forEach((nowplaying) => {
        //const { id, name, email, address: { city, street } } = nowplaying
        const { station: { id, name, listen_url }, listeners: { total }, now_playing: { elapsed, song: { title, art } } } = nowplaying;
        if (id == 1){
        result +=
            `<div>
                <h5> Station ID: ${id} </h5>
                    <ul class="w3-ul">
                        <li> Station Name : ${name}</li>
                        <li> Station URL : ${listen_url} </li>
                        <li> Station Song Title : ${title} </li>
                        <li> Station Listeners : ${total} </li>
                    </ul>
            </div>`;
            document.getElementById('art').src = `${art}`;
            document.getElementById('result').innerHTML = result;
            }
            });

        })

})
</script>

<script>
  function play(){
       var audio = document.getElementById("audio");
       audio.play();
      }
</script>
</html>