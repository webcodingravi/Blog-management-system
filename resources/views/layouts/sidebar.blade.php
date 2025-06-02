<aside id="sidebar" class="overflow-auto sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(1) != 'category' ? 'collapsed' : ''}}" href="{{route('category.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Categroy</span>
        </a>
      </li>

           <li class="nav-item">
        <a class="nav-link text-dark {{Request::segment(1) != 'blog' ? 'collapsed' : ''}}" href="{{route('blog.list')}}">
            <i class="bx bxs-spreadsheet" style="color: #cc9966;"></i>
          <span>Blog</span>
        </a>
      </li>






    </ul>

  </aside>
