let batch_form = document.getElementById("batch_form");


batch_form.addEventListener('submit', function(e){
   e.preventDefault();
   add_batch();
});

function add_batch(){
   let data = new FormData();
   data.append('name',batch_form.elements['batch_name'].value);
   data.append('add_batch','');

   let xhr = new XMLHttpRequest();
   xhr.open("POST","./ajax/batch.php",true);

   xhr.onload = function(){
   var myModalEl = document.getElementById('batch')
   var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
  modal.hide();

if(this.responseText==1){
   swal("Good job!", "You Successfully Create!", "success");

    batch_form.elements['batch_name'].values='';
    get_batch();
}else{
   swal("Error!", "Server Down!", "error");
}

}
xhr.send(data);

};


function get_batch(){
   let xhr = new XMLHttpRequest();
   xhr.open("POST","./ajax/batch.php",true);
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

   xhr.onload = function (){
document.getElementById('batch_data').innerHTML = this.responseText;
}

xhr.send('get_batch');

   
}


let edit_batch_form = document.getElementById('edit_batch_form');

function batch_details(id){

let xhr = new XMLHttpRequest();
xhr.open("POST","./ajax/batch.php",true);
xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');


xhr.onload = function(){
let data = JSON.parse(this.responseText);
edit_batch_form.elements['batch_name'].value = data.batchdata.name;
edit_batch_form.elements['batch_id'].value = data.batchdata.id;
}

xhr.send('edit_batch='+id);
}


edit_batch_form.addEventListener('submit',function(e){
e.preventDefault();
submit_edit_batch();
});

function submit_edit_batch(){
let data = new FormData();
data.append('submit_edit_batch','');
data.append('batch_id',edit_batch_form.elements['batch_id'].value);
data.append('name',edit_batch_form.elements['batch_name'].value);

let xhr = new XMLHttpRequest();
xhr.open("POST","./ajax/batch.php",true);

xhr.onload = function(){
var myModalEl = document.getElementById('edit_batch')
var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
modal.hide();

if(this.responseText==1){
    swal("Good job!", "You Successfully Edit Batch!", "success");
    edit_batch_form.reset();
    get_batch();
    
}else{
    swal("Error!", "Server Down!", "error");
}

}
xhr.send(data);
}






window.onload = function(){
   get_batch();
}
