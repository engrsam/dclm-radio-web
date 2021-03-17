// Listeners count code 
  window.addEventListener('load',
  function getAPI(){
  // code to execute
  fetch('https://stat1.dclm.org/api/nowplaying/1')
    .then((res) => { return res.json() })
    .then((data) => {
      //console.log(data.listeners.current);
      document.getElementById('artist').innerHTML = data.now_playing.song.artist;
      document.getElementById('title').innerHTML = data.now_playing.song.title;
      document.getElementById('listeners').innerHTML = data.listeners.current;
      document.getElementById('art').src = data.now_playing.song.art;
    })
    setTimeout(getAPI, 60000);
  })
