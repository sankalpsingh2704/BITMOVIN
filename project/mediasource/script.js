
var FILE = 'test.webm';
var NUM_CHUNKS = 5;
var video = document.getElementById("myvideo");

window.MediaSource = window.MediaSource || window.WebKitMediaSource;
if (!!!window.MediaSource) {
  alert('MediaSource API is not available');
}

var mediaSource = new MediaSource();

//document.querySelector('[data-num-chunks]').textContent = NUM_CHUNKS;

video.src = window.URL.createObjectURL(mediaSource);

function callback(e) {
  var sourceBuffer = mediaSource.addSourceBuffer('video/webm; codecs="vorbis,vp8"');
  //var sourceBuffer = mediaSource.addSourceBuffer('video/mp4');
  //logger.log('mediaSource readyState: ' + this.readyState);

  GET(FILE, function(uInt8Array) {
    var file = new Blob([uInt8Array], {type: 'video/webm'});
	//var file = new Blob([uInt8Array], {type: 'video/mp4'});
    var chunkSize = Math.ceil(file.size / NUM_CHUNKS);

    //logger.log('num chunks:' + NUM_CHUNKS);
    //logger.log('chunkSize:' + chunkSize + ', totalSize:' + file.size);

    // Slice the video into NUM_CHUNKS and append each to the media element.
    var i = 0;

    (function readChunk_(i) {
      var reader = new FileReader();

      // Reads aren't guaranteed to finish in the same order they're started in,
      // so we need to read + append the next chunk after the previous reader
      // is done (onload is fired).
      reader.onload = function(e) {
        sourceBuffer.appendBuffer(new Uint8Array(e.target.result));
       /// logger.log('appending chunk:' + i);
        if (i == NUM_CHUNKS - 1) {
          mediaSource.endOfStream();
        } else {
          if (video.paused) {
            video.play(); // Start playing after 1st chunk is appended.
          }
          readChunk_(++i);
        }
      };

      var startByte = chunkSize * i;
      var chunk = file.slice(startByte, startByte + chunkSize);

      reader.readAsArrayBuffer(chunk);
    })(i);  // Start the recursive call by self calling.
  });
}

mediaSource.addEventListener('sourceopen', callback, false);
mediaSource.addEventListener('webkitsourceopen', callback, false);

mediaSource.addEventListener('webkitsourceended', function(e) {
  //logger.log('mediaSource readyState: ' + this.readyState);
}, false);

function GET(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.responseType = 'arraybuffer';
  xhr.send();

  xhr.onload = function(e) {
    if (xhr.status != 200) {
      alert("Unexpected status code " + xhr.status + " for " + url);
      return false;
    }
    callback(new Uint8Array(xhr.response));
  };
}
	
	
	
	
	
	
	/*
	var video = document.getElementById("myvideo");
			//console.log(video.src);
	//var entry = "video/webm";
	var entry = {type: "video/webm",path: "test.webm"};
	var type = entry.type; // it is always "video/webm"
	
	//var entry.path = "mgk.mp4";

   // var video = document.createElement("myvideo");
	//video.src = "mgk.mp4";
	
    var mediaSource = new MediaSource();

    video.src = window.URL.createObjectURL(mediaSource);

 mediaSource.addEventListener('webkitsourceopen', function(e) {
    var sourceBuffer = mediaSource.addSourceBuffer(type+';codecs="vorbis,vp8"');
    var obj = get({path:entry.path,request:"read"}); // this is my server get
    obj.onstarted=function(url){
        self.showVideo(video,url);
    };
    obj.onBlobRecieved=function(chunk){
        //chunk is a blob               
        sourceBuffer.append(new Uint8Array(chunk));
    }
    obj.oncomplete=function(url){
        video.play(); // for testing play on complete

    }
  },false);
  */