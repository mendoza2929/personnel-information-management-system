let proponent_form = document.getElementById("proponent_form");


proponent_form.addEventListener('submit', function(e){
   e.preventDefault();
   add_proponent();
});

function add_proponent(){
   let data = new FormData();
   data.append('name',proponent_form.elements['proponent_name'].value);
   data.append('add_proponent','');

   let xhr = new XMLHttpRequest();
   xhr.open("POST","./ajax/proponent.php",true);

   xhr.onload = function(){
   var myModalEl = document.getElementById('proponent')
   var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
  modal.hide();

if(this.responseText==1){
   swal("Good job!", "You Successfully Create!", "success");

   proponent_form.elements['proponent_name'].values='';
   get_proponent();
}else{
   swal("Error!", "Server Down!", "error");
}

}
xhr.send(data);

};


function get_proponent(){
   let xhr = new XMLHttpRequest();
   xhr.open("POST","./ajax/proponent.php",true);
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

   xhr.onload = function (){
document.getElementById('proponent_data').innerHTML = this.responseText;
}

xhr.send('get_proponent');

   
}


let edit_proponent_form = document.getElementById('edit_proponent_form');

function proponent_details(id){

let xhr = new XMLHttpRequest();
xhr.open("POST","./ajax/proponent.php",true);
xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');


xhr.onload = function(){
let data = JSON.parse(this.responseText);
edit_proponent_form.elements['proponent_name'].value = data.proponentdata.name;
edit_proponent_form.elements['proponent_id'].value = data.proponentdata.id;
}

xhr.send('edit_proponent='+id);
}


edit_proponent_form.addEventListener('submit',function(e){
e.preventDefault();
submit_edit_proponent();
});

function submit_edit_proponent(){
let data = new FormData();
data.append('submit_edit_proponent','');
data.append('proponent_id',edit_proponent_form.elements['proponent_id'].value);
data.append('name',edit_proponent_form.elements['proponent_name'].value);

let xhr = new XMLHttpRequest();
xhr.open("POST","./ajax/proponent.php",true);

   xhr.onload = function(){
   var myModalEl = document.getElementById('edit_proponent')
   var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
  modal.hide();

if(this.responseText==1){
    swal("Good job!", "You Successfully Edit Proponent!", "success");
    edit_proponent_form.reset();
    get_proponent();
    
}else{
    swal("Error!", "Server Down!", "error");
}

}
xhr.send(data);
}






window.onload = function(){
   get_proponent();
}
