<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>@yield('title' , 'unknown')</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../home">home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../data">books</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <main class="container">

        @section('pageContant')
            <h3 style="min-height:86vh;">welcome in our book shop</h3>
        </div>

          @show
      </main>
      <footer style="text-align: center;background-color:rgba(0, 0, 0, 0.2);">
        <p>2022 &copy; task-group</p>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
