<link rel="stylesheet" type="text/css" href="../Administrador/css/adminchat.css">
@extends('adminlte::page')

@section('title', 'Tienda Axes | Administrador')

@section('content')
<input type="hidden" id="csrf" value="{{csrf_token()}}"/>
<div class="row">    
<section class="discussions" id="contactos">
    <div class="discussion search">
      <div class="searchbar">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" placeholder="Search..."/>
      </div>
    </div>
    <!-- clase message-active cuando el admin le da click  -->
</section>
  <section class="chat" id="chat">
    
  </section>

</div>
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-analytics.js"></script>
<script>
  var firebaseConfig = {
    apiKey: "AIzaSyCMzY42dtyJgXPfzCKZzKp-W2sOvvJcQAM",
    authDomain: "pruebatiendaaxes-4d509.firebaseapp.com",
    databaseURL: "https://pruebatiendaaxes-4d509-default-rtdb.firebaseio.com",
    projectId: "pruebatiendaaxes-4d509",
    storageBucket: "pruebatiendaaxes-4d509.appspot.com",
    messagingSenderId: "664697906282",
    appId: "1:664697906282:web:4f91c9d720ef40bfb75613",
    measurementId: "G-KTH3MNV6R9"
  };
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  const auth = firebase.auth();
  const db=firebase.firestore();
</script>
<script src="../Administrador/js/adminchat.js"><script>
@stop