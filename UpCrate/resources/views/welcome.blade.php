<html>
    <head>
       
    <style>
        body{
            margin: 0px;
            padding: 0px;
            background-image: url('img/BG.jpg');
            background-size: 100% 100%;
            background-attachment: fixed;
        }    
        .d1{
            margin-top: 135px;
            margin-left: 300px;
        }
        .d8{
            margin-top: 100px;
            margin-left: 1200px;
        }
        .d2{
            margin-left: -150px;
            margin-top: -700px;
        }
        .d3{
            margin-top: -650px;
        }
        .d4{
            margin-top: -1050px;
        }
        .d5{
            margin-top: -600px;
            margin-left: 100px;
        }
        .d6{
            margin-top: 250px;
            margin-left: 840px;
        }
        .d7{
            margin-top: 500px;
            margin-left: 800px;
        }
{{-- 
        html, body {
  /* background: #222;
  overflow: hidden;
  width: 100%;
  height: 100%; */
} --}}

.view {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  -webkit-perspective: 400;
          perspective: 400;
}

.plane {
  width: 120px;
  height: 120px;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}
.plane.main {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  -webkit-transform: rotateX(60deg) rotateZ(-30deg);
          transform: rotateX(60deg) rotateZ(-30deg);
  -webkit-animation: rotate 20s infinite linear;
          animation: rotate 20s infinite linear;
}
.plane.main .circle {
  width: 120px;
  height: 120px;
  position: absolute;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
  border-radius: 100%;
  box-sizing: border-box;
  box-shadow: 0 0 60px black, inset 0 0 60px black;
}

a:hover .plane.main .circle {
  width: 120px;
  height: 120px;
  position: absolute;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
  border-radius: 100%;
  box-sizing: border-box;
  box-shadow: 0 0 60px black, inset 0 0 60px crimson;
}

a:hover .plane.main .circle::before, .plane.main .circle::after {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  width: 10%;
  height: 10%;
  border-radius: 100%;
  background: purple;
  box-sizing: border-box;
  box-shadow: 0 0 60px 2px crimson;
}

.plane.main .circle::before, .plane.main .circle::after {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  width: 10%;
  height: 10%;
  border-radius: 100%;
  background: black;
  box-sizing: border-box;
  box-shadow: 0 0 60px 2px crimson;
}
.plane.main .circle::before {
  -webkit-transform: translateZ(-90px);
          transform: translateZ(-90px);
}
.plane.main .circle::after {
  -webkit-transform: translateZ(90px);
          transform: translateZ(90px);
}
.plane.main .circle:nth-child(1) {
  -webkit-transform: rotateZ(72deg) rotateX(63.435deg);
          transform: rotateZ(72deg) rotateX(63.435deg);
}
.plane.main .circle:nth-child(2) {
  -webkit-transform: rotateZ(144deg) rotateX(63.435deg);
          transform: rotateZ(144deg) rotateX(63.435deg);
}
.plane.main .circle:nth-child(3) {
  -webkit-transform: rotateZ(216deg) rotateX(63.435deg);
          transform: rotateZ(216deg) rotateX(63.435deg);
}
.plane.main .circle:nth-child(4) {
  -webkit-transform: rotateZ(288deg) rotateX(63.435deg);
          transform: rotateZ(288deg) rotateX(63.435deg);
}
.plane.main .circle:nth-child(5) {
  -webkit-transform: rotateZ(360deg) rotateX(63.435deg);
          transform: rotateZ(360deg) rotateX(63.435deg);
}

@-webkit-keyframes rotate {
  0% {
    -webkit-transform: rotateX(0) rotateY(0) rotateZ(0);
            transform: rotateX(0) rotateY(0) rotateZ(0);
  }
  100% {
    -webkit-transform: rotateX(360deg) rotateY(360deg) rotateZ(360deg);
            transform: rotateX(360deg) rotateY(360deg) rotateZ(360deg);
  }
}

@keyframes rotate {
  0% {
    -webkit-transform: rotateX(0) rotateY(0) rotateZ(0);
            transform: rotateX(0) rotateY(0) rotateZ(0);
  }
  100% {
    -webkit-transform: rotateX(360deg) rotateY(360deg) rotateZ(360deg);
            transform: rotateX(360deg) rotateY(360deg) rotateZ(360deg);
  }
}

    </style>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        

        <div class="rellax d1">
            <img src="{{ asset('img/2.png') }}" width="81%"/>
      </div>

      <div class="rellax d5" data-rellax-speed="1">
            {{-- <img src="{{ asset('img/nick.jpg') }}" width="15%"/> --}}
            <a href="/register"><div class="view">
                <div class="plane main">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>
            </a>
      </div>
      
      <div class="rellax d8">
            {{-- <p style="font-size:100px">UpCrate</p> --}}
      </div>

      <div class="rellax d7" data-rellax-speed="8">
            {{-- <img src="{{ asset('img/thavy.jpg') }}" width="15%"/> --}}
        </div>
      
      <div class="rellax d2" data-rellax-speed="6">
            <img src="{{ asset('img/1.png') }}" width="100%"/>
      </div>
      
      <div class="rellax d3" data-rellax-speed="8">
            <img src="{{ asset('img/3.png') }}" width="70%"/>
      </div>

      


      
      <div class="rellax d4" data-rellax-speed="2">
            <img src="{{ asset('img/4.png') }}" width="90%"/>
      </div>
      
      
      
       <div class="rellax d6" data-rellax-speed="4">
  
            {{-- <img src="{{ asset('img/nick.jpg') }}" width="30%"/> --}}
      </div>
      <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
      <script>
          var rellax = new Rellax('.rellax', {
          // center: true
          callback: function(position) {
              // callback every position change
              console.log(position);
          }
        });
      </script>
        <script>
            var rellax = new Rellax('.rellax', {
            // center: true
            callback: function(position) {
                // callback every position change
                console.log(position);
            }
          });
        </script>
    </body>
</html>

