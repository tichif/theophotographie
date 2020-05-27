@extends('front.layout.app')

@section('content')
<section id="contact-page">
  <h1>Contactez-nous</h1>
   <div class="contact-page-center">
         <article id="form">
           <form method="POST" action="{{ url('/contact') }}">
            @csrf
           <div class="center-1">
             <input type="text" name="firstname" id="firstname" 
             placeholder="Prénom (obligatoire)">
             @if ($errors->has('firstname'))
                <p class="error firstname_error">
                  {{ $errors->first('firstname') }}
                </p>
             @endif
             <input type="text" name="lastname" id="lastname" placeholder="Nom(required)">
             @if ($errors->has('lastname'))
                <p class="error lastname_error">
                  {{ $errors->first('lastname') }}
                </p>
             @endif
           </div>
           <div class="center-2">
             <input type="email" name="email" id="email" placeholder="Email (obligatoire)">
             @if ($errors->has('email'))
                <p class="error email_error">
                  {{ $errors->first('email') }}
                </p>
             @endif
           </div>
           <div class="center-3">
             <input type="text" name="subject" id="subject" placeholder="Sujet (obligatoire)">
             @if ($errors->has('subject'))
                <p class="error subject_error">
                  {{ $errors->first('subject') }}
                </p>
             @endif
           </div>
           <div class="center-4">
             <textarea name="message" id="message" rows="10" placeholder="Message (obligatoire)" ></textarea>
             @if ($errors->has('message'))
                <p class="error message_error">
                  {{ $errors->first('message') }}
                </p>
             @endif
           </div>
           <button type="submit"><i class="fa fa-envelope"></i> Send Message</button>
         </form> 
         </article>
         
         <article id="info">
           <div class="item_info">
             <i class="fa fa-map-marker"></i>
             <p>17, Fontamara 45, Carrefour (Haiti)</p>
           </div>
 
           <div class="item_info">
             <i class="fa fa-phone"></i>
             <p>(+509) 36472578</p>
           </div>
           
           <div class="item_info">
             <i class="fa fa-phone"></i>
             <p>(+509) 36004245</p>
           </div>
 
           <div class="item_info">
             <i class="fa fa-envelope"></i>
             <p>theophotography35@gmail.com</p>
           </div>
           
           <div>
             <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3782.9678595634896!2d-72.3755778!3d18.5303545!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb9c2d4fe9619e9%3A0xb8a76154de04b510!2s45%20Fontamara%2047%2C%20Carrefour!5e0!3m2!1sfr!2sht!4v1582571734885!5m2!1sfr!2sht" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe></iframe>
           </div>
         </article>
       </div>
       
     </section>
@endsection