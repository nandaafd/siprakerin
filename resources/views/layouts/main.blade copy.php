<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/mycolors.css') }}">

    <title>home</title>
  </head>
  <body class="d-flex flex-column" style="height: fit-content">

    @include('partials.navbar')

      <div class="container-fluid mt-4" id="content">
        @yield('container')
      </div>
    
      @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <script>
      function btnConfirmLogout() {
        let text = "Are you sure?";
        if (confirm(text) == true) {
          return true;
        } else {
          return false;
        }
        document.getElementById("demo").innerHTML = text;
      }
      function showPassword() {
        var x = document.getElementById("password");
        var y = document.getElementById("password_confirmation");
        var z = document.getElementById("current_password");
        if (x.type === "password") {
          x.type = "text";
          y.type = "text";
          z.type = "text";
        } else {
          x.type = "password";
          y.type = "password";
          z.type = "password";
        }
      }

      function showPassword() {
        var x = document.getElementById("password");
        var y = document.getElementById("password_confirmation");
        var z = document.getElementById("current_password");
        if (x.type === "password") {
          x.type = "text";
          y.type = "text";
          z.type = "text";
        } else {
          x.type = "password";
          y.type = "password";
          z.type = "password";
        }
      }
      </script>
  </body>
</html>