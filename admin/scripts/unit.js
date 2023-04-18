let unit_form = document.getElementById("unit_form");


unit_form.addEventListener('submit', function(e){
   e.preventDefault();
   add_unit();
});

function add_unit(){
   let data = new FormData();
   data.append('name',unit_form.elements['unit_name'].value);
   data.append('desc',unit_form.elements['desc_name'].value);
   data.append('add_unit','');

   let xhr = new XMLHttpRequest();
   xhr.open("POST","./ajax/unit.php",true);

   xhr.onload = function(){
   var myModalEl = document.getElementById('unit')
   var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
  modal.hide();

if(this.responseText==1){
   swal("Good job!", "You Successfully Create!", "success");

    unit_form.elements['unit_name'].values='';
     unit_form.elements['desc_name'].values='';
    get_unit();
}else{
   swal("Error!", "Server Down!", "error");
}

}
xhr.send(data);

};


function get_unit(){
   let xhr = new XMLHttpRequest();
   xhr.open("POST","./ajax/unit.php",true);
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

   xhr.onload = function (){
document.getElementById('unit_data').innerHTML = this.responseText;
}

xhr.send('get_unit');

   
}


function rem_unit(val){
   let xhr = new XMLHttpRequest();
   xhr.open("POST","./ajax/unit.php",true);
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

 xhr.onload = function (){
if(this.responseText==1){
   swal("Good job!", "Remove Unit Successfully!", "success");
    get_unit();
}
else{
   swal("Error!", "Server Down!", "success");
}
}

xhr.send('rem_unit='+val);
}

let edit_unit_form = document.getElementById('edit_unit_form');

function unit_details(id){

let xhr = new XMLHttpRequest();
xhr.open("POST","./ajax/unit.php",true);
xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');


xhr.onload = function(){
let data = JSON.parse(this.responseText);
edit_unit_form.elements['unit_name'].value = data.unitdata.name;
edit_unit_form.elements['desc_name'].value = data.unitdata.description;
edit_unit_form.elements['unit_id'].value = data.unitdata.id;
}

xhr.send('edit_unit='+id);
}


edit_unit_form.addEventListener('submit',function(e){
e.preventDefault();
submit_edit_unit();
});

function submit_edit_unit(){
let data = new FormData();
data.append('submit_edit_unit','');
data.append('unit_id',edit_unit_form.elements['unit_id'].value);
data.append('unit',edit_unit_form.elements['unit_name'].value);
data.append('desc',edit_unit_form.elements['desc_name'].value);

let xhr = new XMLHttpRequest();
xhr.open("POST","./ajax/unit.php",true);

xhr.onload = function(){
var myModalEl = document.getElementById('edit_unit')
var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
modal.hide();

if(this.responseText==1){
    swal("Good job!", "You Successfully Edit Unit!", "success");
    edit_unit_form.reset();
    get_unit();
    
}else{
    swal("Error!", "Server Down!", "error");
}

}
xhr.send(data);
}








window.onload = function(){
   get_unit();
}