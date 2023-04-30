let course_form = document.getElementById("course_form");


course_form.addEventListener('submit', function(e){
   e.preventDefault();
   add_course();
});

function add_course(){
   let data = new FormData();
   data.append('course_name',course_form.elements['course_name'].value);
   data.append('desc_name',course_form.elements['desc_name'].value);
   data.append('add_course','');

   let xhr = new XMLHttpRequest();
   xhr.open("POST","./ajax/course.php",true);

   xhr.onload = function(){
   var myModalEl = document.getElementById('course')
   var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
  modal.hide();

if(this.responseText==1){
   swal("Good job!", "You Successfully Create!", "success");

   course_form.elements['course_name'].values='';
    get_course();
}else{
   swal("Error!", "Server Down!", "error");
}

}
xhr.send(data);

};


function get_course(){
   let xhr = new XMLHttpRequest();
   xhr.open("POST","./ajax/course.php",true);
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

   xhr.onload = function (){
document.getElementById('course_data').innerHTML = this.responseText;
}

xhr.send('get_course');

   
}


function rem_course(val){
   let xhr = new XMLHttpRequest();
   xhr.open("POST","./ajax/course.php",true);
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

 xhr.onload = function (){
if(this.responseText==1){
   swal("Good job!", "Remove Course Successfully!", "success");
    get_course();
}
else{
   swal("Error!", "Server Down!", "success");
}
}

xhr.send('rem_course='+val);
}





function personnel_course(id){
add_personnel_course.elements['course_id'].value = id;
add_personnel_course.elements['batch'].value= '';
add_personnel_course.elements['personnel_name_list'].value='';
add_personnel_course.elements['personnel_name'].value='';


let xhr = new XMLHttpRequest();
xhr.open("POST","./ajax/course.php",true);
xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

xhr.onload = function(){
//   document.querySelectorAll("#add_personnel .modal-title").innerHTML = id;
document.getElementById('course-personnel-data').innerHTML = this.responseText;
}

xhr.send('get_personnel_course='+id);
}





let edit_course_form = document.getElementById('edit_course_form');

function course_details(id){

let xhr = new XMLHttpRequest();
xhr.open("POST","./ajax/course.php",true);
xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');


xhr.onload = function(){
let data = JSON.parse(this.responseText);
edit_course_form.elements['course_name'].value = data.coursedata.name;
edit_course_form.elements['desc_name'].value = data.coursedata.description;
edit_course_form.elements['course_id'].value = data.coursedata.id;
}

xhr.send('edit_course='+id);
}



edit_course_form.addEventListener('submit',function(e){
e.preventDefault();
submit_edit_course();
});


function submit_edit_course(){
let data = new FormData();
data.append('submit_edit_course','');
data.append('course_id',edit_course_form.elements['course_id'].value);
data.append('course_name',edit_course_form.elements['course_name'].value);
data.append('desc_name',edit_course_form.elements['desc_name'].value);



let xhr = new XMLHttpRequest();
xhr.open("POST","./ajax/course.php",true);

xhr.onload = function(){
var myModalEl = document.getElementById('edit_course')
var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
modal.hide();

if(this.responseText==1){
    swal("Good job!", "You Successfully Edit Course!", "success");
    edit_course_form.reset();
    get_course();
    
}else{
    swal("Error!", "Server Down!", "error");
}

}
xhr.send(data);

}


function search_course(coursename){
   let xhr = new XMLHttpRequest();
   xhr.open("POST","./ajax/course.php",true);
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

   xhr.onload = function(){
       document.getElementById('course_data').innerHTML = this.responseText;
   }
   xhr.send('search_course&name='+coursename);
}














window.onload = function(){
   get_course();
   // get_personnel_course();
}
