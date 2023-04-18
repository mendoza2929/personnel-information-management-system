


            let barangay_form = document.getElementById("barangay_form");

            let city_form= document.getElementById("city_form");
            
            let province_form = document.getElementById("province_form");


            barangay_form.addEventListener('submit', function(e){
               e.preventDefault();
               add_barangay();
            });

            function add_barangay(){
               let data = new FormData();
               data.append('name',barangay_form.elements['barangay_name'].value);
               data.append('add_barangay','');

               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/address.php",true);

               xhr.onload = function(){
               var myModalEl = document.getElementById('barangay')
               var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
              modal.hide();

            if(this.responseText==1){
               swal("Good job!", "You Successfully Create!", "success");

                barangay_form.elements['barangay_name'].values='';
                get_barangay();
            }else{
               swal("Error!", "Server Down!", "error");
            }

        }
        xhr.send(data);

            };


            function get_barangay(){
               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/address.php",true);
               xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

               xhr.onload = function (){
            document.getElementById('barangay_data').innerHTML = this.responseText;
          }

          xhr.send('get_barangay');

               
            }


           
let edit_barangay_form = document.getElementById('edit_barangay_form');

function address_details(id){

    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/address.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');


    xhr.onload = function(){
        let data = JSON.parse(this.responseText);
        edit_barangay_form.elements['barangay_name'].value = data.addressdata.name;
        edit_barangay_form.elements['address_id'].value = data.addressdata.id;
   }

   xhr.send('edit_address='+id);
   
}


edit_barangay_form.addEventListener('submit',function(e){
        e.preventDefault();
        submit_edit_address();
    });

    function submit_edit_address(){
      let data = new FormData();
        data.append('submit_edit_address','');
        data.append('address_id',edit_barangay_form.elements['address_id'].value);
        data.append('name',edit_barangay_form.elements['barangay_name'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST","./ajax/address.php",true);

        xhr.onload = function(){
            var myModalEl = document.getElementById('edit_address')
            var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
            modal.hide();

            if(this.responseText==1){
                swal("Good job!", "You Successfully Edit Barangay!", "success");
                edit_barangay_form.reset();
                get_barangay();
                
            }else{
                swal("Error!", "Server Down!", "error");
            }

        }
        xhr.send(data);
    }





            // province data javscript

            province_form.addEventListener('submit', function(e){
               e.preventDefault();
               add_province();
            });

            function add_province(){
               let data = new FormData();
               data.append('name',province_form.elements['province_name'].value);
               data.append('add_province','');

               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/address.php",true);

               xhr.onload = function(){
               var myModalEl = document.getElementById('province')
               var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
              modal.hide();

            if(this.responseText==1){
               swal("Good job!", "You Successfully Create!", "success");

                province_form.elements['province_name'].values='';
                get_province();
            }else{
               swal("Error!", "Server Down!", "error");
            }

        }
        xhr.send(data);

            };

   

            function get_province(){
               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/address.php",true);
               xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

               xhr.onload = function (){
            document.getElementById('province_data').innerHTML = this.responseText;
          }

          xhr.send('get_province');

               
            }


            
let edit_province_form = document.getElementById('edit_province_form');

function province_details(id){

    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/address.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');


    xhr.onload = function(){
        let data = JSON.parse(this.responseText);
        edit_province_form.elements['province_name'].value = data.provincedata.name;
        edit_province_form.elements['province_id'].value = data.provincedata.id;
   }

   xhr.send('edit_province='+id);
   
}


edit_province_form.addEventListener('submit',function(e){
        e.preventDefault();
        submit_edit_province();
    });

    function submit_edit_province(){
      let data = new FormData();
        data.append('submit_edit_province','');
        data.append('province_id',edit_province_form.elements['province_id'].value);
        data.append('name',edit_province_form.elements['province_name'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST","./ajax/address.php",true);

        xhr.onload = function(){
            var myModalEl = document.getElementById('edit_province')
            var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
            modal.hide();

            if(this.responseText==1){
                swal("Good job!", "You Successfully Edit Province!", "success");
                edit_province_form.reset();
                get_province();
                
            }else{
                swal("Error!", "Server Down!", "error");
            }

        }
        xhr.send(data);
    }


    

            city_form.addEventListener('submit', function(e){
             e.preventDefault();
             add_city();  
      });

      

      function add_city(){
         let data = new FormData();
               data.append('city',city_form.elements['city_name'].value);
               data.append('add_city','');

               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/address.php",true);

               xhr.onload = function(){
               var myModalEl = document.getElementById('city')
               var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
              modal.hide();

            if(this.responseText==1){
               swal("Good job!", "You Successfully Create!", "success");

               city_form.elements['city_name'].values='';
               get_city();
            }else{
               swal("Error!", "Server Down!", "error");
            }

        }
        xhr.send(data);
      }


      function get_city(){
               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/address.php",true);
               xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

               xhr.onload = function (){
            document.getElementById('city_data').innerHTML = this.responseText;
          }

          xhr.send('get_city');

               
            }


let edit_city_form = document.getElementById('edit_city_form');

function city_details(id){

    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/address.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');


    xhr.onload = function(){
        let data = JSON.parse(this.responseText);
        edit_city_form.elements['city_name'].value = data.citydata.city;
        edit_city_form.elements['city_id'].value = data.citydata.id;
   }

   xhr.send('edit_city='+id);
   
}


edit_city_form.addEventListener('submit',function(e){
        e.preventDefault();
        submit_edit_city();
    });

    function submit_edit_city(){
      let data = new FormData();
        data.append('submit_edit_city','');
        data.append('city_id',edit_city_form.elements['city_id'].value);
        data.append('city',edit_city_form.elements['city_name'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST","./ajax/address.php",true);

        xhr.onload = function(){
            var myModalEl = document.getElementById('edit_city')
            var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
            modal.hide();

            if(this.responseText==1){
                swal("Good job!", "You Successfully Edit City!", "success");
                edit_city_form.reset();
                get_city();
                
            }else{
                swal("Error!", "Server Down!", "error");
            }

        }
        xhr.send(data);
    }







            window.onload = function(){
               get_barangay();
               get_city();
               get_province();
            }

         

       
