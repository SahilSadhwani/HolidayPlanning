$(function(){
    
//    alert("ih");
    
    $(document).ready(function () {

    $('#add_customer_form').validate({
        rules: {
            user_name: {
                required: true
            },
            user_contact: {
                required: true
            }
        },
        submitHandler: function (form) { // for demo
            alert('valid form');
            return false;
        }
    });

    // programmatically check any element using the `.valid()` method.
    $('#register_btn').on('click', function () {
//        alert("hi");
        $('input[name="user_name"]').valid();
        
    });

    // programmatically check the entire form using the `.valid()` method.

//    $('#event2').on('click', function () {
//        $('#myform').valid();
//    });

});
    
//    alert("hi");    
    
    
    
    $('#user_name').on('input', function() {
	var input=$(this);
	var is_name=input.val();
//	if(is_name){input.removeClass("invalid").addClass("valid");}
//	else{input.removeClass("valid").addClass("invalid");}
    
    if(!is_name){
//        addClass("error");
    }    
        
});
    
    
    
    
    
    
    
    
    
    
    
    
    
    var flag_hotel = false;
    $("#hotel-search").click(function(){
//       alert("hi");
        if(flag_hotel==false){
            $(".search_hotel").css("display","block");
            
            flag_hotel=true;
        }
       else{
            $(".search_hotel").css("display","none");
            flag_hotel=false;
        }
        $(".cancel").click(function(){
            $(".search_hotel").css("display","none");
        });
        $("#flight-search").click(function(){
            $(".search_hotel").css("display","none");
        });
        $("#account").click(function(){
            $(".search_hotel").css("display","none");
        });
        
       });
    
    
    var flag_flight = false;
    $("#flight-search").click(function(){
//       alert("hi");
        if(flag_flight==false){
            $(".search_flight").css("display","block");
            
            flag_flight=true;
        }
       else{
            $(".search_flight").css("display","none");
            flag_flight=false;
        }
        $(".cancel").click(function(){
            $(".search_flight").css("display","none");
        });
        $("#hotel-search").click(function(){
            $(".search_flight").css("display","none");
        });
        $("#account").click(function(){
            $(".search_flight").css("display","none");
        });
        
        
        
       });
    
    
    
     var flag_acc = false;
    $("#account").click(function(){
//       alert("hi");
        if(flag_acc==false){
            $(".account").css("display","block");
            
            flag_acc=true;
        }
       else{
            $(".account").css("display","none");
            flag_acc=false;
        }
        $(".cancel").click(function(){
            $(".account").css("display","none");
        });
        $("#hotel-search").click(function(){
            $(".account").css("display","none");
        });
        $("#flight-search").click(function(){
            $(".account").css("display","none");
        });
        
       });
    
    
    
    
//    alert("hi");
    var flag_login = false;
    $("#login-page").click(function(){
//       alert("hi");
        if(flag_login==false){
            $(".login").css("display","block");
            $(".account").css("display","none");
            flag_login=true;
        }
       else{
            $(".login").css("display","none");
            flag_login=false;
        }
        $(".cancel").click(function(){
            $(".login").css("display","none");
        });
        $("#account").click(function(){
            $(".login").css("display","none");
        });
        $("#hotel-search").click(function(){
            $(".login").css("display","none");
        });
        $("#flight-search").click(function(){
            $(".login").css("display","none");
        });
        
        
       });
    
    
    
    
    
    var flag_signup = false;
    $("#signup-page").click(function(){
//       alert("hi");
        if(flag_signup==false){
            $(".signup").css("display","block");
            $(".account").css("display","none");
            flag_signup=true;
        }
       else{
            $(".signup").css("display","none");
            flag_signup=false;
        }
        $(".cancel").click(function(){
            $(".signup").css("display","none");
        });
        $("#account").click(function(){
            $(".signup").css("display","none");
        });
        $("#hotel-search").click(function(){
            $(".signup").css("display","none");
        });
        $("#flight-search").click(function(){
            $(".signup").css("display","none");
        });
        
        
        
       });
    
    
    
    
    
/*==================================================================================================================================                              HOLIDAY SECTION 1 JS                                                                               
===================================================================================================================================*/
    
//    $('.under-holiday-section').owlCarousel({
//        items: 3,
//        autoplay: true,
//        smartSpeed: 700,
//        loop: true,
//        autoplayHoverPause: true,
//        responsive: {                       /* responsive k saath object {} daalna padta */
//            0:{                                     
//                items: 1,
//                autoplayHoverPause: false,
//            },
//            480:{
//                items: 1,
//            },
//            768:{
//                items: 1,
//            },
//        },
//    });
    
    
/*==================================================================================================================================                              CONTEST SECTION JS                                                                               
===================================================================================================================================*/
    
    $('.counter').counterUp({
    delay: 5,
    time: 1000
});
    
    
//   alert("hi");
    
    
//    var flag1 = false;
//    $(document).on('click','#hotel-search', function(e){
//        var xhr = new XMLHttpRequest();
//        xhr.open('GET', 'includes/search-hotel.php', true);
//        
//        xhr.onprogress = function(){
//        }
//        
//        xhr.onload = function(){
//            if(this.status == 200 && flag1 == false){
//                console.log(this.responseText);
//                document.getElementById('text').innerHTML = this.responseText;
//                flag1 = true;
//                
//            }else if(this.status = 404){
//                document.getElementById('text').innerHTML = 'Not Found';
//                
//            }else if(flag1 == true){
//                flag1 = false;
//                xhr.close();
//                
//            }
//            $(".cancel").click(function(){
//                xhr.close();
//                
//            });
//        }
//        xhr.onerror = function(){
//        }
//        
//        xhr.send();
//        });
//    
    
    
    
    
    /////////////flight search///////////////////////
    
    
//     var flag1 = false;
//
//    $(document).on('click','#flight-search', function(e){
//        var xhr = new XMLHttpRequest();
//        xhr.open('GET', 'includes/search-flight.php', true);
//        
//        xhr.onprogress = function(){
//        }
//        
//        xhr.onload = function(){
//            if(this.status == 200 && flag1 == false){
//                console.log(this.responseText);
//                document.getElementById('text').innerHTML = this.responseText;
//                flag1 = true;
//                
//            }else if(this.status = 404){
//                document.getElementById('text').innerHTML = 'Not Found';
//                
//            }else if(flag1 == true){
//                flag1 = false;
//                xhr.close();
//                
//            }
//            $(".cancel").click(function(){
//                xhr.close();
//                
//            });
//        }
//        xhr.onerror = function(){
//        }
//        
//        xhr.send();
//        });
    
    
    
    
    
    
    
    
    var flag1 = false;

    $(document).on('click','#custom', function(e){

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'includes/search-customize.php', true);
        
        xhr.onprogress = function(){

        }
        
        xhr.onload = function(){

            if(this.status == 200 && flag1 == false){
                console.log(this.responseText);
                document.getElementById('text').innerHTML = this.responseText;
                flag1 = true;
                
            }else if(this.status = 404){
                document.getElementById('text').innerHTML = 'Not Found';
                
            }else if(flag1 == true){
                flag1 = false;
                xhr.close();
                
            }
        }
        xhr.onerror = function(){
        }
        
        xhr.send();
        });
    
    
    
    
    
    
//    var flag1 = false;
//
//    $(document).on('click','#login-page', function(e){
//        var xhr = new XMLHttpRequest();
//        xhr.open('GET', '../index.php', true);
//        
//        xhr.onprogress = function(){
//        }
//        
//        xhr.onload = function(){
//            if(this.status == 200 && flag1 == false){
//                console.log(this.responseText);
//                document.getElementById('text').innerHTML = this.responseText;  
//                flag1 = true;
//                
//            }else if(this.status = 404){
//                document.getElementById('text').innerHTML = 'Not Found';
//                
//            }else if(flag1 == true){
//                flag1 = false;
//                xhr.close();
//                
//            }
//            $(".cancel").click(function(){
//                xhr.close();
//                
//            });
//        }
//        xhr.onerror = function(){
//        }
//        
//        xhr.send();
//        });
//    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
//////////////select2///////////////////////////////
    
jQuery(document).ready(function() {
    
  $("#search_package_from").select2({
    placeholder: 'From',
  });
  $("#search_package_to").select2({
    placeholder: 'Travel To',
  });
    
    $("#add_destination").select2({
     placeholder: 'Select',
    });
    
    $("#add_flight").select2({
     placeholder: 'Select',
    });
    
    $("#add_flight_no").select2({
     placeholder: 'Select',
    });
    
    
    $("#hotel_1").select2({
     placeholder: 'Select',
    });
    $("#hotel_2").select2({
     placeholder: 'Select',
    });
    $("#hotel_3").select2({
     placeholder: 'Select',
    });
    $("#hotel_4").select2({
     placeholder: 'Select',
    });
    $("#hotel_5").select2({
     placeholder: 'Select',
    });
    $("#hotel_6").select2({
     placeholder: 'Select',
    });
    $("#hotel_7").select2({
     placeholder: 'Select',
    });
    $("#hotel_8").select2({
     placeholder: 'Select',
    });
    
    $("#flight_source").select2({
       placeholder: 'Select', 
    });
    
    $("#flight_destination").select2({
       placeholder: 'Select', 
    });
    
    $("#flight_class").select2({
        placeholder: 'Select',
    });

    $("#add_hotel_of_city").select2({
     placeholder: 'Select',
//     multiple: 'true',
    });
    $("#hotel_city").select2({
        placeholder: 'Select',
    });
    $("#source_customize").select2({
        placeholder: 'Select',
    });
    $("#destination_customize").select2({
        placeholder: 'Select',
    });
    
    
});
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     $('.tabsholder1').cardTabs({theme: 'graygreen'});
   
    
    $("#login-page").click(function(){
        alert("hi");
        console.log("ho");
    });
    
    
    
    
    
    /**************admin tables****************************
    */
    
    var flag_package_active = false;
    $(".packages-header").click(function(){
        if(flag_package_active == false){
            $(".view-booked-packages").css("display","block");
            flag_package_active = true;
            $(".packages-header").css("color","#222");
            $(".packages-header").css("font-size","20px");
            $(".packages-header").css("border-top","solid 5px red");
            
            $(".hotels-header").css("color","#bbb");
            $(".hotels-header").css("font-size","18px");
            $(".hotels-header").css("border-top","none");
            
            $(".flights-header").css("color","#bbb");
            $(".flights-header").css("font-size","18px");
            $(".flights-header").css("border-top","none");
            
        }
        else{
            $(".view-booked-packages").css("display","none");
            flag_package_active = false;
        }
        
        
        $(".hotels-header").click(function(){
            $(".view-booked-packages").css("display","none");
            flag_package_active = false;
        });
        
        $(".flights-header").click(function(){
            $(".view-booked-packages").css("display","none");
            flag_package_active = false;
        });
        
    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    var flag_hotel_active = false;
     $(".hotels-header").click(function(){
        if(flag_hotel_active == false){
            $(".view-booked-hotels").css("display","block");
            flag_hotel_active = true;
            $(".hotels-header").css("color","#222");
            $(".hotels-header").css("font-size","20px");
            $(".hotels-header").css("border-top","solid 5px red");
            
            $(".packages-header").css("color","#bbb");
            $(".packages-header").css("font-size","18px");
            $(".packages-header").css("border-top","none");
            
            $(".flights-header").css("color","#bbb");
            $(".flights-header").css("font-size","18px");
            $(".flights-header").css("border-top","none");
            
        }
        else{
            $(".view-booked-hotels").css("display","none");
            flag_hotel_active = false;
        }    
         
        $(".packages-header").click(function(){
            $(".view-booked-hotels").css("display","none");
            flag_hotel_active = false;
        });
        
        $(".flights-header").click(function(){
            $(".view-booked-hotels").css("display","none");
            flag_hotel_active = false;
        });
        
     });
    
    
    
   
    
    
    
    
    
    
    
    
    
    
    
    var flag_flight_active = false;
     $(".flights-header").click(function(){
        if(flag_flight_active == false){
            $(".view-booked-flights").css("display","block");
            flag_flight_active = true;
            $(".flights-header").css("color","#222");
            $(".flights-header").css("font-size","20px");
            $(".flights-header").css("border-top","solid 5px red");
            
            $(".hotels-header").css("color","#bbb");
            $(".hotels-header").css("font-size","18px");
            $(".hotels-header").css("border-top","none");
            
            $(".packages-header").css("color","#bbb");
            $(".packages-header").css("font-size","18px");
            $(".packages-header").css("border-top","none");
        }
        else{
            $(".view-booked-flights").css("display","none");
            flag_flight_active = false;
        }
        
         
        $(".packages-header").click(function(){
            $(".view-booked-flights").css("display","none");
            flag_flight_active = false;
        });
        
        $(".hotels-header").click(function(){
            $(".view-booked-flights").css("display","none");
            flag_flight_active = false;
        });
         
    });
    
    
    
   
    
    
    
    
    
//    $('#top-destination').magnificPopup({
//        delegate: 'div',  //child items selector, by clicking on it popup will open
//        type: 'image',
//        gallery: {
//            enabled: true
//        },
//        
//        mainClass: 'mfp-with-zoom', // this class is for CSS animation below
//
//  zoom: {
//    enabled: true, // By default it's false, so don't forget to enable it
//
//    duration: 300, // duration of the effect, in milliseconds
//    easing: 'ease-in-out', // CSS transition easing function
//
//    // The "opener" function should return the element from which popup will be zoomed in
//    // and to which popup will be scaled down
//    // By defailt it looks for an image tag:
//    opener: function(openerElement) {
//      // openerElement is the element on which popup was initialized, in this case its <a> tag
//      // you don't need to add "opener" option if this code matches your needs, it's defailt one.
//      return openerElement.is('img') ? openerElement : openerElement.find('img');
//    }
//  }
//        
//    });
    
    
   
    
    new WOW().init();
    
    



    
    
    
    
    
    
    
   
});