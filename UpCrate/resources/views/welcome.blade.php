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

         .right-click-prompt {
    bottom: 0;
    color: #c1ced9;
    font-size: .7em;
    font-weight: bold;
    left: 50%;
    letter-spacing: .05em;
    padding: 40px;
    position: absolute;
    text-transform: uppercase;
    -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
    }

    @media (max-height: 430px) {
    .right-click-prompt {
        left: 0;
        -webkit-transform: translateX(0);
                transform: translateX(0);
    }
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

      {{-- <div class="rellax d4" data-rellax-speed="100">
            <center><p style="font-size: 350px; color: #CE2029;" class="dope">UPCRATE</p></center>
            
      </div> --}}

      <div class="rellax d5" data-rellax-speed="1">
            {{-- <img src="{{ asset('img/nick.jpg') }}" width="15%"/> --}}
        <a data-toggle="modal" data-target="#registerModal"><div class="view">
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
        
        <!-- Modal -->
        <div class="modal fade" id="registerModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register/Login for UpCrate</h4>
                </div>
                <div class="modal-body">
                {{-- <div class="container"> --}}
                        <div id="content">
                            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                                <li class="active"><a href="#red" data-toggle="tab">Login</a></li>
                                <li><a href="#orange" data-toggle="tab">Register</a></li>
                            </ul>
                            <div id="my-tab-content" class="tab-content">
                                <div class="tab-pane active" id="red">
                                    <br>
                                        <form method="POST" action="{{ route('login') }}">
                                                {{ csrf_field() }}             
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <label for="email" class="control-label">E-Mail Address</label>
        
                                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        
                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
        
                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label for="password" class="control-label">Password</label>
        
                                                            <input id="password" type="password" class="form-control" name="password" required>
        
                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
        
                                                    <div class="form-group">
                                                            <button type="submit" class="btn btn-primary" formaction="{{ route('login')}}">
                                                                Login
                                                            </button>
        
                                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                Forgot Your Password?
                                                            </a>
                                                    </div>
                                                </form>
                                                <br>
                                </div>
                                <div class="tab-pane" id="orange">
                                    <br>
                                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                                {{ csrf_field() }}
                        
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="name" class="col-md-4 control-label">Name</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        
                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        
                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        
                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="col-md-4 control-label">Password</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control" name="password" required>
                        
                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                    </div>
                                                </div>
                        
                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Register
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <br>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
                        {{-- </div> --}}
                        
                       
                                        
    <div class="right-click-prompt">
            <p class="right-click-prompt__label">
             @ UpCrate Team </p>
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

