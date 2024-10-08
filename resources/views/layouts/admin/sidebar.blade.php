  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin">
          <i class="bi bi-grid"></i>
          <span>Trang Chủ</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/new">
          <i class="bi bi-plus-circle"></i>
          <span>Tạo Mới Sản Phẩm</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/tin-tuc">
          <i class="bi bi-newspaper"></i>
          <span>Danh Sách Bài Viết</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/tin-tuc/new">
          <i class="bi bi-plus-circle"></i>
          <span>Tạo Mới Bài Viết</span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->

{{-- @section('extend_js') --}}
<script>
  $( document ).ready(function() {
    const current = window.location.href;
    document.querySelectorAll(".nav-item a").forEach(function(elem) {
      if(elem.href === current) {
        elem.classList.remove("collapsed");
      } else {
        elem.classList.add("collapsed");
      }
    });
  })
</script>
{{-- @stop --}}
