<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  @include('./template/head')

  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

      @include('./template/nav')

      <section>
        @yield('content')
      </section>

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    @include('./template/footer')

  </body>

</html>