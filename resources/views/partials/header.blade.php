<nav class="navbar navbar-expand  shadow py-3">
    <div class="container">
      <a class="navbar-brand" href="{{(route('main'))}}">The Quran</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="direction: rtl">
          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{(route('main'))}}">الرئيسية</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('reciters')}}">القراء</a>
          </li>
          
        </ul>
      </div>
      
      <i class="fas fa-cog" onclick="openNav()" style="cursor: pointer"></i>
      
      
    </div>
  </nav>