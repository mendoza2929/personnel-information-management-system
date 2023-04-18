let rank_form = document.getElementById("rank_form");


            rank_form.addEventListener('submit', function(e){
               e.preventDefault();
               add_rank();
            });

            function add_rank(){
               let data = new FormData();
               data.append('rank',rank_form.elements['rank_name'].value);
               data.append('add_rank','');

               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/rank.php",true);

               xhr.onload = function(){
               var myModalEl = document.getElementById('rank')
               var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
              modal.hide();

            if(this.responseText==1){
               swal("Success", "", "success");

                rank_form.elements['rank_name'].values='';
                get_rank();
            }else{
               swal("Error!", "Server Down!", "error");
            }

        }
        xhr.send(data);

            };


            function get_rank(){
               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/rank.php",true);
               xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

               xhr.onload = function (){
            document.getElementById('rank_data').innerHTML = this.responseText;
          }

          xhr.send('get_rank');

               
            }


            function rem_rank(val){
               let xhr = new XMLHttpRequest();
               xhr.open("POST","./ajax/rank.php",true);
               xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

             xhr.onload = function (){
            if(this.responseText==1){
               swal("Good job!", "Remove Rank Successfully!", "success");
                get_rank();
            }
            else{
               swal("Error!", "Server Down!", "success");
            }
        }

        xhr.send('rem_rank='+val);
            }




let edt_rank_form = document.getElementById('edt_rank_form');

function rank_details(id){

    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/rank.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');


    xhr.onload = function(){
        let data = JSON.parse(this.responseText);
        edt_rank_form.elements['rank_name'].value = data.rankdata.name;
        edt_rank_form.elements['rank_id'].value = data.rankdata.id;
   }

   xhr.send('edit_rank='+id);
}


    
edt_rank_form.addEventListener('submit',function(e){
        e.preventDefault();
        submit_edit_rank();
    });




function submit_edit_rank(){
        let data = new FormData();
        data.append('submit_edit_rank','');
        data.append('rank_id',edt_rank_form.elements['rank_id'].value);
        data.append('rank',edt_rank_form.elements['rank_name'].value);
    


        
        let xhr = new XMLHttpRequest();
        xhr.open("POST","./ajax/rank.php",true);

        xhr.onload = function(){
            var myModalEl = document.getElementById('edit_rank')
            var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
            modal.hide();

            if(this.responseText==1){
                swal("Good job!", "You Successfully Edit Rank!", "success");
                edt_rank_form.reset();
                get_rank();
                
            }else{
                swal("Error!", "Server Down!", "error");
            }

        }
        xhr.send(data);
       
    }




function rank_record(id){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","./ajax/rank.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('rank-data').innerHTML = this.responseText;
    }

    xhr.send('get_rank_personnel='+id);
}






            window.onload = function(){
               get_rank();
            }

         
