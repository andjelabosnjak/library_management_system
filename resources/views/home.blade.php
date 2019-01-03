@extends('layouts.app')

@section('title','Home Page')

@section('content')
    <h1><center><i class="fa fa-book" aria-hidden="true"></i> LIBRARY MANAGEMENT SYSTEM</center></h1>
      <h5><center>Perfect solution for library management</center></h5>
        <center><div class="w-25 p-3"><h5>
                  <i>Membership charges apply:</i></h5>
                  <i><strong>Standard</strong>: 20$<i><br>
                  <i><strong>Premium</strong>: 45$ + free delivery<i>
                </div>
        </center>
<!-- Bootstrap Carousel-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('images/slide01.jpg') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/slide02.jpg') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/slide03.jpg') }}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
</div><!--/carousel slide-->
<br>
<div class="container text-center" id="about">    
    <h2>What We Do</h2><br>
    <div class="row">
      <div class="col-sm-4">
        <img src="{{ asset('images/book.jpg') }}" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-8">
              <p>
                  Modern libraries are increasingly being redefined as places to get unrestricted access to information in many formats and from many sources. They are extending services beyond the physical walls of a building,
                  by providing material accessible by electronic means, and by providing 
                  the assistance of librarians in navigating and analyzing very large amounts
                  of information with a variety of digital resources. Libraries are increasingly 
                  becoming community hubs where programs are delivered and people engage in
                  lifelong learning. As community centers, libraries are also becoming
                  increasingly important in helping communities mobilize and organize for
                  their rights.
              </p>
      </div>
    </div><!--/row-->
</div><!--/container text center--> 
<br>

<div class="container text-center">
    <h2>Vision</h2><br>
      <a href="{{asset('storage/file_pdf/vision.pdf')}}" class="btn btn-dark btn-lg btn-block" download><i class="fa fa-download"></i> Vision.pdf</a>
</div><!--/container text center-->
<br><br>

<div class="container text-center">
  <h2>Test Data</h2><br>
  <div class="row">
    <div class="col-sm">
      <table class="table table-dark table-bordered">
        <thead>
         <tr>
           <th scope="col">Test Data for Admin</th>
         </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            Email: admin@mail.com
          </td>
        </tr>
        <tr>
          <td>
            Password: 123456
          </td>
        </tr>
        </tbody>
      </table>
    </div><!--/col-sm-->
    <div class="col-sm">
        <table class="table table-dark table-bordered">
            <thead>
             <tr>
               <th scope="col">Test Data for Normal User</th>
             </tr>
            </thead>
            <tbody>
            <tr>
              <td>
                Email: john@mail.com
              </td>
            </tr>
            <tr>
              <td>
                Password: 123456
              </td>
            </tr>
            </tbody>
        </table>    
      </div><!--/col-sm-->
  </div><!--/row-->
</div><!--/container text-center-->
<br><br>

<div class="container text-center">
  <h2>Used Technologies</h2><br>
  <button class="btn btn-dark" id="hide">Hide Used Technologies</button> <br><br>
  <div class="row" id="hidden">
    <div class="col-sm">
     <table class="table table-striped table-dark table-bordered">
       <thead >
          <tr>
              <th scope="col">Frontend</th>
          </tr>
       </thead>
       <tbody>
         <tr style="text-align:left;">
           <td>
             <img src="{{ asset('images/html.jpg') }}">  <strong> HTML</strong>- The basic structure of the website 
           </td>
          </tr>
          <tr style="text-align:left;">  
           <td>
              <img src="{{ asset('images/css.png') }}">  <strong> CSS</strong>- The basic design of the website 
          </td>
         </tr>
         <tr style="text-align:left;">  
            <td>
               <img src="{{ asset('images/javascript.png') }}">  <strong>  JavaScript</strong> - Additional functionalities  
           </td>
          </tr>
          <tr style="text-align:left;">  
              <td>
                 <img src="{{ asset('images/jquery.png') }}">  <strong>  jQuery</strong> - Additional functionalities  
             </td>
            </tr>
       </tbody>
     </table>
    </div>
    <div class="col-sm">
        <table class="table table-striped table-dark table-bordered">
            <thead>
               <tr >
                   <th scope="col">Backend</th>
               </tr>
            </thead>
            <tbody>
              <tr style="text-align:left;">
                <td>
                    <img src="{{ asset('images/laravel.png') }}">  <strong>  Laravel</strong> - PHP framework 
                </td>
              </tr>
              <tr style="text-align:left;">
                  <td>
                      <img src="{{ asset('images/mysql.png') }}">  <strong>  MySQL</strong> - Database 
                  </td>
                </tr>
            </tbody>
          </table>
    </div>
  </div>
</div>
<br>

<div class="container text-center" id="contact"> 
    <h2>Contact us</h2>
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please contact us.</p>
    <div class="row">
          <div class="col-sm">
            <i class="fa fa-map-marker fa-2x"></i>
              <p>Mostar, BiH</p>
          </div>

          <div class="col-sm">
            <i class="fa fa-phone fa-2x"></i>
              <p>+ 387 234 567 89</p>
          </div>

          <div class="col-sm">
            <i class="fa fa-envelope fa-2x"></i>
              <p>mlibrary237@gmail.com</p>
          </div>
    </div><!--/row-->
</div><!--/container text center -->
@endsection
