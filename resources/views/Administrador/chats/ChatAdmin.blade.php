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
    <!--- <div class="discussion">
          <div class="photo" style="background-image: url(http://e0.365dm.com/16/08/16-9/20/theirry-henry-sky-sports-pundit_3766131.jpg?20161212144602);">
            <div class="online"></div>
          </div>
          <div class="desc-contact">
            <p class="name">Dave Corlew</p>
            <p class="message">Let's meet for a coffee or something today ?</p>
          </div>
          <div class="timer">3 min</div>
        </div> -->
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
    apiKey: "AIzaSyD_57Ysw5B4OoPz-fJYPPb2n67KTk89fOU",
    authDomain: "pruebaaxessj.firebaseapp.com",
    projectId: "pruebaaxessj",
    databaseURL: "https://pruebaaxessj.firebaseio.com",
    storageBucket: "pruebaaxessj.appspot.com",
    messagingSenderId: "1030241529332",
    appId: "1:1030241529332:web:6be0fb79a0742c432c5da1",
    measurementId: "G-KFTBVF70K3"
  };
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  const auth = firebase.auth();
  const db=firebase.firestore();
</script>
<script src="../Administrador/js/adminchat.js"><script>
@stop