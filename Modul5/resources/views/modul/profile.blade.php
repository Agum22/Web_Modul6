@extends('layouts.modul.template')

@section('body')
<div class="tampilan">
    <div class="tampilan2">
        <h1>Hello</h1>
     <h3 class="kata">Informatic Student at Universitas Muhammadiyah Malang</h3>
    </div>
</div>

<div class="avatar">
   <span id="avtr"></span>
   <div class="aturprofile">
       <img id = gambar src="{{ url('assets/profile/avatar2.png') }}" alt="gambar">
   </div>
   <br><br>
   <h2>About me</h2>
   <div class="isi">
    <p>
        <br>
        My name is Muhammad Jihan Gumeular, usually called Agum, 
        20 years old. I study S1 Informatics Study Program at the 
        University of Muhammadiyah Malang, i like satay and orange juice
    </p>
   </div>
   <hr>

   <div class="hobby">
       <h2>Hobby</h2>
       <div class="isi2">
        <p>
            <br>
            My hobbies are playing football, swimming and trying new things
        </p>
       </div>
       
   </div>
   <hr>
   <div class="minat bakat">
       <h2>Interest Talent</h2>
       <div class="isi3">
            <p>
                <br>
                I'm interested in network security, 
                because I want to learn more about network security
            </p>
       </div>
       
   </div>
   <hr>
   <div class="penutup">
        <h2> Contact Me</h2>
        <div class="contact">
            <a class = link href="https://www.instagram.com/agumgumeular/">Instagram</a>
            <a class = link href="https://mail.google.com/mail/">Mail</a>
            <a class = link href="https://twitter.com/AgumBys">Twitter</a>
            <a class = link href="https://github.com/Agum22">Github</a>

        </div>

   </div>
    
</div>
@endsection