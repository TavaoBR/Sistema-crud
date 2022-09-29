<div class="body-overlay"></div>
         <nav id="sidebar">
              <div class="sidebar-header">
                <h3><img src="https://devporai.com.br/wp-content/uploads/2021/01/O-que-e-CRUD.jpg" class="img-fluid"><span>Sistema-CRUD</span></h3>
               </div>
               <ul class="list-unstyled components">
                  <li class="active">
                  <a href="#"><img src="https://i.pinimg.com/originals/98/b2/09/98b2098575be206677508d42f6c5c945.jpg" alt="Avatar Logo" style="width:40px;" class="rounded-pill">&nbsp;&nbsp;&nbsp;<span>Maluco</span></a>
                  </li>

                  <div class="small-screen navbar-display">
				
				<li  class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#"><i class="material-icons">apps</i><span>apps</span></a>
                </li>
				
				 <li  class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#"><i class="material-icons">person</i><span>user</span></a>
                </li>
				
				<li  class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#"><i class="material-icons">settings</i><span>setting</span></a>
                </li>
				</div>
                  
                       <li  class="">
                          <a href="#"><i class="material-icons">send</i><span>Comunicar</span></a>
                       </li>

                        <li  class="">
                          <a href="#"><i class="material-icons">forward_to_inbox</i><span>Enviados</span></a>
                        </li>

                        <li  class="">
                          <a href="#"><i class="material-icons">mark_email_unread</i><span>Recebidos</span></a>
                        </li>

                        
                        <li  class="">
                          <a href="#"><i class="material-icons">mark_unread_chat_alt</i><span>Respondidos</span></a>
                        </li>

                <li class="">
                    <a href="#"><i class="material-icons">logout</i><span>Sair</span></a>
                </li>
              </ul> 
        </nav>


<script src="/APP/public/scripts/jquery-3.3.1.slim.min.js"></script>
<script src="/APP/public/scripts/popper.min.js"></script>
<script src="/APP/public/scripts/bootstrap.min.js"></script>
<script src="/APP/public/scripts/jquery-3.3.1.min.js"></script>
<script src="/APP/public/scripts/jquery.mask.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
				$('#content').toggleClass('active');
            });
			
			 $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
			
        });
</script>