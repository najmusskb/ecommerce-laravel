
<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>

@include('backend.includes.header')
@include('backend.includes.css')


 
</head>

<body>

 @include('backend.includes.preloader')

  <div id="app">
    <div class="main-wrapper main-wrapper-1">


       @include('backend.includes.topbar')
       @include('backend.includes.sidebar')
       @include('backend.includes.settingsSidebar')

<div class="main-content">
     @yield('body')
</div>

  






      @include('backend.includes.footer')
    </div>
  </div>
        @include('backend.includes.script')
</body>
</html>