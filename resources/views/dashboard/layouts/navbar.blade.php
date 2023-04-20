<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

      <button type="button" id="sidebarCollapse" class="btn btn-primary">
        <i class="fa fa-bars"></i>
        <span class="sr-only">Toggle Menu</span>
      </button>
      <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="#">#Link1</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">#Link2</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">#Link3</a>
          </li>
          <li class="nav-link">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-dark" onclick="return confirm('are you sure?')"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>